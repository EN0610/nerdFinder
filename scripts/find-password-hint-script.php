<?php
	/* CREATED BY HARRY */
    
    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');
    // Getting the user
    $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
    // Validation
    $user = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $user = filter_var($user, FILTER_SANITIZE_SPECIAL_CHARS);
    $user = trim($user);
    //
    $sql = "SELECT passwordhint
     		FROM nf_users
     		WHERE userid = $user";

    if($result = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_assoc($result)){

        	$_SESSION['password-hint'] = $row['passwordhint'];
        }
    }
    // Sending user back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>