<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'];
    
    $newContent = trim($_POST[$section . '-text-edit'] ?? '');
    
    $filePath = '';
    switch ($section) {
        case 'intro':
            $filePath = 'intro.txt';
            break;
        case 'info':
            $filePath = 'info.txt';
            break;
        case 'dream':
            $filePath = 'dream.txt';
            break;
        default:
            echo "<p>Invalid section.</p>";
            exit;
    }
    
    // Check if the file exists and is writable
    if (file_exists($filePath) && is_writable($filePath)) {
        // Write the new content to the respective file
        if (file_put_contents($filePath, $newContent) !== false) {
            // Redirect back to the about section of the page after saving
            header('Location: index.php#about-me');
            exit;
        } else {
            echo "<p>Error saving the file.</p>";
        }
    } else {
        echo "<p>File does not exist or is not writable.</p>";
    }
}
?>
