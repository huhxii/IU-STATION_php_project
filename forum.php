<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/forum.css">
    <script>
        function check_input() {
            if (!document.forum_form.subject.value) {
                alert("제목을 입력하세요!");
                document.forum_form.subject.focus();
                return;
            }
            if (!document.forum_form.content.value) {
                alert("내용을 입력하세요!");
                document.forum_form.content.focus();
                return;
            }
            document.forum_form.submit();
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
        <div id="forum_box">
            <h3 id="forum_title">COMMUNITY > FORUM | 자유게시판</h3>
            <form name="forum_form" method="post" action="forum_dml.php" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="insert">
            <ul id="forum_form">
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
                    <li><button type="button" onclick="location.href='forum_list.php'">LIST</button></li>
                </ul>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>