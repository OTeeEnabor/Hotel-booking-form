<?php
require('user.php');
//create a conncetion
$conn = new mysqli($servername,$username,$password,$dbname);
//check if the connection was successful
if($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);
}
?>