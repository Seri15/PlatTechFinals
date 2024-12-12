<?php 
$contactContent = file_get_contents('content/contact.txt');
if ($contactContent === false) {
    echo "Error: Unable to load contact content.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Professional Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4C+6wNl+VoFVesVGfqvukVWo3EvPwgGpKwT+Di/h5l8F1xRXLspD8uvX7MX3DDC7b+hWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    

    <header class="main-header">
        <div class="container">
            <nav class="navbar">
                <h1 class="logo">Emplica's<span>&nbsp;Portfolio</span></h1>
                <ul class="nav-links">
                    <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php"><i class="fas fa-user"></i> About</a></li>
                    <li><a href="projects.php"><i class="fas fa-briefcase"></i> Projects</a></li>
                    <li><a href="skills.php"><i class="fas fa-tools"></i> Skills</a></li>
                    <li><a href="contact.php" class="active"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
     
    <section id="contact">
        <div class="sow">
        <h2>Contact Me</h2>

<?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <p class="success-message">Your message has been sent successfully!</p>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
    <p class="error-message">An error occurred. Please try again or check the file type.</p>
<?php endif; ?>


        <p><?php echo nl2br($contactContent); ?></p>
        <form action="process-contact.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <i class="fas fa-user"></i>
        <input type="text" name="name" placeholder="Your Name" required>
    </div>
    <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Your Email" required>
    </div>
    <div class="form-group">
        <i class="fas fa-comment-dots"></i>
        <textarea name="message" placeholder="Your Message" required></textarea>
    </div>
    <div class="form-group">
        <i class="fas fa-file-upload"></i>
        <input type="file" name="attachment">
    </div>
    <button type="submit" class="btn-primary"><i class="fas fa-paper-plane"></i> Send Message</button>
</form>
</div>
    </section>

</body>
</html>
