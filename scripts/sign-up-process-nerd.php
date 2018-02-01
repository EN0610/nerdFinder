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
$experience = $_POST['experience'];
$rate = $_POST['rate'];
$nerdcv = $_POST['nerdcv'];
$portfolioimg1 = $_POST['portfolioimg1'];
$portfolioimg2 = $_POST['portfolioimg2'];
$portfolioimg3 = $_POST['portfolioimg3'];

$sql = "INSERT INTO nf_users (userid, usertypeid, firstname, lastname, email, username, dob, userpassword, passwordhint, premium, locked, profilepic, experience, hourlyrate, nerdcv, portfolioimg1, portfolioimg2, portfolioimg3)
VALUES (null, '2', '$firstname', '$lastname', '$email', '$username', '$dob', '$userpassword', '$passwordhint', '0', '0', '$profilepic', '$experience', '$rate', '$nerdcv', '$portfolioimg1', '$portfolioimg2', '$portfolioimg3')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // Closing Connection with Server
?>
