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
    <link rel="stylesheet" href="../css/navigator.css" type="text/css" />
    <link rel="stylesheet" href="../css/myBook.css" type="text/css" />
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/logout.js"></script>
    <script type="text/javascript" src="../js/myBook.js"></script>
</head>

<body background="../images/login1.jpg">
    <!-- <img src="../images/login1.jpg" id="background" /> -->
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

    <table id="bookTable" border="0">

        <tr>
            <th>Book ID</th>
            <th>Type</th>
            <th>Floor</th>
            <th>&nbsp;&nbsp;Room Number</th>
            <th>Check-In</th>
            <th>&nbsp;Check-Out</th>
            <th>&nbsp;Cancel</th>
        </tr>

        <?php
        $username = $_SESSION['login_username'];
        try {
            $conn = new PDO("mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare(
                "SELECT * FROM reservation
                            WHERE
                                Username = :username"
            );
            $sql->bindParam(':username', $username);
            $sql->execute();
            $i = 0;

            while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td class = 'bookId'>" . $result['Book_ID'] . "</td>
                        <td>&nbsp;&nbsp;" . printType($result['Type']) . "</td>
                        <td class = 'floor'>&nbsp;" . $result['Floor'] . "</td>
                        <td class = 'roomNumber'>&nbsp;" . $result['RoomNumber'] . "</td>
                        <td>&nbsp;&nbsp;&nbsp;" . $result['Start'] . "</td>
                        <td>&nbsp;&nbsp;&nbsp;" . $result['End'] . "</td>
                        <td>&nbsp;&nbsp;&nbsp;<button onclick='deleteBook(" . $result['Book_ID'] . ")'>Cancel</button></td>
                    </tr>";
                $i = 1;
            }
            if ($i == 0) {
                echo "<tr><td colspan = '6' align = 'center'><b>You have no reservation</b><br>";
                echo "<a href='book.php'><button>Book My Room</button></a></td></tr>";
            }
        } catch (PDOException $e) {
            //throw $th;
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        ?>
    </table>
</body>

</html>

<?php
function printType($type)
{
    $str = "";
    switch ($type) {
        case 1:
            $str = "VIP Room";
            break;
        case 2:
            $str = "Large room with double beds";
            break;
        case 3:
            $str = "Large room with single bed";
            break;
        case 4:
            $str = "Small Room with single bed";
            break;
        default:
            die("Error");
            break;
    }
    return $str;
}
?>