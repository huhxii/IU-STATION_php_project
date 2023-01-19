<?php
    include("./db/db_connect.php");  

    $id   = $_POST["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $nick = $_POST["nick"];
    $email  = $_POST["email"];
    $regist_day = date("Y-m-d (H:i)");

	$sql = "insert into members(id, password, name, nick, email, regist_day, level) ";
	$sql .= "values('$id', '$password', '$name', '$nick', '$email', '$regist_day', 0)";

	$result = mysqli_query($con, $sql) or die("데이타베이스 보여주기 실패" . mysqli_error($con));
    
    if(!$result){
        echo $dbcon; 
        echo "회원가입실패 ";
        exit(); 
    }
    
    mysqli_close($con);     

    echo ("<script>
	    location.href = 'index.php';
	</script>");
?>