<?php 
ini_set('display_errors', 1);
include '../includes/connection.php';
if($_SERVER['REQUEST_METHOD']=== 'POST'){

    //take data from html form
    $playerName = $_POST['playerName'];
    $nationalID = $_POST['nationalID'];
    $fieldNumber = $_POST['fieldNumber'];
    $position = $_POST['position'];
    $joinDate = $_POST['joinDate'];

    //prepare the sql query
    $query = "INSERT INTO player(playerName, nationalID, fieldNumber,position, joinDate) VALUES (?,?,?,?,?)"; 
    $stmt = $connection ->prepare($query);
    $stmt -> bind_param("sssss", $playerName, $nationalID, $fieldNumber, $position, $joinDate);

    //execute the query
    if($stmt -> execute()){
        echo "Player added successfully !";
    }else{
        echo "Error: " .$stmt -> error;
    }

    $stmt -> close();
    $connection -> close();
    
}

?>