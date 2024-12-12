    <?php 
    $homeContent = file_get_contents('content/home.txt');
    if ($homeContent === false) {
        echo "Error: Unable to load home content.";
        exit();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professional Portfolio</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="main-header">
            <div class="container">
                <nav class="navbar">
                    <h1 class="logo">Emplica's<span>&nbsp;Portfolio</span></h1>
                    <ul class="nav-links">
                        <li><a href="home.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="projects.php">Projects</a></li>
                        <li><a href="skills.php">Skills</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="home" class="hero">
        <div style="position: relative; right: 600px; top: -100px;"><a href="/index.php"><img src="/karry/assets/images/return-white.png" alt="" style="width: 50px;"></a></div>
            <div class="container hero-content">
                <div class="text-section">
                    <p class="hero-greeting">Hello, Welcome to my Portfolio!</p>
                    <h1 class="hero-title">
                        I'm <span>Mark Emmanuel M. Emplica</span>
                    </h1>
                    <p class="hero-description">
                        Welcome to my personal space where creativity and innovation come together. I am passionate about technology and constantly seeking opportunities to grow and innovate. This portfolio showcases my journey, skills, and projects.
                    </p>
                    <p class="hero-tagline">
                        "Innovating today, building tomorrow."
                    </p>
                    <a href="about.php" class="btn-primary">About me</a>
                </div>
            </div>
        </section>

    </body>
    </html>
