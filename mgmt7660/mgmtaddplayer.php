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
    <title>Add Player</title>
</head>
<body>
<?php include './adminincludes/navbar.php' ?> 
<p class="greetings">It's time to add new players to the team</p>
<div class="form-continer">
    <form action="addplayerprocessing.php" method="POST">
        <input type="text" name='playerName' placeholder="Player Name">
        <input type="text" name='nationalID' placeholder="National ID number">
        <input type="text" name='fieldNumber' placeholder="Field Number">
        <input type="text" name='position' placeholder="Position">
        <label for=""> In the club since:</label>
        <input type="date" name='joinDate' placeholder="In the club since">
        <input type="text" name='clubStatus' placeholder="status">
        <button type="submit">Submit</button>
    </form>
    </div>    
</body>
</html>