<?php
include '../includes/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $nationalID = $_POST['nationalID'];
    $sql = "SELECT * FROM player WHERE nationalID=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $nationalID);
    $stmt->execute();
    $result= $stmt->get_result();
    
    if($result->num_rows > 0){
        $_SESSION['player_found'] = 'player is already registered;';
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }else{
        $_SESSION['player_not_found'] = 'player is not registered;';
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
    }



}else{
    echo "meow";
    header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
}



?>