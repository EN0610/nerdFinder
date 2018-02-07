<?php
require_once('session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');
// php code to Insert data into mysql database from input text
$eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;

$userid = $_SESSION['userid'];


if(isset($_POST['submit']))
{

  $eventid = $_POST['eventid'];

    $query ="INSERT INTO nf_eventattendance (userid, eventid)
      VALUE ($userid, $eventid)";


          if (mysqli_query($conn, $query)) {
              header('Location: ../meetup-congratulations.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
      }

?>
