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
    // Getting the Id of the project clicked from the request stream
    $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : null;
    $commentid = isset($_REQUEST['commentid']) ? $_REQUEST['commentid'] : null;
    $commentcontent = isset($_REQUEST['commentcontent']) ? $_REQUEST['commentcontent'] : null;
    // Validating
    $userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $commentid = filter_var($commentid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $commentcontent = filter_var($commentcontent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid = filter_var($userid, FILTER_SANITIZE_SPECIAL_CHARS);
    $commentid = filter_var($commentid, FILTER_SANITIZE_SPECIAL_CHARS);
    $commentcontent = filter_var($commentcontent, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid = trim($userid);
    $commentid = trim($commentid);
    $commentcontent = trim($commentcontent);
    // SQL to update the comments's approval status as '1', which means approved AND seen by the admin team
    $sql = "UPDATE nf_comments
            SET approved = 1
            WHERE commentid = $commentid";

    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    if ($sqlResults){
        // Messaging user to notify them
        date_default_timezone_set('Europe/London');
        $messageSent = date('Y-m-d H:i:s');

        $messageUserSql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
                           VALUES (13, $userid, 0, 'Your comment &#39;$commentcontent&#39; has been approved by website administration', '$messageSent')";

        mysqli_query($conn, $messageUserSql) or die (mysqli_error($conn));
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = 'Comment approved, user notified';

    } else{

        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = 'Comment not approved, system error';
    }
    
    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>