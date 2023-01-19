<?php
    session_start();
    if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"])){
        echo(
            "<script>
                alert('비 정상적인 작동 감지');
                location.href = 'http://{$_SERVER['HTTP_HOST']}/source/iustation/index.php';
            </script>"
        );
        exit();
    }
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);

    header("location: http://{$_SERVER['HTTP_HOST']}/source/iustation/index.php");
    exit();
?>