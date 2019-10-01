<?php
$roomNumber = $_POST['roomNumber'];

try {
    $conn = new PDO( "mysql:host=localhost;dbname=scyzz2", "scyzz2", "Qqwer0904!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare(
        "SELECT * FROM reservation
                        WHERE
                            RoomNumber = :roomNumber"
    );
    $sql->bindParam(':roomNumber', $roomNumber);
    $sql->execute();
    echo "<tr>
                <th>
                    Book ID
                </th>
                <th>
                    Username
                </th>
                <th>
                    Room type
                </th>
                <th>
                    Floor
                </th>
                <th>
                    Room number
                </th>
                <th>
                    Start
                </th>
                <th>
                    End
                </th>
            </tr>";
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                    <td>" . $result['Book_ID'] . "</td>
                    <td>" . $result['Username'] . "</td>
                    <td>" . printType($result['Type']) . "</td>
                    <td>" . $result['Floor'] . "</td>
                    <td>" . $result['RoomNumber'] . "</td>
                    <td>" . $result['Start'] . "</td>
                    <td>" . $result['End'] . "</td>
                  </tr>";
    }
} catch (PDOException $e) {
    //throw $th;
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>

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