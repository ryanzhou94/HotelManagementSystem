function checkLoginForIndex() {
    if ($("#user").length > 0) {
        window.location.href = "php/book.php";
    } else {
        var r = confirm("You didn't login. Do you want to login or continue?");
        if (r == true) {
            window.location.href = "html/login.html";
        }
    }
}