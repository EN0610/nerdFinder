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
    
    /*----------------------------------------------------
    GETTING FORM INFORMATION & VALIDATION
    ----------------------------------------------------*/

    $eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;
    $creatorid = isset($_REQUEST['creatorid']) ? $_REQUEST['creatorid'] : null;
    $eventname = isset($_REQUEST['eventname']) ? $_REQUEST['eventname'] : null;
    $eventdesc = isset($_REQUEST['eventdesc']) ? $_REQUEST['eventdesc'] : null;
    $eventtype = isset($_REQUEST['eventtype']) ? $_REQUEST['eventtype'] : null;
    $eventdate = isset($_REQUEST['eventdate']) ? $_REQUEST['eventdate'] : null;
    $starttime = isset($_REQUEST['starttime']) ? $_REQUEST['starttime'] : null;
    $endtime = isset($_REQUEST['endtime']) ? $_REQUEST['endtime'] : null;
    $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
    // Validation
    $eventid = filter_var($eventid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $creatorid = filter_var($creatorid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventname = filter_var($eventname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventdesc = filter_var($eventdesc, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventtype = filter_var($eventtype, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $eventdate = filter_var($eventdate, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $starttime = filter_var($starttime, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $endtime = filter_var($endtime, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $location = filter_var($location, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    //
    $eventid = filter_var($eventid, FILTER_SANITIZE_SPECIAL_CHARS);
    $creatorid = filter_var($creatorid, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventname = filter_var($eventname, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventdesc = filter_var($eventdesc, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventtype = filter_var($eventtype, FILTER_SANITIZE_SPECIAL_CHARS);
    $eventdate = filter_var($eventdate, FILTER_SANITIZE_SPECIAL_CHARS);
    $starttime = filter_var($starttime, FILTER_SANITIZE_SPECIAL_CHARS);
    $endtime = filter_var($endtime, FILTER_SANITIZE_SPECIAL_CHARS);
    $location = filter_var($location, FILTER_SANITIZE_SPECIAL_CHARS);
    //
    $eventid = trim($eventid);
    $creatorid = trim($creatorid);
    $eventname = trim($eventname);
    $eventdesc = trim($eventdesc);
    $eventtype = trim($eventtype);
    $eventdate = trim($eventdate);
    $starttime = trim($starttime);
    $endtime = trim($endtime);
    $location = trim($location);
    //
    /*----------------------------------------------------
    INSERTING INTO DATABASE
    ----------------------------------------------------*/
    if(isset($_POST["add"])) {
        // User pressed Add event button
        $addSql = "INSERT INTO nf_events 
            (creatorid, eventname, eventtype, eventdescription, eventdate, starttime, endtime, location)
            VALUES 
            ($creatorid, '$eventname', $eventtype, '$eventdesc', '$eventdate', '$starttime', '$endtime', '$location')";

        $addSqlResults = mysqli_query($conn, $addSql) or die (mysqli_error($conn));
        // If SQL query is successful
        if ($addSqlResults){
            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 1;
            //
            $_SESSION['feedback-message'] = $eventname . ' added to database';

        } else{
            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 2;
            //
            $_SESSION['feedback-message'] = 'Event not added, system error';
        }
    }
    if(isset($_POST["update"])) {
        // User pressed update event button
        $updateSql = "UPDATE nf_events
                      SET eventname = '$eventname', eventtype = $eventtype, eventdescription = '$eventdesc', eventdate = '$eventdate', starttime = '$starttime', endtime = '$endtime', location = '$location'
                      WHERE eventid = $eventid";

        $updateSqlResults = mysqli_query($conn, $updateSql) or die (mysqli_error($conn));

        // If SQL query is successful
        if ($updateSqlResults){
            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 1;
            //
            $_SESSION['feedback-message'] = $eventname . ' udpated';

        } else{
            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 2;
            //
            $_SESSION['feedback-message'] = 'Event not updated, system error';
        }
    }
    // Releasing the database connection
    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>