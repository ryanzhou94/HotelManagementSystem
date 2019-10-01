<?php
    $floor = $_POST['floor'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    // echo "0$floor";

    try {
        $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $str = "1111111111111"; // initialization: index of valid room, 1 valid, 0 invalid

        $sql = $conn->prepare(
        "SELECT * FROM reservation
                    WHERE
                        Floor = :floor
                    AND
                        ((Start >= :checkIn AND Start < :checkOut) OR (END > :checkIn AND Start <= :checkIn))"
        );
        $sql->bindParam(':floor', $floor);
        $sql->bindParam(':checkIn', $checkIn);
        $sql->bindParam(':checkOut', $checkOut);
        $sql->execute();
        

        while ($result = $sql -> fetch(PDO::FETCH_ASSOC)) {
            $temp = substr(($result['RoomNumber']), -2); // room number
            $str[$temp-1] = 0; // target it as occupied room
        }
        echo $str;
    } catch (PDOException $e) {
        //throw $th;
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?> 