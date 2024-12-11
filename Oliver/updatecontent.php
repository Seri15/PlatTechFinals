<?php
// Simple authorization - replace with better security in production
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aboutContent = $_POST['about'];
    $skillsContent = $_POST['skills'];

    // Define the file paths for each section
    $aboutFilePath = "content/about.txt";
    $skillsFilePath = "content/skills.txt";

    // Update About Me section
    if (file_exists($aboutFilePath) && is_writable($aboutFilePath)) {
        $file = fopen($aboutFilePath, 'w');
        if ($file) {
            fwrite($file, $aboutContent);
            fclose($file);
        } else {
            echo "Error: Unable to write to the About Me file.";
        }
    } else {
        echo "Error: The About Me file doesn't exist or is not writable.";
    }

    // Update Skills section
    if (file_exists($skillsFilePath) && is_writable($skillsFilePath)) {
        $file = fopen($skillsFilePath, 'w');
        if ($file) {
            fwrite($file, $skillsContent);
            fclose($file);
        } else {
            echo "Error: Unable to write to the Skills file.";
        }
    } else {
        echo "Error: The Skills file doesn't exist or is not writable.";
    }

    echo "<h1>Content Updated!<h1/>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Portfolio Content</title>
</head>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: Arial, sans-serif;
    background:url(/Oliver/img/pawel.jpg) no-repeat;
    background-size: cover;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}


h2, h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    color: white;
}


form {
    max-width: 700px;
    margin: 0 auto;
    background-color: whitesmoke;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


label {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 8px;
    display: inline-block;
    color: dark grey;
}

textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    resize: vertical;
    margin-bottom: 20px;
    transition: border 0.3s ease;
}

textarea:focus {
    border-color: #4A90E2;
    outline: none;
}


button {
    background-color: grey;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    width: 100%;
}

button:hover {
    background-color: darkmagenta;
}


form[action="index.php"] {
    margin-top: 20px;
}

button[type="submit"] {
    width: auto;
    margin: 0 auto;
    display: block;
}


.error, .success {
    color: #D9534F;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
}

.success {
    color: #5bc0de;
}

 
@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    form {
        padding: 15px;
        width: 100%;
    }

    h2 {
        font-size: 1.5rem;
    }

    button {
        width: 100%;
    }
}

</style>
<body>

<h2>Update Portfolio Content</h2>


<form action="updateContent.php" method="POST">
   
    <label for="about">Edit About Me Content:</label><br>
    <textarea name="about" id="about" rows="10" cols="50"><?php echo file_get_contents('/Oliver/about.txt'); ?></textarea><br><br>

   
    <label for="skills">Edit Skills Content:</label><br>
    <textarea name="skills" id="skills" rows="10" cols="50"><?php echo file_get_contents('/Oliver/skills.txt'); ?></textarea><br><br>

    
    <button type="submit">Update Content</button>
</form>

<form action="index.php" method="GET">
    <button type="submit">HOME</button>
</form>

</body>
</html>
