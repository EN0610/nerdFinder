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

    // Getting user's ID
    $userid1 = $_SESSION['userid'];
    /*--------------------------
    MAKING CURRENT TIME
    --------------------------*/
    $message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;
    $recieverid = isset($_REQUEST['recieverid']) ? $_REQUEST['recieverid'] : null;
    // Validation
    $message = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $message = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    $message = trim($message);
    $recieverid = filter_var($recieverid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $recieverid = filter_var($recieverid, FILTER_SANITIZE_SPECIAL_CHARS);
    $recieverid = trim($recieverid);
    /*--------------------------
    MAKING CURRENT TIME
    --------------------------*/
    date_default_timezone_set('Europe/London');
    $currentTime = date('Y-m-d H:i:s');
    /*--------------------------
    APPLYING SQL TO DATABASE
    --------------------------*/
    $sql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
            VALUES ($userid1, $recieverid, 0, '$message', '$currentTime')";

    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    // Setting reciever as conversation selected
    $_SESSION['message-userid2'] = $recieverid;
    // Sending user back to messages page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>