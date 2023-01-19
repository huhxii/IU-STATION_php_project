<?php
    include("./db/db_connect.php");  
	
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";
	if (isset($_SESSION["usernick"])) $usernick = $_SESSION["usernick"];
	else $usernick = "";
	if (!$userid ){
			echo("<script>
                alert('로그인 후 이용가능합니다.');
                history.go(-1)
            </script>");
        exit;
	}
  
    if (isset($_POST["mode"]) && $_POST["mode"] === "delete") {
        $num = $_POST["num"];
        $page = $_POST["page"];
        $sql = "select * from goods where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $writer = $row["id"];

        if (!isset($userid) || ($userid !== $writer && $userlevel !== '1')) {
            alert_back('수정권한이 없습니다.');
            exit;
        }
        $copied_name = $row["file_copied"];

        if ($copied_name) {
            $file_path = "./data/" . $copied_name;
            unlink($file_path);
        }
        
        $sql = "delete from goods where num = $num";
        mysqli_query($con, $sql);
        // 이미지 게시판 댓글 삭제
        $sql = "delete from goods_ripple where parent = $num";
        mysqli_query($con, $sql);
        mysqli_close($con);
        echo "<script>
            location.href = 'goods_list.php?page=$page';
        </script>";
    }else if (isset($_POST["mode"]) && $_POST["mode"] === "insert") {
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $subject = htmlspecialchars($subject, ENT_QUOTES);
	    $content = htmlspecialchars($content, ENT_QUOTES);
        $regist_day = date("Y-m-d (H:i)"); 
        $upload_dir = "./data/";

        $upfile_name = $_FILES["upfile"]["name"];
        $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
        $upfile_type = $_FILES["upfile"]["type"];
        $upfile_size = $_FILES["upfile"]["size"];  
        $upfile_error = $_FILES["upfile"]["error"];

        if ($upfile_name && !$upfile_error) {
            $file = explode(".", $upfile_name); 
            $file_name = $file[0];
            $file_ext = $file[1];

            $new_file_name = date("Y_m_d_H_i_s");
            $new_file_name = $new_file_name . "_" . $file_name;
            $copied_file_name = $new_file_name . "." . $file_ext;
            $uploaded_file = $upload_dir . $copied_file_name;
        
            if ($upfile_size > 2000000) {
                echo("<script>
                    alert('최대 업로드 파일 크기는 2MB입니다.<br>파일 크기를 체크해주세요!');
                    history.go(-1)
                </script>");
                exit;
            }

            if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
                echo("<script>
                    alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                    history.go(-1)
                </script>");
                exit;
            }
        }else {
            $upfile_name = "";
            $upfile_type = "";
            $copied_file_name = "";
        }

        $sql = "insert into goods(id, nick, subject, content, regist_day, hit, file_name, file_type, file_copied) ";
        $sql .= "values('$userid', '$usernick', '$subject', '$content', '$regist_day', 0, ";
        $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행              

         header("location: goods_list.php"); 
        exit(); 
     
    }else if (isset($_POST["mode"]) && $_POST["mode"] === "modify"){
        $num = $_POST["num"];
        $page = $_POST["page"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $file_delete = (isset($_POST["file_delete"])) ? $_POST["file_delete"] : 'no';

        $sql = "select * from goods where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"];
        $upfile_name = $row["file_name"];
        $upfile_type = $row["file_type"];
        $copied_file_name = $row["file_copied"];

        var_dump($_FILES["upfile"]);
        var_dump($_POST);
        
        if(($file_delete !== "yes") && empty($_FILES["upfile"]["name"])){
            $sql = "update goods set subject='$subject', content='$content' where num=$num ";
            mysqli_query($con, $sql);
        }else if(($file_delete === "yes") && empty($_FILES["upfile"]["name"])){
            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path);
            }
            $upfile_name = "";
            $upfile_type = "";
            $copied_file_name = "";
            $sql = "update goods set subject='$subject', content='$content',  file_name='$upfile_name', file_type='$upfile_type', file_copied= '$copied_file_name'";
            $sql .= " where num=$num";
            mysqli_query($con, $sql); 
        }else{
            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path);
            }
            $upfile_name = "";
            $upfile_type = "";
            $copied_file_name = "";

            if(isset($_FILES["upfile"])){
                $upload_dir = "./data/";
                $upfile_name = $_FILES["upfile"]["name"];
                $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
                $upfile_type = $_FILES["upfile"]["type"];
                $upfile_size = $_FILES["upfile"]["size"];  
                $upfile_error = $_FILES["upfile"]["error"];
                
                if ($upfile_name && !$upfile_error) { 
                    $file = explode(".", $upfile_name); 
                    $file_name = $file[0]; 
                    $file_ext = $file[1]; 
                    $new_file_name = date("Y_m_d_H_i_s");
                    $new_file_name = $new_file_name . "_" . $file_name;
                    $copied_file_name = $new_file_name . "." . $file_ext; 
                    $uploaded_file = $upload_dir . $copied_file_name; 
                    if ($upfile_size > 2000000) {
                        echo("<script>
                            alert('최대 업로드 파일 크기는 2MB입니다.<br>파일 크기를 체크해주세요!');
                            history.go(-1)
                        </script>");
                        exit;
                    }
                    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
                        echo("<script>
                            alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                            history.go(-1)
                        </script>");
                        exit;
                    }
                }
                $sql = "update goods set subject='$subject', content='$content', file_name='$upfile_name', file_type='$upfile_type', file_copied= '$copied_file_name'";
                $sql .= " where num=$num";
                mysqli_query($con, $sql); 
            }
        }
            echo "<script>
                location.href = 'goods_list.php?page=$page';
            </script>";

    }else if (isset($_POST["mode"]) && $_POST["mode"] == "insert_ripple") {
        if (empty($_POST["ripple_content"])) {
            echo "<script>alert('내용입력요망!');
                history.go(-1);
            </script>";
            exit;
        }
        $q_userid = mysqli_real_escape_string($con, $userid);
        $sql = "select * from members where id = '$q_userid'";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
        $rowcount = mysqli_num_rows($result);

        if (!$rowcount) {
            echo "<script>alert('존재하지 않는 아이디입니다.');history.go(-1);</script>";
            exit;
        } else {
            $content = input_set($_POST["ripple_content"]);
            $page = input_set($_POST["page"]);
            $parent = input_set($_POST["parent"]);
            $hit = input_set($_POST["hit"]);
            $q_usernick = isset($_SESSION['usernick']) ? mysqli_real_escape_string($con, $_SESSION['usernick']) : null;
            $q_username = mysqli_real_escape_string($con, $_SESSION['username']);
            $q_content = mysqli_real_escape_string($con, $content);
            $q_parent = mysqli_real_escape_string($con, $parent);
            $regist_day = date("Y-m-d (H:i)");

            $sql = "INSERT INTO `board_ripple` VALUES (null,'$q_parent','$q_userid','$q_username', '$q_usernick','$q_content','$regist_day')";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Error: ' . mysqli_error($con));
            }
            mysqli_close($con);
            echo "
            <script>
              location.href='./goods_view.php?num=$parent&page=$page&hit=$hit';
            </script>
            ";
        }//end of if rowcount
    } else if (isset($_POST["mode"]) && $_POST["mode"] == "delete_ripple") {
        $page = input_set($_POST["page"]);
        $hit = input_set($_POST["hit"]);
        $num = input_set($_POST["num"]);
        $parent = input_set($_POST["parent"]);
        $q_num = mysqli_real_escape_string($con, $num);

        $sql = "DELETE FROM `goods_ripple` WHERE num=$q_num";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
        echo "<script>
            location.href='./goods_view.php?num=$parent&page=$page&hit=$hit';</script>";
    }
?>