<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/slide.css">
    <script src="./js/slide.js"></script>
</head>
<body onload="backgroundSlide()">
    <header>
        <?php include "header.php";?>
    </header>
    <nav>
        <?php include "navi.php";?>
    </nav>
    <section>
    <div id="slide" >
        <div id="slide_show">
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/poster_phase.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/poster_phase2.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/concert_phase.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/concert_phase2.png" alt="slide"/></a>
        </div>
    </div>
    <div id="slide2" >
        <div id="slide_show2">
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/album1.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/album2.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/album3.png" alt="slide"/></a>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php"><img src="./img/album4.png" alt="slide"/></a>
        </div>
    </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>