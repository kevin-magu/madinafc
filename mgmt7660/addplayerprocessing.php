<?php 
ini_set('display_errors', 1);
include '../includes/connection.php';
if($_SERVER['REQUEST_METHOD']=== 'POST'){

    //take data from html form
    $playerName = $_POST['playerName'];
    $nationalID = $_POST['nationalID'];
   // $dob = $_POST['dob'];
    $position = $_POST['position'];
   // $joinDate = $_POST['joinDate'];
    $clubStatus = $_POST['clubStatus'];

    $query = "INSERT INTO player(playerName, nationalID, position, clubStatus) VALUES ('$playerName', '$nationalID', '$position','$clubStatus') ";
    $exe = mysqli_query($connection, $query);

    if($exe){
        echo "Player added successfully";
    }else{
        echo "adding player failed. PLease try again or contact support team";
    }
}

?>