<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    
    if (!empty($name) && !empty($email) && !empty($message)) {
       
        $to = "youremail@example.com"; 
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

       
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Thank you, $name. Your message has been sent successfully!'); window.location.href='contact.html';</script>";
        } else {
            echo "<script>alert('Sorry, there was an error sending your message. Please try again later.'); window.location.href='contact.html';</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.'); window.location.href='contact.html';</script>";
    }
} else {
    header("Location: contact.html");
    exit;
}
?>
