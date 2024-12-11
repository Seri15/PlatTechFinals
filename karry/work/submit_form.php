<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "23-2178-955"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Output the POST data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Sanitize and get form data
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password']);
    $confirm_password = trim($_POST['cpassword']);

    // Debugging: Output the passwords
    echo "Password1: $password1<br>";
    echo "Confirm Password: $confirm_password<br>";

    // Check if passwords match
    if ($password1 !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password1) VALUES (?, ?, ?)");

    // Check for prepare error
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("sss", $fullname, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Sign up recorded";
        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
