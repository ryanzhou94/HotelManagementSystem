function changeColor(obj) {
    if (obj.getAttribute("data") == 0) {
        alert("This room has been booked");
        return;
    } else if (obj.getAttribute("data") == 2) {
        alert("This room is not the room type that you choose");
        return;
    } else {
        var rooms = document.getElementsByClassName('room');
        for (var i = 0; i < rooms.length; i++) {
            if (rooms[i].getAttribute("data") == 0 || rooms[i].getAttribute("data") == 1 || rooms[i].getAttribute("data") == 2) {
                continue;
            } else if (rooms[i].getAttribute("data") == 3 && obj.getAttribute("data") == 3) {
                return;
            } else if (rooms[i].getAttribute("data") == 3 && obj.getAttribute("data") != 3) {
                rooms[i].style.backgroundColor = '#6699FF'; // blue -> empty
                rooms[i].setAttribute("data", 1);
            }
        }
        obj.style.backgroundColor = '#FFD700';
        obj.setAttribute("data", 3);
    }
}

function bookConfirm() {
    if ($("#floor").val() == null) {
        alert("Select floor first");
        return;
    }
    var rooms = document.getElementsByClassName('room');
    var index = 0;
    for (var i = 0; i < rooms.length; i++) {
        if (rooms[i].getAttribute("data") == 3) {
            index = 1;
            break;
        }
    }
    if (index == 0) {
        alert("Please choose a specific room!");
        return;
    }
    var roomNumber = rooms[i].getElementsByClassName("roomNumber")[0].textContent;
    // alert(roomNumber);

    // Ajax: insert information into database
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (1 == xmlhttp.responseText) {
                alert("You have booked successfully!");
                window.location.href = "../index.php";
            }
        }
    }

    xmlhttp.open("POST", "bookConfirm.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("roomNumber=" + roomNumber + "&checkIn=" + checkIn + "&checkOut=" + checkOut);
}

function logout() {
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            window.location.reload();
        }
    }
    xmlhttp.open("POST", "logout.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}


function showRoom() {
    for (let index = 0; index < $(".floors").length; index++) {
        $(".floors")[index].innerHTML = $("#floor").val();
    }
    
    //Ajax: show valid rooms
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            // console.log(str);       
            for (let index = 0; index < str.length; index++) {
                // if (index < 9) {
                //     var id = "#room0" + (index + 1);
                // } else {
                //     var id = "#room" + (index + 1);
                // }
                // if (str[index] == '0') {
                //     // $(id).css('backgroundColor', '#FF9999');    
                //     $(id).css('backgroundColor', '#FF6347');
                //     $(id).attr("data", 0);
                // } else {
                //     $(id).css('backgroundColor', '#6699FF');
                //     $(id).attr("data", 1);
                // }
                if (index < 9) {
                    var id = "#room0" + (index + 1);
                } else { // index >= 10
                    var id = "#room" + (index + 1);
                }
                if (type == 1) {
                    if (index == 12) {
                        if (str[index] == '0') {
                            $(id).css('backgroundColor', '#FF6347');
                            $(id).attr("data", 0);
                        } else {
                            $(id).css('backgroundColor', '#6699FF');
                            $(id).attr("data", 1);
                        }
                    } else {
                        $(id).css('backgroundColor', '#778899');
                        $(id).attr("data", 2);
                    }
                } else if (type == 2) {
                    if (index == 0 || index == 1 || index == 10 || index == 11) {
                        if (str[index] == '0') {
                            $(id).css('backgroundColor', '#FF6347');
                            $(id).attr("data", 0);
                        } else {
                            $(id).css('backgroundColor', '#6699FF');
                            $(id).attr("data", 1);
                        }
                    } else {
                        $(id).css('backgroundColor', '#778899');
                        $(id).attr("data", 2);
                    }
                } else if (type == 3) {
                    if (index == 2 || index == 3 || index == 9 || index == 8) {
                        if (str[index] == '0') {
                            $(id).css('backgroundColor', '#FF6347');
                            $(id).attr("data", 0);
                        } else {
                            $(id).css('backgroundColor', '#6699FF');
                            $(id).attr("data", 1);
                        }
                    } else {
                        $(id).css('backgroundColor', '#778899');
                        $(id).attr("data", 2);
                    }
                } else {
                    if (index >= 4 && index <= 7) {
                        if (str[index] == '0') {
                            $(id).css('backgroundColor', '#FF6347');
                            $(id).attr("data", 0);
                        } else {
                            $(id).css('backgroundColor', '#6699FF');
                            $(id).attr("data", 1);
                        }
                    } else {
                        $(id).css('backgroundColor', '#778899');
                        $(id).attr("data", 2);
                    }
                }
            }
        }
    }
    xmlhttp.open("POST", "showRoom.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("floor=" + $("#floor").val() + "&checkIn=" + checkIn + "&checkOut=" + checkOut);
}

function randBook() {
    var result = confirm("Are you sure you want a randomly assigned room?")
    if (result == false) {
        return false;
    }
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
