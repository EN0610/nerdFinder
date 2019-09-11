<?php
    /* CREATED BY DAL */

    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    include('database-connection.php');
    // Pulling entered data from request stream
    $forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;
    $postcontent = isset($_REQUEST['postcontent']) ? $_REQUEST['postcontent'] : null;
    // Validating
    $forumid = filter_var($forumid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $postcontent = filter_var($postcontent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $forumid = filter_var($forumid, FILTER_SANITIZE_SPECIAL_CHARS);
    $postcontent = filter_var($postcontent, FILTER_SANITIZE_SPECIAL_CHARS);
    $forumid = trim($forumid);
    $postcontent = trim($postcontent);
    // Making current time
    date_default_timezone_set('Europe/London');
    $currentTime = date('Y-m-d H:i:s');
    // Getting user's ID
    $userid = $_SESSION['userid'];
    // SQL for entering post content into database
    $sql = "INSERT INTO nf_posts (userid, forumid, postcontent, posttime)
            VALUES ($userid, $forumid, '$postcontent','$currentTime')";
    // Applying SQL to database
    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    // Closing DB connection
    mysqli_close($conn);
    // Returning user to last page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
