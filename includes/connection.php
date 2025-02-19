<?php 
$server = "localhost";
$username = "root";
$password = "root";
$database = "madina_test";// 

$connection = mysqli_connect($server, $username, $password, $database);
if($connection){
    echo("database connection was successful");
}else{
    echo("database connection failed");
}

?>