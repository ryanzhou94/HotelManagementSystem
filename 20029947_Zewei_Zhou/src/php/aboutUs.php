<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        About Us
    </title>
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <link rel="stylesheet" type="text/css" href="../css/background.css" />
    <link rel="stylesheet" href="../css/navigator.css" type="text/css" />
    <link rel="stylesheet" href="../css/aboutUs.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/logoutForAboutUs.js"></script>
<body>
    <img src="../images/login1.jpg" id="background" />
    <div id="navigator">
        <a href="../index.php">
            <span id="hotelName">
                Suuny Isle
            </span>
        </a>
        <span id="textInNavi">
            <?php
            if (isset($_SESSION['login_username'])) {
                echo " Hello <span id = 'user'>" . $_SESSION['login_username'] . "</span> &nbsp";
                echo "<button type ='buttom' onclick='logout()'>Logout</button>&nbsp";
                echo "<a href='myBook.php'><button type ='button'>View/Cancel Reservation</button></a>&nbsp";
            } else {
                echo "<a href= '../html/login.html'><button type = 'button'>Login</button></a>&nbsp";
                echo "<a href= '../html/register.html'><button type = 'button'>Register</button></a>&nbsp";
            }
            echo "<a href='../index.php'><button>Home</button></a>";
            ?>
        </span>
    </div>
    <table id="aboutUs" border="1">
        <tr>
            <td>
                <h1>About Us</h1>
                <hr>
                Sunny Isle is a small but famous hotel in the east region of Lukewarm Kingdom. People from all over the world visit this place for a nice and comfortable holiday.
            </td>
        </tr>
    </table>
    <br>
    <div id="returnButton"><a href='../index.php'><button>Home</button></a></div>
</body>