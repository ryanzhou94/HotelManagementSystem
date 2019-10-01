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
    <link rel="stylesheet" href="../css/staffViewPeriod.css" type="text/css" />
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

    <div id="selectPeriod">
        <button>Start:</button>
        <input type="date" id="Start" />
        <button>End:</button>
        <input type="date" id="End" />
        &nbsp;
        <button onclick="viewPeriod()">View</button>&nbsp;
        <a href="staff.php"><button>Return</button></a>
    </div>

    <table id="bookTable" border="1">

    </table>
</body>

</html>