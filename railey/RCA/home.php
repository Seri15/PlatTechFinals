<?php
$contentFile = 'content.json';


if (file_exists($contentFile)) {
    $content = json_decode(file_get_contents($contentFile), true);
} else {
    $content = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body background="_e042c64d-f563-4fa7-b445-2e1abd58cf3b.jpg">
 
  <header class="navbar">
    <nav>
      <ul class="nav-links">
      <div style="position: relative; right: 200px; top: 0px;"><a href="/index.php"><img src="/karry/assets/images/return-black.png" alt="" style="width: 30px;"></a></div>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="skills.php">Skills</a></li>
        <li><a href="project.php">Projects</a></li>
        <li><a href="contacts.php">Contacts</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="text-content">
        <!-- Welcome Text -->
        <p class="highlight">
          <?php echo file_exists('content/welcome.txt') ? file_get_contents('content/welcome.txt') : 'Welcome to my Portfolio'; ?>
        </p>

        <!-- Heading -->
        <h1 class="heading">
          <?php echo file_exists('content/heading.txt') ? file_get_contents('content/heading.txt') : "Barrozo, Gwen Mae D."; ?>
        </h1>

        <!-- Description -->
        <p>
          <?php echo file_exists('content/description.txt') ? file_get_contents('content/description.txt') : '21-ITE-04'; ?>
        </p>
      </div>

      <!-- Profile Picture -->
      <div class="profile-picture">
        <img src="462652664_943064491225297_2624968001083912586_n.jpg" alt="Profile Picture">
      </div>
    </div>
  </section>

</body>
</html>
