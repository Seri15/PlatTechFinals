<?php
$data = json_decode(file_get_contents('data.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($data['mainTitle']) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body background="_13c80690-ceba-4ede-a9be-c0c3581124c1.jpg">

  
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

  
  <section class="expertise-area">
    <div class="container">
      <h2><?= htmlspecialchars($data['mainTitle']) ?></h2>
      <p><?= htmlspecialchars($data['mainDescription'] ?? "These are the simple skills I have.") ?></p>
      
      <div class="cards">
        <?php foreach ($data['skills'] as $skill): ?>
          <div class="card">
            <h3><?= htmlspecialchars($skill['title']) ?></h3> 
            <p><?= htmlspecialchars($skill['description']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <div class="pagination">
    <a href="skills.php" class="dot active"></a>
  </div>

</body>
</html>
