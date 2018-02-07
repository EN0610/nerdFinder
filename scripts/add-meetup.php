<?php
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');

if(isset($_POST['insert']))
{

    $eventname = $_POST['eventname'];
    $eventdescription = $_POST{'eventdescription'};
    $eventdate = $_POST{'eventdate'};
    $starttime = $_POST{'starttime'};
    $endtime = $_POST{'endtime'};
    $location = $_POST{'location'};

    $query =  "INSERT INTO `nf_events` (`eventid`, `creatorid`, `eventname`, `eventtype`, `eventdescription`, `eventdate`, `starttime`, `endtime`, `location`)
    VALUES (NULL, '1', '$eventname', 'network', '$eventdescription', '$eventdate', '$starttime', '$endtime', '$location');";

    if (mysqli_query($conn, $query)) {
        header('Location: ../meetups.php');
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}

?>
