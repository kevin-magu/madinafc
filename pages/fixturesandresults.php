<?php 
include '../includes/connection.php';
ini_set('display_errors', 1);

$query = 'SELECT * FROM fixtures';
$query_exe = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../images/madina-logo.png" />
    <script src="https://kit.fontawesome.com/e4c074505f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/common-styles.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/fixtures.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures & Results</title>
</head>
<body>
    <?php include '../includes/navbar.html' ?>
    <section class="fixtures-body-wrapper">
        <div class="fitures-highlights">
            <a href="" class="section1 upcoming-match">
                <p class="upcoming-match-title">Upcoming Match</p>
                <p class="teams"><span>Madina FC</span><span>vs</span> <span>Wajir FC</span></p>
                <p class="location-and-time"><span>Wajir Field</span> <span>6.40pm</span> </p>
            </a>
            <a href="" class="section2 recent-match">
                <p class="upcoming-match-title">Recent Match</p>
                <p class="teams"><span>Madina FC</span> <span class="goal-number home-goal-number">4</span> : <span class="goal-number away-goal-number">1</span> <span>Wajir FC</span></p>
                <p class="location-and-time"><span>Wajir Field</span> <span>6.40pm</span> </p>
            </a>
        </div>

        <section class="fixtures-and-results">
            <div class="upcoming-matches">
                <p></p>
            </div>
            <div class="recent-results">

            </div>
        </section>
    </section>
    <?php include '../includes/footer.html' ?>
</body>
</html>