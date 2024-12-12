<?php
$projectsContent = file_get_contents('content/projects.txt');
if ($projectsContent === false) {
    echo "Error: Unable to load projects content.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Professional Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    
    <header class="main-header">
        <div class="container">
            <nav class="navbar">
                <h1 class="logo">Emplica's<span>&nbsp;Portfolio</span></h1>
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="projects.php" class="active">Projects</a></li>
                    <li><a href="skills.php">Skills</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="projects" id="projects">
    <h1 class="heading">My <span>Projects</span></h1>

    <div class="box-container">

  
        <div class="box">
            <div class="image">
                <img src="hehe.jpg" alt="Project 1">
            </div>
            <div class="content">
                <h3>FINAL PROJECT DEFENSE</h3>
                <p>My first HTML project was a sign-up form. It included input fields for user information like name, email, and password, along with buttons for submission and reset. This project helped me understand the basics of form elements, input validation, and user interaction on a webpage.</p>
            </div>
        </div>

      
        <div class="box">
            <div class="image">
                <img src="Emplica.jpg" alt="Project 2">
            </div>
            <div class="content">
                <h3>GAME PROJECT</h3>
                <p>Snakesh is a modern twist on the classic "Snake" game. This interactive game combines engaging gameplay mechanics with vibrant visuals and customizable features, providing a fresh experience for players of all ages.</p>
            </div>
        </div>

       
        <div class="box">
            <div class="image">
                <img src="1st.png" alt="Project 3">
            </div>
            <div class="content">
                <h3>PROGRAMMING PROJECT</h3>
                <p>This is my first programming project. It is very challenging, but I’m proud that I created it myself, and it’s working.</p>
            </div>
        </div>

    </div>
</section>

</body>
</html>
