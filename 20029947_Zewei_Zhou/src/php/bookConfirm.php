<?php
    session_start();
    // get information
    $username = $_SESSION['login_username'];
    $roomNumber = $_POST['roomNumber'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    // ready to insert
    bookConfirm($username, $roomNumber, $checkIn, $checkOut);
?>

<?php
    // the the floor number via room number
    function getFloor($roomNumber)
    {
        if (strlen($roomNumber) == 4) {
            return 10;
        } else {
            return $roomNumber[0];
        }
    }

    function getRoomType($roomNumber)
    {
        $last2 = substr($roomNumber, -2);
        if ($last2 == "13") {
            return 1;
        } else if ($last2 == "01" || $last2 == "02" || $last2 == "11" || $last2 == "12") {
            return 2;
        } else if ($last2 == "03" || $last2 == "04" || $last2 == "09" || $last2 == "10") {
            return 3;
        } else {
            return 4;
        }
    }

    function bookConfirm($username, $roomNumber, $checkIn, $checkOut){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $floor = getFloor($roomNumber);
            $type = getRoomType($roomNumber);
            $sql = "INSERT INTO reservation (`Username`, `Type`, `Floor`, `RoomNumber`, `Start`, `End`) VALUES
            ('$username', '$type', '$floor','$roomNumber', '$checkIn', '$checkOut')";
            if ($conn->exec($sql)) {
                echo "1";
            } else {
                die("Booking fails");
            }
        } catch (PDOException $e) {
            //throw $th;
            echo $sql . "<br>" . $e->getMessage();
        }
        
    }
?>