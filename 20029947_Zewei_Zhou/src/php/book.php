<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Sunny Isle
    </title>
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <link rel="stylesheet" type="text/css" href="../css/background.css" />
    <link rel="stylesheet" href="../css/book.css" type="text/css" />
    <link rel="stylesheet" href="../css/navigator.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/book.js"></script>
</head>

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
                echo "<a href= 'html/login.html'><button type = 'button'>Login</button></a>&nbsp";
                echo "<a href= 'html/register.html'><button type = 'button'>Register</button></a>&nbsp";
            }
            echo "<a href='../index.php'><button>Home</button></a>&nbsp";
            echo "<a href='aboutUs.php'><button>About Us</button></a>";
            ?>
        </span>
    </div>
    <form action="nextStep.php" method="POST" id="bookForm">
        <table border="0" id="bookTable">
            <tr>
                <td>
                    Room type
                    <br>
                    <select name="roomType" id="roomType">
                        <option value="" disabled selected>Select room type</option>
                        <option value="1">VIP Room</option>
                        <option value="2">Large Double Bed</option>
                        <option value="3">Large Single Bed</option>
                        <option value="4">Small Single Bed</option>
                    </select>
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Check-in date
                    <br>
                    <input type="date" class="date" id="checkInDate" name="checkIn" />
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Check-out date
                    <br>
                    <input type="date" class="date" id="checkOutDate" name="checkOut" />
                    <p id="checkBox">
                        Do you want a randomly assigned room?
                        <br>
                        <input type="radio" name="choice" value="yes">Yes
                        <input type="radio" name="choice" value="no" checked>No
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="Next" onclick="checkValid()" class="button" />
                    <a href="../index.php"><input type="button" value="Return" class="button"></a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>