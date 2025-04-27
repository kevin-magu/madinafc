<?php 
$server = "localhost";
$username = "greenglo";
$password = "Greeglobe!@#$%^&*()_+";
$database = "greenglo_madina_test";// 

$connection = mysqli_connect($server, $username, $password, $database);
if($connection){
    echo("database connection was successful </br>");
}else{
    echo("database connection failed </br>");
}

?>