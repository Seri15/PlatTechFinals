<?php

// File paths for personal information
$personalInfoFile = "data/personal_info.txt";

// Default personal info in case file doesn't exist
$defaultPersonalInfo = [
    'full_name' => 'Railey Aquino',
    'birthday' => 'March 15, 2004',
    'place_of_birth' => 'Dagupan City, Pangasinan',
    'current_residence' => 'A.B. Fernandez East, Dagupan City, Pangasinan',
    'nationality' => 'Filipino',
    'languages_spoken' => 'English, Filipino'
];

// Check if the personal info file exists and load its content, otherwise use defaults
if (file_exists($personalInfoFile)) {
    $personalInfo = json_decode(file_get_contents($personalInfoFile), true);
} else {
    $personalInfo = $defaultPersonalInfo;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - About</title>
  <link rel="stylesheet" href="style.css">
</head>
<body background="_40fea500-60ca-4517-b363-d6715ec1e65d.jpg">
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

  <div class="container">
    <div class="about-section">
      <div class="profile-image">
        <img src="462652664_943064491225297_2624968001083912586_n.jpg" alt="Profile Image">
      </div>
      <div class="about-content">
        <h2>Personal Information</h2>
        <h3>Full Name:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['full_name']); ?></h4>

        <h3>Birthday:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['birthday']); ?></h4>

        <h3>Place of Birth:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['place_of_birth']); ?></h4>

        <h3>Current Residence:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['current_residence']); ?></h4>

        <h3>Nationality:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['nationality']); ?></h4>

        <h3>Languages Spoken:</h3>
        <h4><?php echo htmlspecialchars($personalInfo['languages_spoken']); ?></h4>
      </div>
    </div>

    <div class="update-profile">
      <a href="admin.php" class="update-button">Update Profile</a>
    </div>

  </div>

</body>
</html>
