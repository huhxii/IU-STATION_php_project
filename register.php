<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/register.css">
    <script>
        function check_input() {
            if (!document.register_form.id.value) {
                alert("ID MISSING!");
                document.register_form.id.focus();
                return;
            }

            if (!document.register_form.password.value) {
                alert("PASSWORD MISSING!");
                document.register_form.password.focus();
                return;
            }

            if (!document.register_form.password_confirm.value) {
                alert("PASSWORD CHECK MISSING!");
                document.register_form.password_confirm.focus();
                return;
            }

            if (!document.register_form.name.value) {
                alert("NAME MISSING!");
                document.register_form.name.focus();
                return;
            }

            if (!document.register_form.nick.value) {
                alert("NICK NAME MISSING!");
                document.register_form.nick.focus();
                return;
            }

            if (!document.register_form.email.value) {
                alert("EMAIL MISSING!");
                document.register_form.email.focus();
                return;
            }

            if (document.register_form.password.value != document.register_form.password_confirm.value) {
                alert("PASSWORD NOT CORRECT!");
                document.register_form.password.focus();
                document.register_form.password.select();
                return;
            }
            document.register_form.submit();
            alert("회원 가입에 성공하셨습니다.");
        }

        function reset_form() {
            document.register_form.id.value = "";
            document.register_form.password.value = "";
            document.register_form.password_confirm.value = "";
            document.register_form.name.value = "";
            document.register_form.nick.value = "";
            document.register_form.email.value = "";
            document.register_form.id.focus();
            return;
        }

        function check_id() {
            window.open("register_check_id.php?id=" + document.register_form.id.value,
            "IDcheck",
            "left = 700, top = 300, width = 350, height = 200, scrollbars = no, resizable = yes, status = no, titlebar = no, toolbar = no, location = no, menubar = no"
            );
        }
    </script>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <section>
        <div id="register_content">
            <div id="register_box">
                <form name="register_form" method="post" action="register_insert.php">
                    <h2>REGISTER</h2>
                    <div class="form_id">
                        <div class="col1">ID</div>
                        <div class="col2">
                            <input type="text" name="id">
                        </div>
                        <div class="col3">
                            <button><a href="#" onclick="check_id()">CHECK</a></button>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_password">
                        <div class="col1">PASSWORD</div>
                        <div class="col2">
                            <input type="password" name="password">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_password_confirm">
                        <div class="col1">PWD CHECK</div>
                        <div class="col2">
                            <input type="password" name="password_confirm">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_name">
                        <div class="col1">NAME</div>
                        <div class="col2">
                            <input type="text" name="name">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_nick">
                        <div class="col1">NICK NAME</div>
                        <div class="col2">
                            <input type="text" name="nick">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_email">
                        <div class="col1">EMAIL</div>
                        <div class="col2">
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form_line"></div>
                    <div class="form_button">
                        <button style="cursor:pointer" onclick="check_input()">REGIST</button>
                        <button style="cursor:pointer" onclick="reset_form()">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>