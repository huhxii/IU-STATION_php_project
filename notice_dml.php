<?php
    include("./db/db_connect.php");
    session_start();
    
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
    }else{
        $userid = "";
    }

    if(isset($_SESSION["nick"])){
        $usernick = $_SESSION["nick"];
    }else{
        $usernick = "";
    }

    if(!$userid){
        echo ("<script>
            alert('로그인 후 이용가능합니다.');
            history.go(-1);
        </script>");
        exit();
    }

    $subject = $_POST["subject"];
	$content = $_POST["content"];
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
    $regist_day = date("Y-m-d (H:i)");
    $upload_dir = './data/';
    $upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
    $upfile_error    = $_FILES["upfile"]["error"];

    if ($upfile_name && !$upfile_error){
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];
		$copied_file_name = date("Y_m_d_H_i_s") . $upfile_name;    
		$uploaded_file = $upload_dir . $copied_file_name;
	
		if( $upfile_size  > 1000000 ) {
			echo("<script>
			alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
			history.go(-1);
			</script>");
			exit();
		}
		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) ) {
			echo("<script>
				alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
				history.go(-1);
			</script>");
			exit();
		}
	}else{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
    }

	$sql = "insert into notice(id, nick, subject, content, regist_day, hit, file_name, file_type, file_copied) values('$userid', '$usernick', '$subject', '$content', '$regist_day', 0, '$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);

    mysqli_close($con);

	echo ("<script>
		location.href = 'notice_list.php';
    </script>");
?>