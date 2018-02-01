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
    $postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;
    $postcontent = isset($_REQUEST['postcontent']) ? $_REQUEST['postcontent'] : null;
    // Validating post content entry
    $postcontent = filter_var($postcontent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $postcontent = filter_var($postcontent, FILTER_SANITIZE_SPECIAL_CHARS);
    $postcontent = trim($postcontent);
    // SQL for updating post content
    $sql = "UPDATE nf_posts
            SET postcontent = '$postcontent'
            WHERE postid = $postid";
    // Applying the SQL query to the database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    // If SQL query is successful
    if ($sqlResults){
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 1;
        //
        $_SESSION['feedback-message'] = 'Post updated';

    } else{
        // Changing the session variable of admin-feedback to approved
        $_SESSION['admin-feedback'] = 2;
        //
        $_SESSION['feedback-message'] = 'Post not updated, system error';
    }
    // Releasing the database connection
    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ../admin-dashboard.php');
?>