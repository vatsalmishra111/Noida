<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $form_type = $_POST['form_type'];

  if ($form_type === "job_seeker") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $job_title = $_POST['job_title'];
    $area = $_POST['area'];
    $details = $_POST['details'];

    $sql = "INSERT INTO job_seekers (name, mobile, email, age, job_title, area, details)
            VALUES ('$name', '$mobile', '$email', '$age', '$job_title', '$area', '$details')";

  } elseif ($form_type === "client") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $position = $_POST['position'];
    $workers = $_POST['workers'];
    $additional = $_POST['additional'];

    $sql = "INSERT INTO client_requirements (name, mobile, email, location, position, workers, additional)
            VALUES ('$name', '$mobile', '$email', '$location', '$position', '$workers', '$additional')";
  }

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Form submitted successfully!'); window.location.href='index.html';</script>";
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
}
?>
