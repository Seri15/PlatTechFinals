<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="assets/contactstyle.css">
    <!-- Font Awesome for social media icons -->
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
                <li><a href="about.php">ABOUT ME</a></li>
                <li><a href="myportfolio.php">MY PORTFOLIO</a></li>
                <li><a href="contact.php" class="active">CONTACT</a></li>
                <li><a href="change_profile.php">CHANGE</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Contact Section -->
<section id="contact">
    <h1>Contact</h1>
    <div class="contact-box">
        <!-- Contact Information and Contact Form in One Box -->
        <div class="contact-content">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2>Contact Information</h2>
                <p><strong>Address:</strong> Mancup, Calasiao, Pangasinan</p>
                <p><strong>Phone:</strong> (63) 977-028-3610</p>
                <p><strong>Email:</strong> <a href="karryjames12gmail.com">karryjames12gmail.com</a></p>
                <p><strong>Email:</strong> <a href="omaykb.955.stud@cdd.edu.ph">omaykb.955.stud@cdd.edu.ph</a></p>
                
                <!-- Social Media Icons -->
                <div class="social-icons">
                    <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://github.com/omay531" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.facebook.com/karryjames.omay/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/_sleepy_noir/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Send Us a Note</h2>
                <form action="contact.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" rows="5" placeholder="Tell us more about your needs..." required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>


<?php
// File to store submissions
$submissionsFile = 'submissions/contact_submissions.txt';

// Ensure the directory exists
if (!is_dir('submissions')) {
    mkdir('submissions', 0755, true);
}

// Error handling
$errors = [];

// Process the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name)) $errors[] = "Name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";
    if (empty($message)) $errors[] = "Message is required.";

    // If no errors, save the submission
    if (empty($errors)) {
        $submission = "Name: $name\nEmail: $email\nMessage: $message\n";
        $submission .= "---------------------\n";

        if (file_put_contents($submissionsFile, $submission, FILE_APPEND)) {
            echo "<script>alert('Your message has been sent successfully!'); window.location.href='contact.php';</script>";
        } else {
            $errors[] = "Failed to save the submission.";
        }
    }
}

// If there are errors, display them
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<script>alert('$error'); window.location.href='contact.php';</script>";
    }
}
?>


