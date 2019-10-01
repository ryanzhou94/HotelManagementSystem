<?php
    $type = $_POST['type'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    try {
        $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn -> prepare(
        "SELECT count(*) FROM reservation
                    WHERE
                        Type = :type
                    AND
                        ((Start >= :checkIn AND Start < :checkOut) OR (END > :checkIn AND Start <= :checkIn))"
        );
        $sql -> bindParam(':type', $type);
        $sql -> bindParam(':checkIn', $checkIn);
        $sql -> bindParam(':checkOut', $checkOut);
        $sql->execute();
        $rows = $sql -> fetch(); 
        
        // the number of $rows indicates that the number of 
        // booked rooms at that time(check-in ~ check-out)
        if ($type == 1) {
            if ($rows[0] < 10) {
                echo "1";
            } else {
                echo "2";
            }
        } else { // ($type == 2 || $type == 3 || $type == 4)
            if ($rows[0] < 40) {
                echo "1";
            } else {
                echo "2";
            }
        }
        $conn = null; 
    } catch(PDOException $e) {
        //throw $th;
        echo $sql . "<br>" . $e->getMessage(); 
    }
?>