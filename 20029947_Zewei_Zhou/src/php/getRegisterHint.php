<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $passport = $_POST['passport'];
    $tele = $_POST['telephone'];
    $email = $_POST['email'];

    
    try {
        $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql_username = $conn -> prepare(
            "SELECT * FROM guest
                WHERE
                    Username = :username"
        );
        
        $sql_username->bindParam(':username', $username);
        $sql_username->execute();
        $row1 = $sql_username -> fetch();
        
        $sql_passport = $conn -> prepare(
            "SELECT * FROM guest
                WHERE
                    Passport = :passport"
        );
        $sql_passport->bindParam(':passport', $passport);
        $sql_passport->execute();
        $row2 = $sql_passport->fetch();

        if ($row1 != NULL && $row2 != NULL) {
            echo "4"; // the username and passport ID are existed
        } elseif ($row1 != NULL && $row2 == NULL) {
            echo "2"; // the username is existed
        } elseif ($row1 == NULL && $row2 != NULL) {
            echo "3"; // the passport ID is existed
        } else {
            echo "1"; // both username and passport are valid
            $sql_passport = "INSERT INTO guest VALUES('$username', '$password','$firstname', '$lastname', '$passport', '$tele', '$email')";
            $conn->exec($sql_passport);
        }
        $conn = NULL;
    } catch(PDOException $e) {
        echo "DB connect failed";
    }


?>