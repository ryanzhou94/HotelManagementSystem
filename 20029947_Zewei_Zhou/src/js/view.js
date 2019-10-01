function viewPeriod(){
    var Start = $("#Start").val();
    var End = $("#End").val();
    if ((Start < End) == false) {
        alert("Invalid check-in or check-out date");
        return;
    }
    // Ajax
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#bookTable")[0].innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "viewPeriod.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("start=" + Start + "&end=" + End);
}

function viewRoom() {
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

    // Ajax
    if (window.XMLHttpRequest) {
        var xmlhttp = new XMLHttpRequest();
    } else {
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#bookTable")[0].innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "viewRoom.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("roomNumber=" + roomNumber);
}

function changeColor(obj) {
    if (obj.getAttribute("data") == 0) {
        alert("This room has been booked");
        return;
    } else {
        var rooms = document.getElementsByClassName('room');
        for (var i = 0; i < rooms.length; i++) {
            if (rooms[i].getAttribute("data") == 0) {
                continue;
            } else {
                rooms[i].style.backgroundColor = '#6699FF';
                rooms[i].setAttribute("data", 1);
            }
        }
        obj.style.backgroundColor = '#FF6347';
        obj.setAttribute("data", 3);
    }
}

function showRoom() {
    for (let index = 0; index < $(".floors").length; index++) {
        $(".floors")[index].innerHTML = $("#floor").val();
    }
}
