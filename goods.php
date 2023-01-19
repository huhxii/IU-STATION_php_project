<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/goods.css">
    <script>
    function check_input() {
        if (!document.goods_form.subject.value) {
            alert("제목을 입력하세요!");
            document.goods_form.subject.focus();
            return;
        }
        if (!document.goods_form.content.value) {
            alert("내용을 입력하세요!");
            document.goods_form.content.focus();
            return;
        }
        document.goods_form.submit();
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
        <div id="goods_box">
            <h3 id="goods_title">
                COMMUNITY > GOODS
            </h3>
            <form name="goods_form" method="post" action="goods_dml.php" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="insert">
                <ul id="goods_form">
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
                        <span class="col2">
                            <textarea name="content"></textarea>
                        </span>
                    </li>
                    <li>
                        <span class="col1">UP FILE</span>
                        <span class="col2"><input type="file" name="upfile"></span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li><button type="button" onclick="check_input()">SAVE</button></li>
                    <li><button type="button" onclick="location.href='goods_list.php'">LIST</button></li>
                </ul>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>