<?php
    /* CREATED BY HARRY */

    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Pulling id's of users selected
    $userid1 = isset($_REQUEST['userid1']) ? $_REQUEST['userid1'] : null;
    $userid2 = isset($_REQUEST['userid2']) ? $_REQUEST['userid2'] : null;
    // Changing Session Variables
    $_SESSION['admin-message-userid1'] = $userid1;
    $_SESSION['admin-message-userid2'] = $userid2;
    // Sending user back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>