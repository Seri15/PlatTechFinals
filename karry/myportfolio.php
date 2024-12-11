<?php
session_start();


if (!isset($_SESSION['projects']) || !is_array($_SESSION['projects'])) {
 
    $_SESSION['projects'] = [
        "This is my first website project",
        "This is a project my classmates and I worked on.",
        "This is a login form we designed for our activity.",
        "This is our final project."
    ];
    
    error_log("Projects array is not set or not an array. Using default values.");
}

$boxImages = [
    "assets/images/project1.png", 
    "assets/images/project2.png", 
    "assets/images/project3.png", 
    "assets/images/project4.jpg"
];


foreach ($boxImages as $image) {
    if (!file_exists($image)) {
       
        error_log("Image file not found: " . $image);
        
        $image = "assets/images/default_image.jpg";
    }
}


$projectLinks = [
    "work/Home.html", 
    "final chatbot/main.html", 
    "login/login.html", 
    "game/App.java"  
];


foreach ($projectLinks as $link) {
    if (!file_exists($link)) {
        
        error_log("Link not found: " . $link);
        
        $link = "#";  
    }
}


$projectTitles = [
    "Personal Portfolio Website",
    "Group Project: Final Chatbot",
    "Login Form Design",
    "Capstone Project: Java App"
];

$projectDescriptions = [
    "This is my personal portfolio website where I showcase my skills and past work.",
    "A group project for our final semester, developing a chatbot to assist with basic queries.",
    "A login form designed with HTML, CSS, and JavaScript to demonstrate user authentication.",
    "A Java-based application developed as the final capstone project of my programming course."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - Karry James Portfolio</title>
    <link rel="stylesheet" href="assets/portfoliostyles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1>Karry James B. Omay</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT ME</a></li>
                    <li><a href="myportfolio.php" class="active">MY PORTFOLIO</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="change_profile.php">CHANGE</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="projects" class="projects">
        <div class="container">
            <h2>Projects</h2>

          
            <div class="project-boxes">
                <?php foreach ($_SESSION['projects'] as $index => $desc): ?>
                    <a href="<?= htmlspecialchars($projectLinks[$index]) ?>" class="project-link">
                        <div class="project-box">
                            <div class="project-img">
                                <img src="<?= htmlspecialchars($boxImages[$index]) ?>" alt="Project Image">
                            </div>
                            <div class="project-description">
                                <p class="project-title"><strong><?= htmlspecialchars($projectTitles[$index]) ?></strong></p>
                                <p class="description-text"><?= htmlspecialchars($projectDescriptions[$index]) ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <h3 class="middle-heading">Achievements</h3>

  
            <div class="project-boxes">
                <div class="project-box">
                    <div class="project-img">
                        <img src="assets/images/achievement1.jpg" alt="Additional Project Image">
                    </div>
                    <div class="project-description">
                        <p class="project-title"><strong>CODM Siteweek eGames Champions</strong></p>
                        <p class="description-text">My team and I emerged as champions in the Siteweek eGames for Call of Duty Mobile.</p>
                    </div>
                </div>

                <div class="project-box">
                    <div class="project-img">
                        <img src="assets/images/achievement2.jpg" alt="Additional Project Image">
                    </div>
                    <div class="project-description">
                        <p class="project-title"><strong>CODM Intramurals eGames Champions</strong></p>
                        <p class="description-text">We proudly won the championship in the Intramurals eGames for Call of Duty Mobile.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
