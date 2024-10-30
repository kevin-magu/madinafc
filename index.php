<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/common-styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<section class="homepage-wrapper">
    <?php include 'includes/navbar.html' ?>
        <div class="section-overlay"></div>
        <div class="club-name-wrapper">
                <p class="club-name">
                    MADINA <span> FC</span>     
                </p>
                <p class="club-slogan">UNITY, PASSION, VICTORY</p>
            </div>
        <div class="homepage-bottom">
            
            <div class="hero-upcoming-and-match-results-wrapper hero-upcoming-match-">
                <p class="title">Upcoming Match</p>
                <div class="card">
                    <p class="league-name">Wajir County League</p>
                    <div class="card-center-wrapper">
                        <div class="team-and-logo">
                            <span>Madina FC</span>
                            
                            <div class="hero-card-team-logo hero-card-team-logo-home team-circle-logo" style="background-image: url(./images/madina-logo.png)">
                            <div class="team-logo-overlay">P.FC</div>
                            </div>
                        </div>
                        <p class="hero-card-vs">VS</p>
                        <div class="team-and-logo">
                            <span>Superstars FC</span>
                            <div class="hero-card-team-logo team-and-logo-away" >
                            <div class="team-logo-overlay">S.FC</div>
                            </div>
                        </div>
                    </div>
                    <p class="hero-match-location">Wajir Town</p>
                    <p class="hero-match-date">12/11/2024</p>
                    

                </div>
            </div>
         
        </div>
        <div class="hero-buttons-wrapper">
                <a href=""><button>Upcoming Matches</button></a>
                <a href=""><button>Recent Matches</button></a>
                <a href=""><button>Support Us</button></a>
            </div>
</section>

<section class="about-madina-wrapper">
    <p class="about-us-title">ABOUT US</p>
    <p class="about-us-context">
        Founded with a passion for football and community spirit, Madina FC is more than just
        a football club. We are a family united by our love for the beautiful game, striving to
        foster talent, teamwork, and sportsmanship. Established in [Year], we have grown from
        humble beginnings into a competitive force, providing opportunities for players of all
        ages and skill levels to thrive both on and off the field.
        At Madina FC, we believe in nurturing future stars while building strong community
        ties. Whether you're here to play, support, or be part of something bigger, you're
        always welcome. Join us on this journey, where every kick counts and every match
        brings us closer together.
    </p>
    <button>Read More</button>
</section>

<section class="upcoming-matches-wrapper">
    <p class="section-title">Upcoming Matches & Results</p>
    <div class="homepage-results-cards-wrapper">
        .
    </div>

    
</section>

<script src="./scripts/index.js"></script>    
</body>
</html>