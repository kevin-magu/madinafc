<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php include 'includes/navbar.html' ?>
    <section class="homepage-wrapper">
        <div class="homepage-overlay"></div>
        <div class="homepage-bottom">
            <div class="club-name-wrapper">
                <p class="club-name">
                    <span>MADINA</span>
                    <SPAN>FOOTBALL</SPAN>
                    <span>CLUB</span>
                </p>
                <p class="club-slogan">Unity,Passion, Victory</p>
            </div>
            <div class="hero-upcoming-and-match-results-wrapper hero-upcoming-match-">
                <p class="title">Upcoming Match</p>
                <div class="card">
                    <p class="league-name">Wajir County League</p>
                    <div class="card-center-wrapper">
                        <div class="team-and-logo">
                            <span>Madina FC</span>
                            
                            <div class="hero-card-team-logo hero-card-team-logo-home" style="background-image: url(./images/madina-logo.png)">
                            <div class="team-logo-overlay">P.FC</div>
                            </div>
                        </div>
                        <p class="hero-card-vs">VS</p>

                        <div class="hero-card-team-logo team-and-logo-away" >
                        <div class="team-logo-overlay">P.FC</div>
                        </div>
                    </div>
                    <p class="hero-match-date"></p>
                    <p class="hero-match-location"></p>

                </div>
            </div>
            <div class="hero-upcoming-and-match-results-wrapper hero-recent-result">
                <p class="title">Recent Match Results</p>
                <div class="card">
                    
                </div>
            </div>

            <div class="hero-buttons-wrapper">
                <a href=""><button>Upcoming Matches</button></a>
                <a href=""><button>Support Us</button></a>
                
                
            </div>
        </div>
    </section>
</body>
</html>