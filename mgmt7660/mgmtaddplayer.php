<?php session_start(); ?>
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
        <input type="number" name='fieldNumber' placeholder="Field Number">
        <select type="text" name='position' placeholder="Position">
            <option value="">Goalkeeper (GK)</option>
            <option value="">Center-Back (CB)</option>
            <option value="">Right-Back (RB)</option>
            <option value="">Left-Back (LB)</option>
            <option value="">Right Wing-Back (RWB)</option>
            <option value="">Left Wing-Back (LWB)</option>
            <option value="">Sweeper (SW)</option>
            <option value="">Defensive Midfielder (DM)</option>
            <option value="">Central Midfielder (CM)</option>
            <option value="">Attacking Midfielder (AM)</option>
            <option value="">Right Midfielder (RM)</option>
            <option value="">Left Midfielder (LM)</option>
            <option value="">Striker (ST)</option>
            <option value="">Center-Forward (CF)</option>
            <option value="">Second Striker (SS)</option>
            <option value="">Right Winger (RW)</option>
            <option value="">Left Winger (LW)</option>>
        </select>    
        <input type="number" name='joinDate' placeholder="Year of joining">

        <button type="submit">Submit</button>
        <?php if(isset($_SESSION['player_added_success'])){
            echo "<p>" . $_SESSION['player_added_success'] . "</p>";
            unset($_SESSION['player_added_success']);
        } ?>
        
    </form>
    </div>    
</body>
</html>