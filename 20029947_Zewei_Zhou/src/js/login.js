function checkLogin() {
    $("#loginHint")[0].innerHTML = "";

    username = $("#username");
    password = $("#password");

    usernameHint = $("#usernameHint");
    passwordHint = $("#passwordHint");
    
    if (username.val() == "") {
        usernameHint[0].innerHTML = "Username is empty!";
    } else {
        usernameHint[0].innerHTML = ""; // clear
    }
    if (password.val() == "") {
        passwordHint[0].innerHTML = "Password is empty!";
    } else {
        passwordHint[0].innerHTML = ""; // clear
    }
    if (username.val() == "" || password.val() == "") {
        return;
    }

    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 1) {
                // successfully login
                // start session
                window.location.href = "../index.php";
            } else { // xmlhttp.responseText == 2: no such a username or invalid password
                $("#loginHint")[0].innerHTML = "Invalid login!";
            }
        }
    }
    xmlhttp.open("POST", "../php/getLoginHint.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("username=" + username.val() + "&password=" + password.val());
}