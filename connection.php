<?php
$servername="localhost";
$username ="root";
$password = "";
$databse ="bank";

$conn= mysqli_connect($servername,$username,$password,$databse);

if(!$conn){
    die("Sorry we failed to connect:". mysqli_connect_error());
}

function check_name($from,$to,$amount){

    try{
    // $db_name = 'mysql:host=localhost;dbname=bank';
    // $conn = new PDO($db_name,'root','');
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conn->beginTransaction();
    // // $sql1 = $conn->prepare("UPDATE customers SET Amount = Amount - ? WHERE Name = ?");
    // $sql1 = $conn->prepare("UPDATE `customers` SET `Amount`= `Amount`+ :amt WHERE `Name` = :fr");
    // $sql2 = $conn->prepare("UPDATE customers SET Amount = Amount + ? WHERE Name = ?");
    // $sql1->execute(array(':amt'=>(float)$amount,'fr'=>$from));
    // $sql2->execute([(float)$amount,$to]);

    $mysqli = new mysqli("localhost", "root", "", "bank");
    $mysqli->set_charset("utf8mb4");
    $mysqli->autocommit(FALSE);
    $stmt = $mysqli->prepare("UPDATE customers SET Amount = Amount + 500 ");
// $stmt->bind_param('s', $to);
$amount = (float)$amount;
var_dump($stmt->execute());
$stmt->close();

            echo "<h1>sucessfully</h1>";
            var_dump((float)$amount);


    }
    catch(Exception $e){
        $con1->rollback();
        echo $e->getMessage();
    }
}

// try {
//     $mysqli->autocommit(FALSE); //turn on transactions
//     $stmt1 = $mysqli->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
//     $stmt2 = $mysqli->prepare("UPDATE myTable SET name = ? WHERE id = ?");
//     $stmt1->bind_param("si", $_POST['name'], $_POST['age']);
//     $stmt2->bind_param("si", $_POST['name'], $_SESSION['id']);
//     $stmt1->execute();
//     $stmt2->execute();
//     $stmt1->close();
//     $stmt2->close();
//     $mysqli->autocommit(TRUE); //turn off transactions + commit queued queries
//   } catch(Exception $e) {
//     $mysqli->rollback(); //remove all queries from queue if error (undo)
//     throw $e;
//   }
  


?>