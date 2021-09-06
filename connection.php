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
    // $sql = "SELECT Amount FROM `customers` where Name = '".$from."'  ";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);
    // $cur_amt = $row['Amount'];
    // $dbh = new PDO('mysql:host=localhost;dbname=bank', 'root', '');
    // $sth = $dbh->query('SELECT * FROM customer');
    // //$sth = mysqli_query($conn,'SELECT * FROM foo');
    // var_dump($sth);
}

?>