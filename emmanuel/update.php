<?php
$filePath = 'content/about.txt';

$name = $age = $course = $birthday = $website = $phone = $email = "";

if (file_exists($filePath)) {
    $content = file_get_contents($filePath);
    $data = explode('|', $content);

    $name = $data[0] ?? "";
    $age = $data[1] ?? "";
    $course = $data[2] ?? "";
    $birthday = $data[3] ?? "";
    $website = $data[4] ?? "";
    $phone = $data[5] ?? "";
    $email = $data[6] ?? "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $course = htmlspecialchars($_POST['course']);   
    $birthday = htmlspecialchars($_POST['birthday']);
    $website = htmlspecialchars($_POST['website']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);


    $newContent = implode('|', [$name, $age, $course, $birthday, $website, $phone, $email]);
    if (file_put_contents($filePath, $newContent) !== false) {
        header("Location: about.php?update=success");
        exit();
    } else {
        echo "Error: Unable to update details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details - Professional Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <nav class="navbar">
                <h1 class="logo">Marky<span>HUB</span></h1>
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="skills.php">Skills</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="update" class="ups">
    <h2>Update Details</h2>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" value="" required><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder="Enter your age" value="" required><br>

        <label for="course">Course/block</label>
        <input type="course" id="course" name="course" placeholder="Enter your course/block" value="" required><br>

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="" required><br>

        <label for="website">Website:</label>
        <input type="url" id="website" name="website" placeholder="https://example.com" value="" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" value="" required><br>

        <div class="button-container">
           <a href="about.php" class="back-button">Back</a>
            <button type="submit">Update</button>
        </div>
    </form>
</section>
</body>
</html>

