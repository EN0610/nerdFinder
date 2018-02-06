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

  $sql = "DELETE
          FROM nf_users
          WHERE userid='$userid'";

  if (mysqli_query($conn, $sql)) {
      header('Location: ../index.php');
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn); // Closing Connection with Server

  session_destroy();
?>
