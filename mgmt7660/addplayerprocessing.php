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
    $playerImage = $_POST['playerImage'];


    //check if user exists
    $checkQuery = "SELECT nationalID FROM player WHERE nationalID = $nationalID";
    $result = $connection->query($checkQuery);

    if($result ->num_rows > 0){ 
        $_SESSION['player_exists'] = "ERROR! Player already exists in the Database.";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }else{
    //prepare the sql query
    try{

    //process image insertion --start
    $targetDir = "../uploads/images";    
    $fileName = basename($_FILES['playerImage']['name']);
    $targetFilePath = $targetDir . $fileName; // full path
    //get file extension
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    //allowed file formats
    $allowedTypes = array("jpg","jpeg","png","gif");
    $checkFileType = in_array($fileType, $allowedTypes);
    //move uploaded file to server directory
    $moveFileToServerDir = move_uploaded_file($_FILES["playerImage"]['tmp_name'], $targetFilePath);
    if(!$checkFileType){
        $_SESSION['file_type_error'] = "Only images are allowed!";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        $connection -> close();
    }else if(!$moveFileToServerDir){
        $_SESSION['file_upload_error'] = "Error uloading image. Please try again or contact ADMIN";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        $connection -> close();
    }

    $query = "INSERT INTO player(playerName, nationalID, fieldNumber,position, joinDate,imageName,filePath) VALUES (?,?,?,?,?,?,?)"; 
    $stmt = $connection ->prepare($query);
    $stmt -> bind_param("sssssss", $playerName, $nationalID, $fieldNumber, $position, $joinDate,$fileName,$targetFilePath);

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
    //display search results
    
     
}



?>