<?php
    include("./db/db_connect.php");
  
    $id = $_POST["id"];
    $password = $_POST["password"];

    $sql = "select * from members where id = '$id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) != 1) {
        echo("<script>
            window.alert('등록되지 않은 아이디입니다!');
            history.go(-1);
        </script>");
        echo("<script language='javascript'>warn_id();</script>");
        exit();
    }else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["password"];
        mysqli_close($con);

        if($password != $db_pass) {
            echo("<script>
                window.alert('비밀번호가 틀립니다!');
                history.go(-1);
            </script>");
            echo("<script language='javascript'>warn_pwd();</script>");
            exit();
        }else {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["usernick"] = $row["nick"];
            if($_SESSION["userid"] === "관리자"){
                $_SESSION["userlevel"] = 999;
            }else{
                $_SESSION["userlevel"] = $row["level"];
            }
            echo("<script>
                location.href = 'index2.php';
            </script>");
        }
    }        
?>