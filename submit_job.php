<?php
// --- EMAIL WHERE YOU WANT TO RECEIVE JOB APPLICATIONS ---
$admin_email = "support@noidawale.in";

// --- GET FORM VALUES ---
$name       = $_POST['Full_Name'] ?? $_POST['Full Name'];
$phone      = $_POST['Phone_Number'] ?? $_POST['Phone Number'];
$city       = $_POST['City'];
$role       = $_POST['Job_Role'] ?? $_POST['Job Role'];
$experience = $_POST['Experience'];
$message    = $_POST['Message'];

// --- SAVE TO CSV FILE FOR RECORDS ---
$file = fopen("job_applications.csv", "a");
fputcsv($file, [$name, $phone, $city, $role, $experience, $message, date("Y-m-d H:i:s")]);
fclose($file);

// --- SEND EMAIL NOTIFICATION TO ADMIN ---
$subject = "New Job Application - $role";
$body = "
Name: $name
Phone: $phone
City: $city
Role Applied: $role
Experience: $experience
Message: $message
Time: " . date("d M Y, h:i A");

$headers = "From: no-reply@noidawale.in";

mail($admin_email, $subject, $body, $headers);

// --- SHOW SUCCESS MESSAGE TO USER ---
echo "
<!DOCTYPE html>
<html>
<head>
<title>Application Submitted</title>
<style>
body { font-family: Arial; text-align:center; padding:50px; }
.box { margin:auto; padding:30px; max-width:400px; border-radius:12px; background:#e8f8ff; }
.box h2 { color:#0082e6; }
button { padding:10px 20px; background:#0082e6; color:white; border:none; border-radius:6px; cursor:pointer; }
button:hover { background:#0a9bfd; }
</style>
</head>
<body>

<div class='box'>
<h2>✔ Application Submitted Successfully</h2>
<p>Thank you, we will contact you soon.</p>
<a href='jobs.html'><button>Back to Jobs</button></a>
</div>

</body>
</html>";
?>
