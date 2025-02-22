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
<p class="greetings">It's time to add new players to the team !</p>
<div class="form-continer">
    <form action="addplayerprocessing.php" method="POST" enctype="multipart/form-data">
        <?php if(isset($_SESSION['player_added_success'])){
            echo "<p class='success-message'>" . $_SESSION['player_added_success'] . "</p>";
            unset($_SESSION['player_added_success']);
            }else if(isset($_SESSION['player_added_error'])){
                echo "<p class='error-message'>" . $_SESSION['player_added_error'] . "</p>";
                unset($_SESSION['player_added_error']);
            }else if($_SESSION['player_exists']){
                echo "<p class='error-message'>" . $_SESSION['player_exists'] . "</p>";
                unset($_SESSION['player_exists']);
            }else if($_SESSION['file_upload_error']){
                echo "<p class='error-message'> ".$_SESSION['file_upload_error']."</p>";
            }else if($_SESSION['file_type_error']){
                echo "<p class='error-message'>".$_SESSION['file_type_error']."</p>";
            }
        ?>
        <input type="text" name='playerName' placeholder="Player Name" >
        <input type="number" name='nationalID' placeholder="National ID number" >
        <input type="number" name='fieldNumber' placeholder="Field Number" >
        <select type="text" name='position' placeholder="Position" >
            <option value="Goalkeeper (GK)">Goalkeeper (GK)</option>
            <option value="Center-Back (CB)">Center-Back (CB)</option>
            <option value="Right-Back (RB)">Right-Back (RB)</option>
            <option value="Left-Back (LB)">Left-Back (LB)</option>
            <option value="Right Wing-Back (RWB)">Right Wing-Back (RWB)</option>
            <option value="Left Wing-Back (LWB)">Left Wing-Back (LWB)</option>
            <option value="Sweeper (SW)">Sweeper (SW)</option>
            <option value="Defensive Midfielder (DM)">Defensive Midfielder (DM)</option>
            <option value="Central Midfielder (CM)">Central Midfielder (CM)</option>
            <option value="Attacking Midfielder (AM)">Attacking Midfielder (AM)</option>
            <option value="Right Midfielder (RM)">Right Midfielder (RM)</option>
            <option value="Left Midfielder (LM)">Left Midfielder (LM)</option>
            <option value="Striker (ST)">Striker (ST)</option>
            <option value="Center-Forward (CF)">Center-Forward (CF)</option>
            <option value="Second Striker (SS)">Second Striker (SS)</option>
            <option value="Right Winger (RW)">Right Winger (RW)</option>
            <option value="Left Winger (LW)">Left Winger (LW)</option>>
        </select>    
        <input type="number" name='joinDate' placeholder="Year of joining">
        <input type="file"  accept="image/*" onchange="previewImage(event)" name="playerImage" required>
        <button type="submit">Submit</button>   
    </form>

    <div class="image-preview-container">
        <img src="" alt="" id="imagePreview" alt="Image Preview">

        <script>
            function previewImage(event){
                var file = event.target.files[0];//gets the selected file
                var reader = new FileReader(); // creates a new file reader

                reader.onload= function(){
                  // When the file is read, set the preview image source
                  var imagePreview = document.getElementById('imagePreview');
                  imagePreview.src = reader.result;
                  imagePreview.style.display='block';
                };
                if(file){
                    reader.readAsDataURL(file); //convert the file to a data URL
                }
                console.log("the script run");
            }
        </script>
    </div>
</div>    
</body>
</html>