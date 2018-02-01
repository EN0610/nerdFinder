<?php
require_once('database-connection.php');	  // make db connection
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$dob = $_POST['dob'];
$userpassword = $_POST['userpassword'];
$passwordhint = $_POST['passwordhint'];
$profilepic = $_POST['profilepic'];
$company = $_POST['company'];
$jobtitle = $_POST['jobtitle'];
$businessarea = $_POST['businessarea'];

$sql = "INSERT INTO nf_users (userid, usertypeid, firstname, lastname, email, username, dob, userpassword, passwordhint, premium, locked, profilepic, company, jobtitle, businessarea)
VALUES (null, '3', '$firstname', '$lastname', '$email', '$username', '$dob', '$userpassword', '$passwordhint', '0', '0', '$profilepic', '$company', '$jobtitle', '$businessarea')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../congratulations.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // Closing Connection with Server
?>
