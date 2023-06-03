<?php
include 'database.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve email and password from form submission
$email = $_POST['user_Email'];
$password = $_POST['user_Password'];

$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);

  $_SESSION['admin_Email'] = $email;
  $_SESSION['admin_Password'] = $password;

  header('Location: admin.php');
  exit();
}
 else {
  $_SESSION['login_error'] = 'Incorrect email or password';
  header('Location: login.php');
}

mysqli_close($conn);
