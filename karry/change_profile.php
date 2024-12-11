<?php
session_start();

// Absolute path to the data file
$dataFile = __DIR__ . '/assets/data/about_me.txt';  // Use __DIR__ to ensure correct path

// Default values for the fields
$aboutMe = "I am Karry James B. Omay, currently 20 years old, living in Mancup Calasiao Pangasinan. I am a freshman at Universidad de Dagupan.";
$tools = "I use Alight Motion on my mobile phone because it is convenient. On my PC, I use Adobe Photoshop and After Effects for editing.";
$experience = "I have some experience in editing. I edited the logo of R1MC Dagupan Oxygen Powerplant, and I have also edited content for social media pages and groups.";
$skills = "1. Video Editing\n2. Graphic Design\n3. Social Media Management";
$achievements = "1. Completed the editing project for R1MC Dagupan Oxygen Powerplant logo.\n2. Edited content for various social media platforms.";
$achievementImage = "assets/images/achievement_image.jpg";

// Check if the file exists and is writable
if (!file_exists($dataFile)) {
    die("Error: The file '$dataFile' does not exist. Please create it.");
}

if (!is_writable($dataFile)) {
    die("Error: The file '$dataFile' is not writable. Please check file permissions.");
}

// Load current data from the file
if (file_exists($dataFile)) {
    $content = file_get_contents($dataFile);
    $dataParts = explode("\n---\n", $content);

    // Ensure data parts are properly initialized
    $aboutMe = $dataParts[0] ?? $aboutMe;
    $tools = $dataParts[1] ?? $tools;
    $experience = $dataParts[2] ?? $experience;
    $skills = $dataParts[3] ?? $skills;
    $achievements = $dataParts[4] ?? $achievements;
    $achievementImage = $dataParts[5] ?? $achievementImage;
}

// Save data if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $aboutMe = $_POST['about_me'] ?? '';
    $tools = $_POST['tools'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $achievements = $_POST['achievements'] ?? '';
    $skills = $_POST['skills'] ?? '';

    // Create the content to save to the file
    $content = implode("\n---\n", [$aboutMe, $tools, $experience, $skills, $achievements, $achievementImage]);

    // Write the content to the file
    if (file_put_contents($dataFile, $content)) {
        // Set the success message
        $_SESSION['success_message'] = "Profile settings updated successfully!";
        // Redirect back to the Change Profile page with an updated parameter
        header("Location: change_profile.php?updated=true");
        exit;
    } else {
        // If file could not be written, show an error
        $_SESSION['error_message'] = "Error: Could not save the profile. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Settings - Karry James Portfolio</title>
    <link rel="stylesheet" href="assets/changestylee.css">
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
                    <li><a href="myportfolio.php">MY PORTFOLIO</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="change_profile.php" class="active">CHANGE</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="change-profile" class="change-profile">
        <div class="container">
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="success-message"><?= $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message"><?= $_SESSION['error_message']; ?></div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <h2>Change Profile Settings</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="about_me">About Me:</label>
                    <textarea id="about_me" name="about_me" rows="5"><?= htmlspecialchars($aboutMe) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tools">What Editing Tools I Use:</label>
                    <textarea id="tools" name="tools" rows="5"><?= htmlspecialchars($tools) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="experience">My Experience:</label>
                    <textarea id="experience" name="experience" rows="5"><?= htmlspecialchars($experience) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="skills">My Skills:</label>
                    <textarea id="skills" name="skills" rows="5"><?= htmlspecialchars($skills) ?></textarea>
                </div>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </section>

</body>
</html>
