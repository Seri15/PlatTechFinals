<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>

    <!-- CSS placed at the top of the document -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2, h3 {
            text-align: center;
            font-size: 1.8rem;
            color: black;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px 0;
            background-color: #f7f7f7;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        label {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 8px;
            display: inline-block;
            color: #4A90E2;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #4A90E2;
            outline: none;
        }

        button {
            background-color: magenta;
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

        .message {
            background-color: #e7f7ff;
            border: 1px solid #4A90E2;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 800px;
            margin-top: 20px;
        }

        .message strong {
            color: #4A90E2;
        }

        .message pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        form[action="index.php"] {
            margin-top: 20px;
            text-align: center;
        }

        button[type="submit"] {
            width: auto;
            margin: 0 auto;
            display: inline-block;
        }

        a {
            display: inline-block;
            background-color: grey;
            color: white;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        a:hover {
            background-color: darkmagenta;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            form {
                padding: 15px;
                width: 100%;
            }

            h2, h3 {
                font-size: 1.4rem;
            }

            button {
                width: 100%;
            }

            .message {
                width: 100%;
                padding: 15px;
            }

            a {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the data to be saved in the text file
    $data = "Name: $name\nEmail: $email\nMessage: $message\n\n";

    // Save the data to a text file, appending to the file if it already exists
    file_put_contents('submissions.txt', $data, FILE_APPEND);

    // Display a thank you message to the user
    echo "<h3>Message received: THANK YOU FOR TRUSTING ME!</h3>";
    echo "<strong>Name:</strong> $name<br>";
    echo "<strong>Email:</strong> $email<br>";
    echo "<strong>Message:</strong><br><pre>$message</pre>";

    // Button to go back to index.php
    echo '<br><br><form action="index.php" method="get"><button type="submit">HOME</button></form>';
}
?>

</body>
</html>
