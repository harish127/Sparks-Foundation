<?php
$servername="localhost";
$username ="root";
$password = "";
$databse ="bank"

$conn= mysqli_connect($servername,$username,$password,$databse);

if(!$conn){
    die("Sorry we failed to connect:". mysqli_connect_error());
}

?>