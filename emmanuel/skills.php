<?php
$skillsContent = file_get_contents('content/skills.txt');
if ($skillsContent === false) {
    echo "Error: Unable to load skills content.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills - Professional Portfolio</title>
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
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="skills.php" class="active">Skills</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

 
    <section id="skills" class="skills">
    <h1 class="heading">My <span>Skills</span></h1>
    <div class="dots-container">
        <button id="technicalDot" class="dot active">Technical Skills</button>
        <button id="softDot" class="dot">Soft Skills</button>
    </div>

    
    <div id="technicalSkills" class="skills-box-container active">
        <div class="box">
            <h3>HTML</h3>
            <p>Building structured web pages with semantic HTML.</p>
        </div>
        <div class="box">
            <h3>CSS</h3>
            <p>Styling websites with CSS, including responsive design.</p>
        </div>
        <div class="box">
            <h3>JavaScript</h3>
            <p>Adding interactivity to websites and web applications.</p>
        </div>
        <div class="box">
            <h3>PHP</h3>
            <p>Server-side scripting and dynamic website development.</p>
        </div>
        <div class="box">
            <h3>MySQL</h3>
            <p>Database design and management for web applications.</p>
        </div>
    </div>

   
    <div id="softSkills" class="skills-box-container">
        <div class="box">
            <h3>Communication</h3>
            <p>Clear and effective verbal and written communication.</p>
        </div>
        <div class="box">
            <h3>Teamwork</h3>
            <p>Collaborating effectively with diverse teams.</p>
        </div>
        <div class="box">
            <h3>Problem</h3>
            <p>Analyzing and resolving complex challenges efficiently.</p>
        </div>
        <div class="box">
            <h3>Time Manage</h3>
            <p>Prioritizing tasks and meeting deadlines effectively.</p>
        </div>
        <div class="box">
            <h3>Adaptability</h3>
            <p>Quickly adjusting to new environments and technologies.</p>
        </div>
    </div>
</section>

<script>
    const technicalDot = document.getElementById('technicalDot');
    const softDot = document.getElementById('softDot');
    const technicalSkills = document.getElementById('technicalSkills');
    const softSkills = document.getElementById('softSkills');

    technicalDot.addEventListener('click', () => {
        technicalSkills.classList.add('active');
        softSkills.classList.remove('active');
        technicalDot.classList.add('active');
        softDot.classList.remove('active');
    });

    softDot.addEventListener('click', () => {
        softSkills.classList.add('active');
        technicalSkills.classList.remove('active');
        softDot.classList.add('active');
        technicalDot.classList.remove('active');
    });
</script>

</body>
</html>
