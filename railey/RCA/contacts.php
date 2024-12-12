<?php
$file = 'messages.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if ($email && $name && $message) {
        
        $entry = json_encode(['name' => $name, 'email' => $email, 'message' => $message]) . PHP_EOL;
        file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
    } else {
        echo '<p style="color: red;">Invalid form data, please try again.</p>';
    }
}

if (isset($_GET['delete'])) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    
    if (isset($lines[$_GET['delete']])) {
        unset($lines[$_GET['delete']]); 
        file_put_contents($file, implode(PHP_EOL, $lines) . PHP_EOL);
    }
    
    header("Location: contacts.php"); 
    exit;
}


$messages = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="_01435b08-fe59-4634-a8e0-6c8f15b50c07.jpg">
    <header class="header">
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

    <div class="main-container">
        
        <div class="form-container">
            <h1>Contact Me</h1>
            <form method="POST" action="contacts.php">
                
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? ''; ?>">

                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                <button type="submit">Submit</button>
            </form>

            <div class="info-box">
                <div class="card">
                    
                    <h3>Personal Contact Information</h3>
                    <p>Email: railclores@gmail.com</p>
                    <p>Phone: +63 930 558 8392</p>
                    <p>Address: A.B Fernandez East, Dagupan city Pangasinan</p>

                    <h3>Social Media Accounts</h3>
                    <p>Facebook: <a href="https://www.facebook.com/railey.aquino.2024" target="_blank" rel="noopener noreferrer">Railey Aquino</a></p>
                    <p>Instagram: <a href="https://www.instagram.com/rai.ley.10/" target="_blank" rel="noopener noreferrer">rai.ley.10</a></p>

                    <h3>Student Information</h3>
                    <p>Student ID: 23-0010-519</p>
                    <p>CdD Email: aquinorc.519.stud@cdd.edu.ph</p>
                    <p>Phone: +63 930 558 8392</p>
                </div>
            </div>
        </div>

       
        <div class="inbox-container">
            <h2>Inbox</h2>
            <?php if (!empty($messages) && array_filter($messages)): ?>
                <?php foreach ($messages as $index => $msg): ?>
                    <?php $data = json_decode($msg, true); ?>
                    <?php if ($data): ?>
                        <div class="message">
                            <p><strong>Name:</strong> <?= htmlspecialchars($data['name']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
                            <p><strong>Message:</strong> <?= htmlspecialchars($data['message']) ?></p>
                            <form method="GET" style="display:inline;">
                                <button type="submit" name="delete" value="<?= $index ?>" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No messages. Inbox is empty.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
