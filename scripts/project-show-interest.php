<?php
	/* CREATED BY HARRY */

	// Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Setting the development enviroment to show errors
    require_once('scripts/set-environment.php');
    // Connecting to the Database
    require_once('scripts/database-connection.php');
    /*--------------------------
    PULLING DATA FROM FORM
    --------------------------*/
    $projectid = isset($_REQUEST['projectid']) ? $_REQUEST['projectid'] : null;
    $projectname = isset($_REQUEST['projectname']) ? $_REQUEST['projectname'] : null;
    $clientid = isset($_REQUEST['clientid']) ? $_REQUEST['clientid'] : null;
    $fullName = isset($_REQUEST['full-name']) ? $_REQUEST['full-name'] : null;
    // Validating
    $projectid = filter_var($projectid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $projectname = filter_var($projectname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $clientid = filter_var($clientid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $fullName = filter_var($fullName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $projectid = filter_var($projectid, FILTER_SANITIZE_SPECIAL_CHARS);
    $projectname = filter_var($projectname, FILTER_SANITIZE_SPECIAL_CHARS);
    $clientid = filter_var($clientid, FILTER_SANITIZE_SPECIAL_CHARS);
    $fullName = filter_var($fullName, FILTER_SANITIZE_SPECIAL_CHARS);
    $projectid = trim($projectid);
    $projectname = trim($projectname);
    $clientid = trim($clientid);
    $fullName = trim($fullName);
    /*--------------------------
    MESSAGE TO SHOW INTEREST
    --------------------------*/
    // Getting user's ID
    $userid = $_SESSION['userid'];

    $message = 'Hi $fullName, I&#39;m interested in your project &#39;$projectname&#39;. Message me from my profile <a href="profile.php?userid=$userid" class="text-link"></a> if you want to work with me';
	/*--------------------------
    MAKING CURRENT TIME
    --------------------------*/
    date_default_timezone_set('Europe/London');
    $currentTime = date('Y-m-d H:i:s');

    $sql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
    		VALUES ($userid, $clientid, 0, '$message', '$currentTime')";

    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    header('Location: ');
?>