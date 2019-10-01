<?php
    $Book_ID = $_POST['Book_ID'];
    try {
        $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn->prepare(
            "DELETE FROM reservation
                                WHERE
                                    Book_ID = :Book_ID"
        );
        $sql->bindParam(':Book_ID', $Book_ID);
        if (!$sql->execute()) {
            die("Error when deleting");
        }

    } catch (PDOException $e) {
        //throw $th;
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>