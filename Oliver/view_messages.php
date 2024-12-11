<html>
<head>
    <style>
      
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: grey;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


.container {
    width: 90%;
    max-width: 1000px;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    box-sizing: border-box;
}


h2 {
    text-align: center;
    color: #333;
    font-size: 28px;
    margin-bottom: 30px;
    font-weight: 600;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}

table th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

table td {
    background-color: #ffffff;
    color: #444;
}


table tr:hover {
    background-color: #f1f1f1;
}


form input[type="submit"] {
    background-color: red;
    color: whitesmoke;
    border: none;
    padding: 8px 15px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #e53935;
}


a button {
    background-color: magenta;
    color: white;
    padding: 14px 24px;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    margin-top: 30px;
    width: 100%;
    display: block;
    text-align: center;
    text-decoration: none;
}

a button:hover {
    background-color: darkmagenta;
}


@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 20px;
    }

    h2 {
        font-size: 24px;
    }

    table th, table td {
        padding: 8px;
    }

    form input[type="submit"] {
        font-size: 12px;
    }
}

    </style>
</head>
<body>
    <div class="container">
    <?php
// Start output buffering
ob_start();

// Check if the submissions file exists
if (file_exists('submissions.txt')) {
    // Read the contents of the file
    $file_content = file_get_contents('/Oliver/submissions.txt');
    
    // Split the file content into messages based on a delimiter (assuming a double newline separates each contact's entry)
    $messages = explode("\n\n", $file_content);

    echo "<h2>All Contact and Messages</h2>";

    if (!empty($file_content)) {
        // Start Table
        echo "<table>";
        echo "<tr><th>Contact #</th><th>Name</th><th>Email</th><th>Message</th><th>Action</th></tr>";

        // Initialize contact counter for display purposes
        $contact_count = 1;

        // Loop through the messages and display each one in a table row
        foreach ($messages as $index => $message) {
            // Only show non-empty messages
            if (!empty($message)) {
                // Extract contact information (assuming name, email, and message are separated by "Name:", "Email:", "Message:")
                preg_match('/Name: (.*)\nEmail: (.*)\nMessage: (.*)/', $message, $matches);
                
                if (count($matches) == 4) {
                    $name = htmlspecialchars($matches[1]);
                    $email = htmlspecialchars($matches[2]);
                    $msg = nl2br(htmlspecialchars($matches[3])) ;

                    // Display each contact in a table row
                    echo "<tr>";
                    echo "<td>" . $contact_count . "</td>"; // Use $contact_count for displaying the contact number
                    echo "<td>$name</td>";
                    echo "<td>$email</td>";
                    echo "<td>$msg</td>";
                    echo "<td>
                            <form method='POST' action=''>
                                <input type='hidden' name='delete_contact' value='$index'>
                                <input type='submit' value='Delete'>
                            </form>
                          </td>";
                    echo "</tr>";

                    // Increment the contact counter for the next contact
                    $contact_count++;
                }
            }
        }

        echo "</table>";
    } else {
        echo "No messages found.";
    }

    // Check if delete button is clicked for a specific contact
    if (isset($_POST['delete_contact'])) {
        $delete_index = $_POST['delete_contact'];

        // Remove the specific contact's message from the array
        unset($messages[$delete_index]);

        // Rebuild the file content without the deleted contact's message
        $updated_content = implode("\n\n", $messages);
        file_put_contents('submissions.txt', $updated_content);
        
        // Move the header call here, before any output
        header("Refresh: 0.5;"); // Refresh the page to update the content
        exit; // Ensure that no further code is executed after header
    }
} else {
    echo "No messages found.";
}

echo '<br><a href="index.php"><button>HOME</button></a>';

// End output buffering and send the output
ob_end_flush();
?>



    </div>
</body>
</html>
