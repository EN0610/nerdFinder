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
    $userid = isset($_REQUEST['clientid']) ? $_REQUEST['clientid'] : null;
    $projectid = isset($_REQUEST['projectid']) ? $_REQUEST['projectid'] : null;
    $projectname = isset($_REQUEST['projectname']) ? $_REQUEST['projectname'] : null;
    // Validation
    $userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $projectid = filter_var($projectid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $projectname = filter_var($projectname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid = filter_var($userid, FILTER_SANITIZE_SPECIAL_CHARS);
    $projectid = filter_var($projectid, FILTER_SANITIZE_SPECIAL_CHARS);
    $projectname = filter_var($projectname, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid = trim($userid);
    $projectid = trim($projectid);
    $projectname = trim($projectname);
    // Getting current time
    date_default_timezone_set('Europe/London');
    $messageSent = date('Y-m-d H:i:s');

    // SQL to update the project's approval status as '2', which means unapproved AND seen by the admin team
    $sql = "DELETE FROM nf_projects
            WHERE projectid = $projectid";

    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    
    if ($sqlResults){
        $messageUserSql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
                           VALUES (13, $userid, 0, 'Your project &#39;$projectname&#39; has been rejected due to inappropriate content. Email admin@nerdfinder.com to appeal this action.', '$messageSent')";

        mysqli_query($conn, $messageUserSql) or die (mysqli_error($conn));
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = $projectname . ' rejected, user notified';

    } else{

        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = $projectname . ' not rejected, system error';
    }

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>