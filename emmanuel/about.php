<?php 
// File path for storing about information
$filePath = 'content/about.txt';

$name = $age = $course = $birthday = $website = $phone = $email = "";

try {
    // Check if the file exists
    if (!file_exists($filePath)) {
        throw new Exception("The file does not exist.");
    }

    // Try to read the file content
    $content = file_get_contents($filePath);
    if ($content === false) {
        throw new Exception("Failed to read the file.");
    }

    // Parse the content
    $data = explode('|', $content);
    if (count($data) < 7) {
        throw new Exception("The file content is not in the expected format.");
    }

    // Assign values from the file to variables
    $name = $data[0] ?? "";
    $age = $data[1] ?? "";
    $course = $data[2] ?? "";
    $birthday = $data[3] ?? "";
    $website = $data[4] ?? "";
    $phone = $data[5] ?? "";
    $email = $data[6] ?? "";

} catch (Exception $e) {
    // Handle errors and display user-friendly messages
    $error_message = $e->getMessage();
    echo "<p style='color: red;'>Error: $error_message</p>";
}

$message = "";
if (isset($_GET['update']) && $_GET['update'] === 'success') {
    $message = "Details updated successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Professional Portfolio</title>
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
                    <li><a href="about.php" class="active">About</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="skills.php">Skills</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="abouts">
    <div class="row">

        <div class="image">
            <img src="markss.jpg" alt="">
        </div>
        <div class="contents">
        <h2>About Me</h2>
        <?php if ($message): ?>
            <p class="success-message"><?php echo $message; ?></p>
        <?php endif; ?>
        <?php if (empty($error_message)): ?>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?></p>
            <p><strong>Course/block:</strong> <?php echo $course; ?></p>
            <p><strong>Birthday:</strong> <?php echo $birthday; ?></p>
            <p><strong>Website:</strong> <a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <a href="update.php" class="btn">Update Details</a>
        <?php endif; ?>
        </div>
        </div>
    </section>
</body>
</html>
