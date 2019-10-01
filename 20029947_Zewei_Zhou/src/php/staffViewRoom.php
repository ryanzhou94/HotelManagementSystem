<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Staff
    </title>
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <link rel="stylesheet" type="text/css" href="../css/background.css" />
    <link rel="stylesheet" href="../css/navigator.css" type="text/css" />
    <link rel="stylesheet" href="../css/staffViewRoom.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/staffLogout.js"></script>
    <script type="text/javascript" src="../js/view.js"></script>
</head>

<body background="../images/login1.jpg">
    <div id="navigator">
        <span id="hotelName">
            Suuny Isle
        </span>
        <span id="textInNavi">
            <?php
            if (isset($_SESSION['login_username'])) {
                echo " Hello <span id = 'user'>" . $_SESSION['login_username'] . "</span> &nbsp";
                echo "<button type ='buttom' onclick='logout()'>Logout</button>&nbsp";
            } else {
                echo "<a href= 'html/login.html'><button type = 'button'>Login</button></a>&nbsp";
                echo "<a href= 'html/register.html'><button type = 'button'>Register</button></a>&nbsp";
            }
            ?>
        </span>
    </div>
    <div id="divOfFloor">
        <select name="floor" id="floor" onchange="showRoom()">
            <option value="" disabled selected>--Select floor--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select> th floor
        <button onclick="viewRoom()">View</button>&nbsp
        <a href="staff.php"><button>Return</button></a>
        <table border="1" id="viewOfFloor">
            <tr>
                <td id="room01" class="room" onclick="changeColor(this)">Large double bed<br><br> Room <span class="roomNumber"><span class="floors"></span>01</span></td>
                <td id="room02" class="room" onclick="changeColor(this)">Large double bed<br><br> Room <span class="roomNumber"><span class="floors"></span>02</span></td>
                <td id="room03" class="room" onclick="changeColor(this)">Large single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>03</span></td>
                <td id="room04" class="room" onclick="changeColor(this)">Large single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>04</span></td>
                <td id="room05" class="room" onclick="changeColor(this)">Small single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>05</span></td>
            </tr>
            <tr>
                <td colspan="5" class="emptyRow">&nbsp</td>
            </tr>
            <tr>
                <td rowspan="2" id="room13" class="room" onclick="changeColor(this)">VIP Room<br><br><br> Room <span class="roomNumber"><span class="floors"></span>13</span></td>
                <td colspan="3" rowspan="2" id="stairs"> <br>Stairs & Lobby<br><br></td>
                <td id="room06" class="room" onclick="changeColor(this)">Small single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>06</span></td>
            </tr>
            <tr>
                <td id="room07" class="room" onclick="changeColor(this)">Small single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>07</span></td>
            </tr>
            <tr>
                <td colspan="5" class="emptyRow">&nbsp</td>
            </tr>
            <tr>
                <td id="room12" class="room" onclick="changeColor(this)">Large double bed<br><br> Room <span class="roomNumber"><span class="floors"></span>12</span></td>
                <td id="room11" class="room" onclick="changeColor(this)">Large double bed<br><br> Room <span class="roomNumber"><span class="floors"></span>11</span></td>
                <td id="room10" class="room" onclick="changeColor(this)">Large single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>10</span></td>
                <td id="room09" class="room" onclick="changeColor(this)">Large single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>09</span></td>
                <td id="room08" class="room" onclick="changeColor(this)">Small single bed<br><br> Room <span class="roomNumber"><span class="floors"></span>08</span></td>
            </tr>
        </table>
    </div>

    <table id="bookTable" border="1">

    </table>
</body>

</html>