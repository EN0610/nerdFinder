<?php
    /* CREATED BY HARRY */

	// Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Showing error reporting
    require_once('set-environment.php');
    // Unsetting session variables
    if (isset($_SESSION['admin-feedback'], $_SESSION['feedback-message'])){
    	// Clearing session variables
    	unset($_SESSION['admin-feedback']);
    	unset($_SESSION['feedback-message']);
    }
    // Sending user back
    header('Location: ' . $_SERVER['HTTP_REFERER']);