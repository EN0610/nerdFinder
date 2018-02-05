<?php
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');
// php code to Insert data into mysql database from input text
$eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;

if(isset($_POST['submit']))
{




    $query ="INSERT INTO nf_eventattendance (userid, eventid)
      VALUE (1, $eventid)";


$sqlResults = mysqli_query($conn, $query) or die (mysqli_error($conn));
}



?>
