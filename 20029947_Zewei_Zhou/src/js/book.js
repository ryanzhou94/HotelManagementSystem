// check if the user has logged in
window.onload = function () {
    if (!($("#user").length > 0)) {
        window.location.href = "../index.php";
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
            window.location.href = "../index.php";
        }
    }
    xmlhttp.open("POST", "logout.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}


function checkValid() {
    // $("#bookHint")[0].innerHTML = "";  // clear the hint box
    // check if room type is empty
    if ($("#roomType").val() == null) {
        alert("Room type is empty");
        return;
    }

    if(checkDate() == false){
        alert("Invalid check-in or check-out date");
        return;
    }

    // Ajax: to check if there is(are) valid room(s)
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
     xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            if (xmlhttp.responseText == 1) {
                // there is(are) valid room(s), submit the form and jump to 'nextStep.php'
                if (randBook(type, checkIn, checkOut) == false) {
                    $("#bookForm").submit();
                }
            } else { 
                alert("No more booking for this type of room or this period of time");
            }
        }
    }

    var type = $("#roomType").val(); // 1
    var checkIn = $("#checkInDate").val(); // 2019 - 05 - 01
    var checkOut = $("#checkOutDate").val(); // 2019 - 05 - 07

    xmlhttp.open("POST", "bookHint.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("type=" + type + "&checkIn=" + checkIn + "&checkOut=" + checkOut);
    
}

function checkDate() {
    var checkIn = $("#checkInDate").val();
    var checkOut = $("#checkOutDate").val();
    return checkIn < checkOut;
}

function randBook(type, checkIn, checkOut) {
    var result = $('input:radio:checked').val();
    if (result == "no") {
        return false;
    }
    console.log("Here");
    
    // Ajax: submit the reservation
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert("Your room number is " + xmlhttp.responseText); // tell client the number of booked room
            window.location.href = "../index.php"; // return to the home page
        }
    }

    xmlhttp.open("POST", "randBook.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("type=" + type + "&checkIn=" + checkIn + "&checkOut=" + checkOut);
}
