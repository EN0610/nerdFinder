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
    // Getting user id from request stream
    $userid2 = isset($_REQUEST['userid2']) ? $_REQUEST['userid2'] : null;
    // Validation
    $userid2 = filter_var($userid2, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid2 = filter_var($userid2, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid2 = trim($userid2);
    // Setting Session variable to the id clicked on
    $_SESSION['message-userid2'] = $userid2;
    // Sending user back to last page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>