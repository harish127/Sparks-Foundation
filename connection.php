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
            throw new Exception('Insufficient amount to transfer!');
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
    
        $st3 = $db->prepare(
            "INSERT INTO `transaction` ( `From`, `To`, `Amount`) VALUES ( :from, :to, :amount)"
        );
        
        //Assigning values to placeholder
        $st1->bindValue(':amt', $amount, PDO::PARAM_INT);
        $st1->bindValue(':fro', $from, PDO::PARAM_STR);
        $st2->bindValue(':amt', $amount, PDO::PARAM_INT);
        $st2->bindValue(':to', $to, PDO::PARAM_STR);
        $st3->bindValue(':amount', $amount, PDO::PARAM_INT);
        $st3->bindValue(':to', $to, PDO::PARAM_STR);
        $st3->bindValue(':from', $from, PDO::PARAM_STR);
        //Excecuting the SQL Queries
        $st1->execute();
        $st2->execute();
        $st3->execute();
        //Checking if user name Exits
        if(!$st2->rowCount()||!$st1->rowCount()){ 
            throw new Exception('User not Found!');
        }

        //Checking if data is entered into transaction table
        if(!$st3->rowCount()) throw new Exception('Could not insert data into Transaction Entry!');
        
        //Everything is fine so Commit the changes
        if($db->commit()) 
            notification("success","Success","Transaction successfull.");
        else 
            notification("danger","Error","Transaction failed!");
        
    } catch (PDOException $e) { //PDO related Exceptions are handle here
        notification("danger","Error",$e->getMessage()); 
    }catch(Exception $e){   //Custom Exceptions are handle here
        notification("danger","Error",$e->getMessage());
        $db->rollBack();   //Reverting changes if any
    }
}

//Pops up notification about error or sucess messages  
function notification($type,$strong,$message){
    echo '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
    <strong>'.$strong.'</strong> '.$message.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>