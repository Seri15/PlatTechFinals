<?php

$datatwo = json_decode(file_get_contents('subdata.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal-work-skills</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  
  <header class="navbar">
    <nav>
      <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="skills.php">Skills</a></li>
        <li><a href="project.php">Projects</a></li>
        <li><a href="contacts.php">Contacts</a></li>
      </ul>
    </nav>
  </header>

 
  <section class="personal-work-skills">
    <div class="container">
      
      <h2><?= htmlspecialchars($datatwo['subTitle']) ?></h2>
      <p><?= htmlspecialchars($datatwo['subDescription']) ?></p>

     
      <div class="cards">
        <?php foreach ($datatwo['softskills'] as $skilltwo): ?>
          <div class="card">
            <h3><?= htmlspecialchars($skilltwo['subtitle']) ?></h3>
            <p><?= htmlspecialchars($skilltwo['subdescription']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  
  <div class="pagination">
    <a href="skills.php" class="dot"></a>
    <a href="page2.php" class="dot active"></a>
  </div>

</body>
</html>
