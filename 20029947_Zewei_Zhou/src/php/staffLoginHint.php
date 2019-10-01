<?php

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $conn = new PDO("mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn -> prepare(
            "SELECT * FROM staff
                WHERE
                    Username = :username
                AND
                    Password = :password"
        );
        $sql->bindParam(':username', $username);
        $sql->bindParam(':password', $password);
        $sql->execute();
       
        $row = $sql->fetch();
        if ($row != NULL) {
            echo "1";
            $_SESSION['login_username'] = $username;
        }
        else {
            echo "2";
        }
        
    } catch(PDOException $e) {
        //throw $th;
        echo $sql . "<br>" . $e->getMessage(); 
    }
    $conn = null;
?>