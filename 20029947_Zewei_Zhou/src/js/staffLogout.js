// check if the user has logged in
window.onload = function () {
    if (!($("#user").length > 0)) {
        window.location.href = "../html/login.html";
    }
}

function logout() {
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            window.location.href = "../html/login.html";
        }
    }
    xmlhttp.open("POST", "logout.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}
