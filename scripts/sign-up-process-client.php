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

/*----------------------------------------------------
RETRIVING AND VALIDATING SIGN IN DATA
----------------------------------------------------*/

// Retriving data from form fields
// $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
// $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
// $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
// $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
// $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : null;
// $userpassword = isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : null;
// $passwordhint = isset($_REQUEST['passwordhint']) ? $_REQUEST['passwordhint'] : null;
// $company = isset($_REQUEST['company']) ? $_REQUEST['company'] : null;
// $jobtitle = isset($_REQUEST['jobtitle']) ? $_REQUEST['jobtitle'] : null;
// $businessarea = isset($_REQUEST['businessarea']) ? $_REQUEST['businessarea'] : null;
// Sanitising data but not encoding quotes
// $firstname = filter_var($firstname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $lastname = filter_var($lastname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $dob = filter_var($dob, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $company = filter_var($company, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $jobtitle = filter_var($jobtitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// $businessarea = filter_var($businessarea, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// Escaping <,>,& and all ASCII characters with a value below 32
// $firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS);
// $lastname = filter_var($lastname, FILTER_SANITIZE_SPECIAL_CHARS);
// $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
// $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
// $dob = filter_var($dob, FILTER_SANITIZE_SPECIAL_CHARS);
// $userpassword = filter_var($userpassword, FILTER_SANITIZE_SPECIAL_CHARS);
// $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_SPECIAL_CHARS);
// $company = filter_var($company, FILTER_SANITIZE_SPECIAL_CHARS);
// $jobtitle = filter_var($jobtitle, FILTER_SANITIZE_SPECIAL_CHARS);
// $businessarea = filter_var($businessarea, FILTER_SANITIZE_SPECIAL_CHARS);
// Trimming data to remove and white/ empty space
// $firstname = trim($firstname);
// $lastname = trim($lastname);
// $email = trim($email);
// $username = trim($username);
// $dob = trim($dob);
// $userpassword = trim($userpassword);
// $passwordhint = trim($passwordhint);
// $company = trim($company);
// $jobtitle = trim($jobtitle);
// $businessarea = trim($businessarea);
// Any data left by this point will not be harmful to the database

$hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array(
    'cost' => 11
));

$sql = "INSERT INTO nf_users (userid, usertypeid, firstname, lastname, email, username, dob, userpassword, passwordhint, premium, locked, profilepic, company, jobtitle, businessarea)
VALUES (null, '3', '$firstname', '$lastname', '$email', '$username', '$dob', '$hashedpassword', '$passwordhint', '0', '0', '$profilepic', '$company', '$jobtitle', '$businessarea')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../congratulations.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // Closing Connection with Server
?>
