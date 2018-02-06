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
  $specialismid = $_POST['specialismid'];
  $rate = $_POST['rate'];
  $nerdcv = $_POST['nerdcv'];
  $portfolioimg1 = $_POST['portfolioimg1'];
  // $portfolioimg2 = $_POST['portfolioimg2'];
  // $portfolioimg3 = $_POST['portfolioimg3'];

  $hashedpassword = password_hash($userpassword, PASSWORD_BCRYPT, array(
    'cost' => 11
  ));

  $sql = "UPDATE nf_users SET firstname=$firstname, lastname=$lastname, email=$email, username=$username, dob=$dob, userpassword=$userpassword, passwordhint=$passwordhint, profilepic=$profilepic, experience=$experience, hourlyrate=$rate, nerdcv=$nerdcv, portfolioimg1=$portfolioimg1, specialismid=$specialismid)
          WHERE userid=$userid";
  if (mysqli_query($conn, $sql)) {
      header('Location: ../profile.php');
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn); // Closing Connection with Server
?>
