<?php
    session_start();
    // get information
    $username = $_SESSION['login_username'];
    $type = $_POST['type'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    // check and insert
    $bookedRooms = getBookedRoom($type, $checkIn, $checkOut);
    $validRooms = getValidRooms($type);
    $checkedRooms = checkDuplicate($validRooms, $bookedRooms);
    $randIndex = rand(0, count($checkedRooms) - 1);
    $randRoomNumber = $checkedRooms[$randIndex];
    bookRoom($username, $type, $randRoomNumber, $checkIn, $checkOut);
?>

<?php
    // connect to the database and select and return booked rooms' room number as a String array
    function getBookedRoom($type, $checkIn, $checkOut){
        $bookedRooms = null;    // initialise thee array
        try {
            $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare(
                "SELECT * FROM reservation
                            WHERE
                                Type = :type
                            AND
                                ((Start >= :checkIn AND Start < :checkOut) OR (END > :checkIn AND Start <= :checkIn))"
            );
            $sql->bindParam(':type', $type);
            $sql->bindParam(':checkIn', $checkIn);
            $sql->bindParam(':checkOut', $checkOut);
            $sql->execute();
            $i = 0;
            while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                $bookedRooms[$i] = $result['RoomNumber']; // room number
                $i++;
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        return $bookedRooms;
    }

    // check if valid rooms and booked rooms have duplicate rooms and return final valid rooms
    function checkDuplicate($validRooms, $bookedRooms){
        if ($bookedRooms != null) {
            $bookedNum = count($bookedRooms);
            for ($i = 0; $i < $bookedNum; $i++) {
                $index = findIndex($validRooms, $bookedRooms[$i]); // find the index of booked rooms in the array of valid rooms
                unset($validRooms[$index]); // delete the element
            }
            $validRooms = array_values($validRooms); // realign the array
        } // else $bookedRooms == null
        if (count($validRooms) < 1) {
            die("No rooms avaliable");
        } else {
            return $validRooms;
        }   
    }

    // get the index of a specific value in a array
    function findIndex($array, $find)
    {
        foreach ($array as $key => $v) {
            if ($v == $find) {
                return $key;
            }
        }
    }

    // insert information into the database to book room
    function bookRoom($username, $type, $randRoomNumber, $checkIn, $checkOut){
        try {
            $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $floor = getFloor($randRoomNumber);
            $sql = "INSERT INTO reservation (`Username`, `Type`, `Floor`, `RoomNumber`, `Start`, `End`) VALUES
            ('$username', '$type', '$floor','$randRoomNumber', '$checkIn', '$checkOut')";
            if($conn->exec($sql)){
                echo $randRoomNumber;
            } else {
                die("Booking fails");
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null; // close PDO connection
    }

    // the the floor number via room number
    function getFloor($randRoomNumber){
        if (strlen($randRoomNumber) == 4) {
            return 10;
        } else {
            return $randRoomNumber[0];
        }
    }

    // create array depending on the room type
    function getValidRooms($type){
        if (1 == $type) {
            $validRooms = createArrayType1();
        } elseif (2 == $type) {
            $validRooms = createArrayType2();
        } elseif (3 == $type) {
            $validRooms = createArrayType3();
        } else {
            $validRooms = createArrayType4();
        }
        return $validRooms;
    }

    // create an array of room number of VIP room 
    function createArrayType1()
    {
        for ($floors = 0; $floors < 10; $floors++) {
            $rooms[$floors] = ($floors+1) . "13";
        }
        return $rooms;
    }

    // create an array of room number of large double bed room
    function createArrayType2(){
        $i = 0;
        for ($floors=1; $floors < 11; $floors++) { 
            $rooms[$i] = strval($floors) . "01";
            $i++;
            $rooms[$i] = strval($floors) . "02";
            $i++;
            $rooms[$i] = strval($floors) . "12";
            $i++;
            $rooms[$i] = strval($floors) . "11";
            $i++;
        }
        return $rooms;
    }

    // create an array of room number of large single bed room
    function createArrayType3()
    {
        $i = 0;
        for ($floors = 1; $floors < 11; $floors++) {
            $rooms[$i] = strval($floors) . "03";
            $i++;
            $rooms[$i] = strval($floors) . "04";
            $i++;
            $rooms[$i] = strval($floors) . "10";
            $i++;
            $rooms[$i] = strval($floors) . "09";
            $i++;
        }
        return $rooms;
    }

    // create an array of room number of small single bed room
    function createArrayType4()
    {
        $i = 0;
        for ($floors = 1; $floors < 11; $floors++) {
            $rooms[$i] = strval($floors) . "05";
            $i++;
            $rooms[$i] = strval($floors) . "06";
            $i++;
            $rooms[$i] = strval($floors) . "07";
            $i++;
            $rooms[$i] = strval($floors) . "08";
            $i++;
        }
        return $rooms;
    }
?>