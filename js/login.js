function check_id() {
    let password = document.getElementById("login_password");
    let passwordButton = document.getElementById("login_password_button");
    let warnId = document.getElementById("warn_id");

    if(!document.login_form.id.value){
        alert("ID를 입력하세요.");
        document.login_form.id.focus();
        return;
    }else{
        warnId.style.visibility = "invisible";
        password.style.visibility = "visible";
        passwordButton.style.visibility = "visible";
    }
}

function check_pwd() {
    if(!document.login_form.password.value){
        alert("비밀번호를 입력하세요.");
        document.login_form.password.focus();
        return;
    }else{
        document.login_form.submit();
    }
}

function warn_id() {
    let warnId = document.getElementById("warn_id");
    warnId.style.visibility = "visible";
}

function warn_pwd() {
    let warnPwd = document.getElementById("warn_password");
    warnPwd.style.visibility = "visible";
}