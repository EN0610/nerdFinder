<?php
  require_once('database-connection.php');	  // make db connection
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Retriving data from form fields
  $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
  $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
  $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
  $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
  $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : null;
  $userpassword = isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : null;
  $passwordhint = isset($_REQUEST['passwordhint']) ? $_REQUEST['passwordhint'] : null;
  $profilepic = isset($_REQUEST['profilepic']) ? $_REQUEST['profilepic'] : null;
  $experience = isset($_REQUEST['experience']) ? $_REQUEST['experience'] : null;
  $specialismid = isset($_REQUEST['specialismid']) ? $_REQUEST['specialismid'] : null;
  $rate = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;
  $nerdcv = isset($_REQUEST['nerdcv']) ? $_REQUEST['nerdcv'] : null;
  $portfolioimg1 = isset($_REQUEST['portfolioimg1']) ? $_REQUEST['portfolioimg1'] : null;
  // Sanitising data but not encoding quotes
  $firstname = filter_var($firstname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $lastname = filter_var($lastname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $dob = filter_var($dob, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $profilepic = filter_var($profilepic, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $experience = filter_var($experience, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $specialismid = filter_var($specialismid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $rate = filter_var($rate, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $nerdcv = filter_var($nerdcv, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $portfolioimg1 = filter_var($portfolioimg1, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  // Escaping <,>,& and all ASCII characters with a value below 32
  $firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_var($lastname, FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
  $dob = filter_var($dob, FILTER_SANITIZE_SPECIAL_CHARS);
  $userpassword = filter_var($userpassword, FILTER_SANITIZE_SPECIAL_CHARS);
  $passwordhint = filter_var($passwordhint, FILTER_SANITIZE_SPECIAL_CHARS);
  $profilepic = filter_var($profilepic, FILTER_SANITIZE_SPECIAL_CHARS);
  $experience = filter_var($experience, FILTER_SANITIZE_SPECIAL_CHARS);
  $specialismid = filter_var($specialismid, FILTER_SANITIZE_SPECIAL_CHARS);
  $rate = filter_var($rate, FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
  $nerdcv = filter_var($nerdcv, FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
  $portfolioimg1 = filter_var($portfolioimg1, FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
  // Trimming data to remove and white/ empty space
  $firstname = trim($firstname);
  $lastname = trim($lastname);
  $email = trim($email);
  $username = trim($username);
  $dob = trim($dob);
  $userpassword = trim($userpassword);
  $passwordhint = trim($passwordhint);
  $profilepic = trim($profilepic);
  $experience = trim($experience);
  $specialismid = trim($specialismid);
  $rate = trim($rate);
  $nerdcv = trim($nerdcv);
  $portfolioimg1 = trim($portfolioimg1);
  // Any data left by this point will not be harmful to the database

  $hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array(
    'cost' => 11
  ));

  $sql = "INSERT INTO nf_users (userid, usertypeid, firstname, lastname, email, username, dob, userpassword, passwordhint, premium, locked, profilepic, experience, hourlyrate, nerdcv, portfolioimg1, specialismid)
  VALUES (null, '2', '$firstname', '$lastname', '$email', '$username', '$dob', '$hashedpassword', '$passwordhint', '0', '0', '$profilepic', '$experience', '$rate', '$nerdcv', '$portfolioimg1', '$specialismid')";
  if (mysqli_query($conn, $sql)) {
      header('Location: ../congratulations.php');
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn); // Closing Connection with Server
?>
