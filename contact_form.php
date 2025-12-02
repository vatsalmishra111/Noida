<?php
// ---------------- SECURITY CHECK ----------------
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Access denied!");
}

// ---------------- GET FORM FIELDS ----------------
$name    = trim($_POST['name']);
$email   = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

// ---------------- BASIC VALIDATION ----------------
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    die("Please fill all fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// ---------------- EMAIL SETTINGS ----------------
$to = "support@noidawale.in";   // Change to your business email
$email_subject = "New Contact Form Message from NoidaWale.in";

$email_body = "
    <h2>New Contact Message – NoidaWale.in</h2>
    <p><b>Name:</b> $name</p>
    <p><b>Email:</b> $email</p>
    <p><b>Subject:</b> $subject</p>
    <p><b>Message:</b></p>
    <p>$message</p>
";

$headers  = "From: NoidaWale.in <no-reply@noidawale.in>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// ---------------- SEND EMAIL ----------------
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "
        <script>
            alert('Your message has been sent successfully!');
            window.location.href = 'contact.html';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Error! Message could not be sent. Try again later.');
            window.location.href = 'contact.html';
        </script>
    ";
}
?>
