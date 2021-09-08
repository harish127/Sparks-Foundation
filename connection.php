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
  
    // database parameters
     $user       = 'root';
     $password   = '';
     $dns ='mysql:host=localhost;dbname=bank';
    // transaction process starts
    try {
        //PHP data object is created 
        $db = new PDO($dns, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->begintransaction();

        // checking for sufficient for transaction 
        $sql = 'SELECT amount FROM customers WHERE Name=:from';
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":from" => $from));
        $availableAmount = (int) $stmt->fetchColumn();
        $stmt->closeCursor();

        if ($availableAmount < $amount) {
            throw new Exception('Insufficient amount to transfer');
        }
        
        //Preparing SQL statements for transaction
        $st1 = $db->prepare(
            "update customers set
            `Amount`= Amount - :amt where Name = :fro "
        );
        $st2 = $db->prepare(
            "update customers set
            `Amount`= Amount + :amt where Name = :to "
        );
        
        //Assigning values to placeholder
        $st1->bindValue(':amt', $amount, PDO::PARAM_INT);
        $st1->bindValue(':fro', $from, PDO::PARAM_STR);
        $st2->bindValue(':amt', $amount, PDO::PARAM_INT);
        $st2->bindValue(':to', $to, PDO::PARAM_STR);
        //Excecuting the SQL Queries
        $st1->execute();
        $st2->execute();

        //Checking if user name Exits
        if(!$st2->rowCount()||!$st1->rowCount()){ 
            throw new Exception('User not Found!');
        }
        
        //Everything is fine so Commit the changes
        if($db->commit()) 
            echo "Transaction succesfull";
        else 
            echo "Transection failed";
        
    } catch (PDOException $e) { //PDO related Exceptions are handle here
        echo $e->getMessage();
    }catch(Exception $e){   //Custom Exceptions are handle here
        echo $e->getMessage();
        $db->rollBack();   //Reverting changes if any
    }
}

  


?>