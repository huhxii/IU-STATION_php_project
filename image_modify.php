<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/image.css">
    <script>
        function check_input() {
            if (!document.image_form.subject.value) {
                alert("제목을 입력하세요!");
                document.image_form.subject.focus();
                return;
            }
            if (!document.image_form.content.value) {
                alert("내용을 입력하세요!");
                document.image_form.content.focus();
                return;
            }
            document.image_form.submit();
        }
  </script>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <nav>
        <?php include "navi.php";?>
    </nav>
    <section>
        <div id="image_box">
            <h3 id="image_title">STATION > IMAGE > MODIFY</h3>
            <?php 
            if (!$userid) {
                echo("<script>
                    alert('로그인 후 이용해주세요!');
                    history.go(-1);
                </script>");
                exit();
            }
            
            include("./db/db_connect.php");
            if (isset($_POST["mode"]) && $_POST["mode"] === "modify") {
                $num = $_POST["num"];
                $page = $_POST["page"];
          
                $sql = "select * from image where num = $num";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
          
                $writer = $row["id"];
                if (!isset($userid) || ($userid !== $writer && $userlevel !== '1')) {
                    alert_back('수정권한이 없습니다.');
                    exit();
                }
                $name = $row["name"];
                $subject = $row["subject"];
                $content = $row["content"];
                $file_name = $row["file_name"];
                if (empty($file_name)) $file_name = "없음";
            }
            ?>
            <form name="image_form" method="post" action="image_dml.php" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="modify">
                <input type="hidden" name="num" value=<?= $num ?>>
                <input type="hidden" name="page" value=<?= $page ?>>
                <ul id="image_form">
                    <li>
                        <span class="col1">NICK : </span>
                        <span class="col2"><?=$username?></span>
                    </li>
                    <li>
                        <span class="col1">SUBJECT : </span>
                        <span class="col2"><input name="subject" type="text" value=<?= $subject ?>></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">CONTENT : </span>
                        <span class="col2">
                            <textarea name="content"><?= $content ?></textarea>
                        </span>
                    </li>
                    <li>
                        <span class="col1">UP FILE</span>
                        <span class="col2"><input type="file" name="upfile">
                            <input type="checkbox" value="yes" name="file_delete">&nbsp;DELETE
                            <br>FILE : <?= $file_name ?>
                        </span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li><button type="button" onclick="check_input()">MODIFY</button></li>
                    <li><button type="button" onclick="location.href='image_list.php'">LIST</button></li>
                </ul>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>