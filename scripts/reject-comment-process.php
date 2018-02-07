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
    $commentid = isset($_REQUEST['commentid']) ? $_REQUEST['commentid'] : null;
    // SQL to update the comments's approval status as '2', which means unapproved AND seen by the admin team
    $sql = "DELETE FROM nf_comments
            WHERE commentid = $commentid";

    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    
    if ($sqlResults){

<<<<<<< HEAD
=======
        $messageUserSql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
                           VALUES (13, $userid, 0, 'Your comment &#39;$commentcontent&#39; has been rejected due to inappropriate/ offensive content. Email admin@nerdfinder.com to appeal this action.', '$messageSent')";

        mysqli_query($conn, $messageUserSql) or die (mysqli_error($conn));
>>>>>>> 42504c15ed73dfbc886372ac76cfd8bd83caaf83
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = 'Comment rejected, user notified';

    } else{

        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = 'Comment not rejected, system error';
    }

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>