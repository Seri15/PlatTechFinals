<?php
session_start();

// File to store about me data
$dataFile = 'assets/data/about_me.txt';

// Load current data from the file
$aboutMe = $tools = $experience = $skills = "";
if (file_exists($dataFile)) {
    $content = file_get_contents($dataFile);
    $dataParts = explode("\n---\n", $content);

    $aboutMe = $dataParts[0] ?? "Hello, I'm Karry James B. Omay, but you can call me James. I'm 20 years old and currently in my second year of studying Information Technology at Universidad de Dagupan. With a passion for creativity and technology, I'm working towards becoming a skilled web developer or graphic designer.";
    $tools = $dataParts[1] ?? "The tools I use include VS Code for coding and development, Figma for designing user interfaces and prototypes, and Canva for creating graphics and visual content.";
    $experience = $dataParts[2] ?? "As a second-year Information Technology student at Universidad de Dagupan, I am continuously developing my skills in web development, programming, and graphic design. I have gained valuable practical experience through various class projects and assignments, including this current project, as well as past projects I have worked on.";
    $skills = $dataParts[3] ?? "I’m currently a second-year IT student at Universidad de Dagupan. I’m building my skills in UI/UX design, web development, and problem-solving. I enjoy creating user-friendly designs, developing websites, and tackling problems with algorithms.";
} else {
    // Fallback to default values if the file doesn't exist
    $aboutMe = "Hello, I'm Karry James B. Omay, but you can call me James. I'm 20 years old and currently in my second year of studying Information Technology at Universidad de Dagupan. With a passion for creativity and technology, I'm working towards becoming a skilled web developer or graphic designer.";
    $tools = "The tools I use include VS Code for coding and development, Figma for designing user interfaces and prototypes, and Canva for creating graphics and visual content.";
    $experience = "As a second-year Information Technology student at Universidad de Dagupan, I am continuously developing my skills in web development, programming, and graphic design. I have gained valuable practical experience through various class projects and assignments, including this current project, as well as past projects I have worked on.";
    $skills = "I’m currently a second-year IT student at Universidad de Dagupan. I’m building my skills in UI/UX design, web development, and problem-solving. I enjoy creating user-friendly designs, developing websites, and tackling problems with algorithms.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Karry James's Portfolio</title>
    <link rel="stylesheet" href="assets/aboutstyle.css">
    <!-- Link Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                    <li><a href="about.php" class="active">ABOUT ME</a></li>
                    <li><a href="myportfolio.php">MY PORTFOLIO</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="change_profile.php">CHANGE</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="about" class="about">
        <div class="container">
            <?php if (isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
                <div class="success-message">Profile updated successfully!</div>
            <?php endif; ?>

            <h2>About Me</h2>
            <p><?php echo htmlspecialchars($aboutMe); ?></p>
            <h3>What Editing Tools I Use</h3>
            <p><?php echo htmlspecialchars($tools); ?></p>
            <h3>My Experience</h3>
            <p><?php echo htmlspecialchars($experience); ?></p>

            <div class="skills">
                <h3>Skills</h3>
                <ul>
                    <?php foreach (explode("\n", $skills) as $skill): ?>
                        <li><?php echo htmlspecialchars($skill); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- Updated Social Media Section -->
    <div class="social-icons">
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/omay531"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.facebook.com/karryjames.omay/"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/_sleepy_noir/"><i class="fa-brands fa-instagram"></i></a>
    </div>

</body>
</html>
