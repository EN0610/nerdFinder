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
    // Pulling postID and postcontent from the request stream
    $eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;
    $eventname = isset($_REQUEST['eventid']) ? $_REQUEST['eventname'] : null;
    // Validation
    $eventid = filter_var($eventid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventname = filter_var($eventname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventid = filter_var($eventid, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventname = filter_var($eventname, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventid = trim($eventid);
    $eventname = trim($eventname);
    // 
    $sql = "DELETE FROM nf_events WHERE eventid = $eventid";
    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    
    if ($sqlResults){
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = $eventname . ' deleted';

    } else{

        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = $eventname . ' not deleted, system error';
    }

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>