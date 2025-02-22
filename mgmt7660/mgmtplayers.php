<?php 
    ini_set('display_errors', 1);
    include '../includes/connection.php';
    $sqlQuery = "SELECT nationalID,playerName,fieldNumber,position,joinDate,filePath FROM player";
    $result = $connection->query($sqlQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e4c074505f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet" href="./styles/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Players</title>
</head>
<body>
<?php include './adminincludes/navbar.php' ?> 
<p class="add-player-container"> <i class="fa-solid fa-plus"></i> <a href="/madinafc/mgmt7660/mgmtaddplayer.php">Add Player</a> </p>

<section class="body-content-cover">
    <div class="search-bar">
       <form action="" method="POST">
        <input type="text" name="searchValue" placeholder="search player">
        <button type="submit">Search</button>  
       </form> 
    </div>
<div class="playerbox-container">
<?php
if($result -> num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "

            <div class='playerbox'>
                <div class='player-pic'>
                  <img src=".$row['filePath']." alt=''>
                </div>
                <div class='player-info'>
                    <p class='player-info-name'><span>NAME:</span>". $row['playerName']. "</p>
                    <p class='player-info-position'><span>POSITION:</span>" . $row['position'].",".$row['fieldNumber']. "</p>
                    <p class='player-info-position'><span>ID:</span>" . $row['nationalID']. "</p>
                </div>
                
            </div> 
        ";
    }
}else{
    echo  "<p class='player-info-position'>NO REGISTERED PLAYER. CLICK ADD PLAYER TO REGISTER PLAYERS</p>";
}
?>
</div>



</section>
</body>
</html>
<?php $connection->close() ?>