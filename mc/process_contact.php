<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $file = fopen("contact_form.txt","a");
        $data = "Name: ".$name."\nEmail: ".$email."\nMessage: ".$message."\n--------------------------------------------------";

        fwrite($file,$data);
    }
?>
<p>Message Sent!</p>
<a href="index.php">return</a>