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


    //check if user exists
    $checkQuery = "SELECT nationalID FROM player WHERE nationalID = $nationalID";
    $result = $connection->query($checkQuery);

    if($result ->num_rows > 0){ 
        $_SESSION['player_exists'] = "ERROR! Player already exists in the Database.";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }else{
    //prepare the sql query
    try{
    $query = "INSERT INTO player(playerName, nationalID, fieldNumber,position, joinDate) VALUES (?,?,?,?,?)"; 
    $stmt = $connection ->prepare($query);
    $stmt -> bind_param("sssss", $playerName, $nationalID, $fieldNumber, $position, $joinDate);

    if(!$stmt){
        $_SESSION['player_added_error'] = "Error adding player. Please try again";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }

    //execute the query
    if($stmt -> execute()){
        $_SESSION['player_added_success'] = "Player added successfully !";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }else{
        $_SESSION['player_added_error'] = "Error adding player. Please try again";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }

    $stmt -> close();
    $connection -> close();

    }catch(Exception $e){
        $_SESSION['player_added_error'] = "Error adding player. Please try again.";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }

    
    } 
    //display
     
}



?>