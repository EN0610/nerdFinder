<?php
require_once('session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');


//request from the data stream
$eventname = isset($_REQUEST['eventname']) ? $_REQUEST['eventname'] : null;
$eventtype = isset($_REQUEST['eventtype']) ? $_REQUEST['eventtype'] : null;
$eventdescription = isset($_REQUEST['eventdescription']) ? $_REQUEST['eventdescription'] : null;
$eventdate = isset($_REQUEST['eventdate']) ? $_REQUEST['eventdate'] : null;
$starttime = isset($_REQUEST['starttime']) ? $_REQUEST['starttime'] : null;
$endtime = isset($_REQUEST['endtime']) ? $_REQUEST['endtime'] : null;
$eventlocation = isset($_REQUEST['eventlocation']) ? $_REQUEST['eventlocation'] : null;
//validation to remove any quotes
$eventname = filter_var($eventname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$eventtype = filter_var($eventtype, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$eventdescription = filter_var($eventdescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$eventdate = filter_var($eventdate, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$starttime = filter_var($starttime, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$endtime = filter_var($endtime, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$eventlocation = filter_var($eventlocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
//pull the validated Data
$eventname = trim($eventname);
$eventtype = trim($eventtype);
$eventdescription = trim($eventdescription);
$eventdate = trim($eventdate);
$starttime = trim($starttime);
$endtime= trim($endtime);
$eventlocation = trim($eventlocation);
//pull the userid from the session
$userid = $_SESSION['userid'];




if(isset($_POST['insert']))
{

    $eventname = $_POST['eventname'];
    $eventtype = $_POST['eventtype'];
    $eventdescription = $_POST{'eventdescription'};
    $eventdate = $_POST{'eventdate'};
    $starttime = $_POST{'starttime'};
    $endtime = $_POST{'endtime'};
    $location = $_POST{'location'};

    $query =  "INSERT INTO nf_events ( creatorid, eventname, eventtype, eventdescription, eventdate, starttime, endtime, location)
    VALUES ( $userid, '$eventname', '$eventtype', '$eventdescription', '$eventdate', '$starttime', '$endtime', '$location');";

    if (mysqli_query($conn, $query)) {
        header('Location: ../Meetups.php');
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}

?>
