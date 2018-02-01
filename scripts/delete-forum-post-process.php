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
    $postid = isset($_REQUEST['post']) ? $_REQUEST['post'] : null;
    // SQL to update the project's approval status as '2', which means unapproved AND seen by the admin team
    $sql = "DELETE FROM nf_posts WHERE postid = $postid";

    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    
    if ($sqlResults){
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = 'Post deleted';

    } else{

        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = 'Post not deleted, system error';
    }

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ../admin-dashboard.php');
?>