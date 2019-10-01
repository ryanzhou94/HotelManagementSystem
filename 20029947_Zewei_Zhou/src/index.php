<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sunny Isle</title>
    <link rel="stylesheet" href="css/button.css" type="text/css" />
    <link rel="stylesheet" href="css/background.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/navigator.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/logoutForIndex.js"></script>
    <script type="text/javascript" src="js/checkLoginForIndex.js"></script>
</head>

<body>
    <img src="images/login1.jpg" id="background" />
    <!-- Navigator -->
    <div id="navigator">
        <span id="hotelName">
            Suuny Isle
        </span>
        <span id="textInNavi">
            <?php
            if (isset($_SESSION['login_username'])) {
                echo " Hello <span id = 'user'>" . $_SESSION['login_username'] . "</span> &nbsp";
                echo "<button type ='buttom' onclick='logoutForIndex()'>Logout</button>&nbsp";
                echo "<a href='php/myBook.php'><button type ='button'>View/Cancel Reservation</button></a>&nbsp";
            } else {
                echo "<a href= 'html/login.html'><button type = 'button'>Login</button></a>&nbsp";
                echo "<a href= 'html/register.html'><button type = 'button'>Register</button></a>&nbsp";
            }
            echo "<a href='index.php'><button>Home</button></a>&nbsp";
            echo "<a href='php/aboutUs.php'><button>About Us</button></a>";
            ?>
        </span>
    </div>

    <table border="0" id="types">
        <tr>
            <td>
                <img src='images/vip.jpg' /><br>
                VIP Room<br>
                $999/night
            </td>
            <td>
                <img src="images/LDB.jpg" /><br>
                Large Double Bed<br>
                $888/night
            </td>
        </tr>
        <tr>
            <td>
                <img src="images/LSB.jpg" /><br>
                Large Single Bed<br>
                $777/night
            </td>
            <td>
                <img src="images/SSB.jpg" /><br>
                Small Single Bed<br>
                $666/night
            </td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="checkLoginForIndex()">Book My Room!</button></td>
        </tr>
    </table>






</body>

</html>