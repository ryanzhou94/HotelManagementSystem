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
    <link rel="stylesheet" href="../css/staff.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/staffLogout.js"></script>
</head>

<body>
    <img src="../images/login1.jpg" id="background" />
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
    <div id="view">
        <a href="staffViewPeriod.php"><button id="viewDate" class="viewButton">View reservation of a period</button></a> &nbsp<br><br>
        <a href="staffViewRoom.php"><button id="viewRoom" class="viewButton">View booked date of a room</button></a>
    </div>
</body>

</html>