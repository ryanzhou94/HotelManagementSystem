function checkEmpty() {
    // var str = $("." + className);
    var str = document.getElementsByClassName("register");
    for (var index = 0; index < str.length; index++) {
        if (str[index].value == null || str[index].value == "") {
            return true;
        }
    }
    return false;
}

function checkRegister() {
    
    $("#registerHint")[0].innerHTML = "";
    var usernameLength = $("#username").val().length;
    var passwordLength = $("#password").val().length;
    if (checkEmpty()) {
        $("#registerHint")[0].innerHTML = "You have to fill in all information";
        return;
    } else if (!checkName()) {
        $("#registerHint")[0].innerHTML = "Wrong name format";
        return;
    } else if (!checkEmail()) {
        $("#registerHint")[0].innerHTML = "Wrong email format";
        return;
    } else if (usernameLength < 6) {
        $("#registerHint")[0].innerHTML = "Username should be at least 6 characters";
        return;
    } else if (passwordLength < 6) {
        $("#registerHint")[0].innerHTML = "Password should be at least 6 characters";
        return;
    } else {
        if (window.XMLHttpRequest) {
            var xmlhttp = new XMLHttpRequest();
        } else {
            var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                if (xmlhttp.responseText != 1) {
                    $("#registerHint")[0].innerHTML = "Username or Passport is already taken";
                } else {
                    alert("You register successfully!");
                    window.location.href = "login.html";
                }
            }
        }

        xmlhttp.open("POST", "../php/getRegisterHint.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.send("username=" + $("#username").val() + "&password=" + $("#password").val() +
            "&firstname=" + $("#firstname").val() + "&lastname=" + $("#lastname").val() + "&passport=" +
            $("#passport").val() + "&telephone=" + $("#telephone").val() + "&email=" + $("#email").val());
    }
}

function checkEmail() {
    var reg = new RegExp("^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$");
    if (!reg.test($("#email").val())) {
        return false;
    } else {
        return true;
    }
}

function checkName() {
    var reg = new RegExp("^[A-Z][a-z]+$");
    if (!reg.test($("#firstname").val()) || !reg.test($("#lastname").val())) {
        return false;
    } else {
        return true;
    }
}
