<?php 
ini_set('display_errors', 1);
session_start();
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
        $_SESSION['player_added_success'] = "Player added successfully !";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }else{
        $_SESSION['player_added_success'] = "Error adding player. Please try again";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }

    $stmt -> close();
    $connection -> close();


}

?>