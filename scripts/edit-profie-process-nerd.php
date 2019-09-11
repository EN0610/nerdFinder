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
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $username = $_GET['username'];
  $dob = $_GET['dob'];
  $userpassword = $_GET['userpassword'];
  $passwordhint = $_GET['passwordhint'];
  $profilepic = $_GET['profilepic'];
  $experience = $_GET['experience'];
  $specialismid = $_GET['specialismid'];
  $rate = $_GET['rate'];
  $nerdcv = $_GET['nerdcv'];
  $portfolioimg1 = $_GET['portfolioimg1'];
  $portfolioimg2 = $_POST['portfolioimg2'];
  $portfolioimg3 = $_POST['portfolioimg3'];

  $hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array(
    'cost' => 11
  ));

  $sql = "UPDATE nf_users
          SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', dob='$dob', userpassword='$hashedpassword', passwordhint='$passwordhint', profilepic='$profilepic', experience='$experience', hourlyrate='$rate', nerdcv='$nerdcv', portfolioimg1='$portfolioimg1', portfolioimg2='$portfolioimg2', portfolioimg3='$portfolioimg3', specialismid='$specialismid'
          WHERE userid='$userid'";

  if (mysqli_query($conn, $sql)) {
        header('Location: ../profile.php?userid=' . $userid);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn); // Closing Connection with Server
?>
