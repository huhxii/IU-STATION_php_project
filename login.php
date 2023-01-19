<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/css/login.css">
    <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/js/login.js"></script>
</head>
<body>
    <section>
    <div id="login_container">
        <div id="login_logo"><a href="#"><img src="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/img/uaena_logo.png"></a></div>
        <div id="login_box">
            <div id="login_title"> WELCOME! PUT YOUR ACCOUNT! </div>
            <div id="login_form">
                <form name="login_form" method="post" action="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/login_check.php">
                    <div id="login_input">
                        <ul>
                            <li><input type="text" name="id" placeholder="INSERT YOUR ACCOUNT"></li>
                            <li><p id="warn_id">check your id</p></li>
                            <li><input type="password" id="login_password" name="password" placeholder="PASSWORD"></li>
                            <li><p id="warn_password">wrong password</p></li>
                        </ul>
                    </div>
                    <div id="login_button">
                        <a href="#" id="login_id_button" onclick="check_id()">>> ENTER PASSWORD</a>
                        <a href="#" id="login_password_button"><img src="http://<?=$_SERVER['HTTP_HOST'];?>/source/iustation/img/login.png" onclick="check_pwd()"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
</body>
</html>