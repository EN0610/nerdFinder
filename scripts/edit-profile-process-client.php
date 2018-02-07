<?php
  require_once('database-connection.php');	  // make db connection
  // Check connectio
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  // Defining path to session data folder where all session data will be saved/found
  require_once('session-save-path.php');
  // Resuming current session
  session_start();

  $userid = $_SESSION['userid'];

  /*----------------------------------------------------
  RETRIVING AND VALIDATING SIGN IN DATA
  ----------------------------------------------------*/

  // Retriving data from form fields
  $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
  $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
  $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
  $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
  $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : null;
  $userpassword = isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : null;
  $passwordhint = isset($_REQUEST['passwordhint']) ? $_REQUEST['passwordhint'] : null;
  $profilepic = isset($_REQUEST['profilepic']) ? $_REQUEST['profilepic'] : null;
  $company = isset($_REQUEST['company']) ? $_REQUEST['company'] : null;
  $jobtitle = isset($_REQUEST['jobtitle']) ? $_REQUEST['jobtitle'] : null;
  $businessarea = isset($_REQUEST['businessarea']) ? $_REQUEST['businessarea'] : null;
  // Sanitising data but not encoding quotes
  $firstname = filter_var($firstname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $lastname = filter_var($lastname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $dob = filter_var($dob, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $profilepic = filter_var($profilepic, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $company = filter_var($company, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $jobtitle = filter_var($jobtitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $businessarea = filter_var($businessarea, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  // Escaping <,>,& and all ASCII characters with a value below 32
  $firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_var($lastname, FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
  $dob = filter_var($dob, FILTER_SANITIZE_SPECIAL_CHARS);
  $userpassword = filter_var($userpassword, FILTER_SANITIZE_SPECIAL_CHARS);
  $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_SPECIAL_CHARS);
  $profilepic = filter_var($profilepic, FILTER_SANITIZE_SPECIAL_CHARS);
  $company = filter_var($company, FILTER_SANITIZE_SPECIAL_CHARS);
  $jobtitle = filter_var($jobtitle, FILTER_SANITIZE_SPECIAL_CHARS);
  $businessarea = filter_var($businessarea, FILTER_SANITIZE_SPECIAL_CHARS);
  // Trimming data to remove and white/ empty space
  $firstname = trim($firstname);
  $lastname = trim($lastname);
  $email = trim($email);
  $username = trim($username);
  $dob = trim($dob);
  $userpassword = trim($userpassword);
  $passwordhint = trim($passwordhint);
  $profilepic = trim($profilepic);
  $company = trim($company);
  $jobtitle = trim($jobtitle);
  $businessarea = trim($businessarea);
  // Any data left by this point will not be harmful to the database

  $hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array(
    'cost' => 11
  ));

  $sql = "UPDATE nf_users
          SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', dob='$dob', userpassword='$hashedpassword', passwordhint='$passwordhint', profilepic='$profilepic', jobtitle='$jobtitle', company='$company', businessarea='$businessarea'
          WHERE userid='$userid'";

  if (mysqli_query($conn, $sql)) {
    header('Location: ../profile.php?userid=' . $userid);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn); // Closing Connection with Server
?>
