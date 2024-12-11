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
    // Get form data
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password1 FROM users WHERE email = ?");
    $stmt->bind_param("s", $login_email);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given email exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password1'];

        // Verify the password
        if (password_verify($login_password, $stored_password)) {
            echo "Login successful!";
            // Redirect to a main html 
            header("Location: Home.html");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>