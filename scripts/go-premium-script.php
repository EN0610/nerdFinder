<?php
	/* CREATED BY HARRY */

	// Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Showing error reporting
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');
    // Getting the users ID
    $userid = $_SESSION['userid'];
    // SQL to upgrade the users account to premium
    $sql = "UPDATE nf_users
    		SET premium = 1
    		WHERE userid= $userid";
	// Applying SQL to database
   	$sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
   	// Releasing the database connection
   	mysqli_close($conn);
   	// Sending user back to previous page
   	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>