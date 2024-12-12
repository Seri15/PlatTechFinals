<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $uploadDir = __DIR__ . '/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['attachment']['name']);
    $uploadSuccess = false;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }


    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $fileType = pathinfo($uploadFile, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'png', 'pdf', 'docx'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadFile)) {
                $uploadSuccess = true;
            }
        }
    }

    $submissionData = "Name: $name\n";
    $submissionData .= "Email: $email\n";
    $submissionData .= "Message: $message\n";
    $submissionData .= "File: " . ($_FILES['attachment']['name'] ? $_FILES['attachment']['name'] : 'No file uploaded') . "\n";
    $submissionData .= "Date: " . date('Y-m-d H:i:s') . "\n";
    $submissionData .= str_repeat("=", 40) . "\n"; 

    
    $filePath = __DIR__ . '/contact_submission.txt';
    file_put_contents($filePath, $submissionData, FILE_APPEND);

    if ($uploadSuccess || empty($_FILES['attachment']['name'])) {
        header("Location: contact.php?status=success");
    } else {
        header("Location: contact.php?status=error");
    }
    exit();
} else {
    header("Location: contact.php");
    exit();
}
?>
