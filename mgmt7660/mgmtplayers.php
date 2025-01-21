<?php 
    ini_set('display_errors', 1);
    include '../includes/connection.php';
    $sqlQuery = "SELECT playerName,fieldNumber,position,joinDate FROM player";
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

<table>  
    <thead>
        <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Position</th>
        <th>In the club since</th>
        </tr>
    </thead>
<tbody>    
<?php 
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td> " .$row['playerName'] . "</td>
                    <td> " .$row['fieldNumber'] . "</td>
                    <td> " .$row['position'] . "</td>
                    <td> " .$row['joinDate'] . "</td>
                 </tr>";
        }
    }else{
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
?>
</tbody>
</table>  
<?php 
// display search results
if($_SERVER['request_method']==POST){

}

?>

</section>
</body>
</html>
<?php $connection->close() ?>