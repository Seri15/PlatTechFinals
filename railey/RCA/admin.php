<?php

$personalInfoFile = "data/personal_info.txt";


$defaultPersonalInfo = [
    'full_name' => 'Railey Aquino',
    'birthday' => 'March 15, 2004',
    'place_of_birth' => 'Dagupan City, Pangasinan',
    'current_residence' => 'A.B. Fernandez East, Dagupan City, Pangasinan',
    'nationality' => 'Filipino',
    'languages_spoken' => 'English, Filipino'
];


if (file_exists($personalInfoFile)) {
    $personalInfo = json_decode(file_get_contents($personalInfoFile), true);
} else {
    $personalInfo = $defaultPersonalInfo;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $personalInfo = [
        'full_name' => htmlspecialchars($_POST['full_name']),
        'birthday' => htmlspecialchars($_POST['birthday']),
        'place_of_birth' => htmlspecialchars($_POST['place_of_birth']),
        'current_residence' => htmlspecialchars($_POST['current_residence']),
        'nationality' => htmlspecialchars($_POST['nationality']),
        'languages_spoken' => htmlspecialchars($_POST['languages_spoken'])
    ];

   
    file_put_contents($personalInfoFile, json_encode($personalInfo));
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - Personal Information</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body background="_d1b66561-9ec7-479e-b450-4846ebb724e5.jpg">
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
        <h2>PERSONAL INFORMATION</h2>

     
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
      <h2>Update Personal Information</h2>
      <form method="POST" action="">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($personalInfo['full_name']); ?>" required>

        <label for="birthday">Birthday</label>
        <input type="text" id="birthday" name="birthday" value="<?php echo htmlspecialchars($personalInfo['birthday']); ?>" required>

        <label for="place_of_birth">Place of Birth</label>
        <input type="text" id="place_of_birth" name="place_of_birth" value="<?php echo htmlspecialchars($personalInfo['place_of_birth']); ?>" required>

        <label for="current_residence">Current Residence</label>
        <input type="text" id="current_residence" name="current_residence" value="<?php echo htmlspecialchars($personalInfo['current_residence']); ?>" required>

        <label for="nationality">Nationality</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($personalInfo['nationality']); ?>" required>

        <label for="languages_spoken">Languages Spoken</label>
        <input type="text" id="languages_spoken" name="languages_spoken" value="<?php echo htmlspecialchars($personalInfo['languages_spoken']); ?>" required>

        <button type="submit" class="update-button">Update Information</button>
      </form>
    </div>

  </div>

</body>
</html>
