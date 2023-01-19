<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/source/iustation/db/create_statement.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>IU STATION</title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <header>
      <?php include "header.php";?>
  </header>
  <section>
      <?php include "login.php";?>
  </section>
  <div id="background">
    <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index2.php">IU STATION</a>
  </div>
  <div id="design_container">
    <a href=""><div id="design_circle1"><p>PHOTO</p></div></a>
    <a href=""><div id="design_circle2"><p>GOODS</p></div></a>
    <a href=""><div id="design_circle3"><p>APP</p></div></a>
  </div>
  <footer>
    <?php include "footer.php";?>
  </footer>
</body>
</html>