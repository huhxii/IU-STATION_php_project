<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/notice.css">
    <script>
        function check_input() {
            if (!document.notice_form.subject.value) {
                alert("제목을 입력하세요!");
                document.notice_form.subject.focus();
                return;
            }
            if (!document.notice_form.content.value) {
                alert("내용을 입력하세요!");
                document.notice_form.content.focus();
                return;
            }
            document.notice_form.submit();
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
        <div id="notice_box">
            <h3 id="notice_title">STATION > NOTICE > MODIFY</h3>
            <?php include("./db/db_connect.php");
                $num  = $_GET["num"];
                $page = $_GET["page"];

                $sql = "select * from notice where num = $num";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                $name       = $row["name"];
                $subject    = $row["subject"];
                $content    = $row["content"];		
                $file_name  = $row["file_name"];
            ?>      
            <form name="notice_form" method="post" action="notice_modify.php" enctype="multipart/form-data">
                <input type="hidden" name="num" value=<?=$num?>>
                <input type="hidden" name="page" value=<?=$page?>>
                <ul id="notice_form">
                    <li>
                        <span class="col1">NICK : </span>
                        <span class="col2"><?=$name?></span>
                    </li>
                    <li>
                        <span class="col1">SUBJECT : </span>
                        <span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">CONTENT : </span>
                        <span class="col2">
                        <textarea name="content"><?=$content?></textarea>
                        </span>
                    </li>
                    <li>
                        <span class="col1">UP FILE : </span>
                        <span class="col2"><?=$file_name?></span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li><button type="button" onclick="check_input()">UPDATE</button></li>
                    <li><button type="button" onclick="location.href='notice_list.php'">LIST</button></li>
                </ul>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>