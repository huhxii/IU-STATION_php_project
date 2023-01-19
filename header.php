<?php
session_start();
$userid = $usernick = $userlevel = "";
if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if(isset($_SESSION["usernick"])) $usernick = $_SESSION["usernick"];
else $usernick = "";
if(isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
?>
<div id="top">
    <h1>
        <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index.php">IU STATION</a>
    </h1>
    <h4>
        <span id="top_1">우</span>
        <span id="top_2">리</span>
        <span id="top_3">는 </span>
        <span id="top_4">오</span>
        <span id="top_5">렌</span>
        <span id="top_6">지 </span>
        <span id="top_7">태</span>
        <span id="top_8">양 </span>
        <span id="top_9">아</span>
        <span id="top_10">래</span>
    </h4>
    <ul id="top_menu">
        <?php 
        if(!$userid){ 
        ?>
        <li>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/index.php">LOG-IN</a>
        </li>
        <li>&nbsp&nbsp|&nbsp&nbsp</li>
        <li>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/register.php">SIGN-UP</a>
        </li>
        <?php 
        }else{
        $logged = $usernick."&nbsp&nbsp님&nbsp&nbsp[LEVEL:&nbsp&nbsp" . $userlevel."]&nbsp&nbsp";
        ?>
        <li><?=$logged?></li>
        <li>&nbsp&nbsp|&nbsp&nbsp</li>
        <li>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/logout.php">LOG-OUT</a>
        </li>
        <li>&nbsp&nbsp|&nbsp&nbsp</li>
        <li>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/mypage.php">MY PAGE</a>
        </li>
        <?php 
        }
        if($userlevel == 1){
        ?>
        <li> | </li>
        <li>
            <a href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/admin.php">ADMIN</a>
        </li>
        <?php
        }
        ?>
    </ul>
</div>