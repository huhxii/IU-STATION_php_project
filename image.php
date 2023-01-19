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
            <h3 id="image_title">STATION > IMAGE | 이미지</h3>
            <form name="image_form" method="post" action="image_dml.php" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="insert">
            <ul id="image_form">
                <li>
                    <span class="col1">NICK : </span>
                    <span class="col2"><?=$usernick?></span>
                </li>
                <li>
                    <span class="col1">SUBJECT : </span>
                    <span class="col2"><input name="subject" type="text"></span>
                </li>
                <li id="text_area">
                    <span class="col1">CONTENT : </span>
                    <span class="col2"><textarea name="content"></textarea></span>
                </li>
                <li>
                    <span class="col1">UP FILE</span>
                    <span class="col2"><input type="file" name="upfile"></span>
                </li>
            </ul>
            <ul class="buttons">
                    <li><button type="button" onclick="check_input()">SAVE</button></li>
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