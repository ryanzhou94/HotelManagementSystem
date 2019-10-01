<?php
session_start();

$type = $_POST['roomType'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Sunny Isle
    </title>
    <script type="text/javascript">
        var checkIn = "<?php echo $checkIn ?>";
        var checkOut = "<?php echo $checkOut ?>";
        var type = "<?php echo $type ?>";
    </script>
    <link rel="stylesheet" type="text/css" href="../css/button.css">
    <link rel="stylesheet" type="text/css" href="../css/background.css">
    <link rel="stylesheet" href="../css/navigator.css" type="text/css" />
    <link rel="stylesheet" href="../css/nextStep.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/nextStep.js"></script>
    <script type="text/javascript" src="../js/logout.js"></script>
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
                echo "<a href='../index.php'><button>Home</button></a>";
            } else {
                echo "<a href= 'html/login.html'><button type = 'button'>Login</button></a>&nbsp";
                echo "<a href= 'html/register.html'><button type = 'button'>Register</button></a>&nbsp";
                echo "<a href='../index.php'><button>Home</button></a>";
            }
            ?>
        </span>
    </div>
    <!-- view of floor -->
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
        <input type="button" value="Confirm" onclick="bookConfirm()" class="button" />
        <input type="button" value="Skip" onclick="randBook()" class="button" />
        <a href="book.php"><input type="button" value="Return" class="button" /></a>
        
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


</body>

</html>