
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;

  $eventSQL = "SELECT * FROM nf_events WHERE eventid = '$eventid'";
  $eventResults = mysqli_query($conn, $eventSQL) or die (mysqli_error($conn));



  if (mysqli_num_rows($eventResults) > 0){
      // At least one row of events
      while ($row = mysqli_fetch_assoc($eventResults)) {

          $eventid = $row['eventid'];
          $eventname = $row['eventname'];
          $eventdescription = $row['eventdescription'];
          $eventdate = $row['eventdate'];
          $eventlocation = $row['location'];
          $starttime = $row['starttime'];
          $endtime = $row['endtime'];
          $eventtype = $row['eventtype'];
          // For every issue in the database add th relevant HTML to a variable, which, will be echoed onto the page
          // if the event_Type is 1 then it will display Networking event
          if ($eventtype == 1) {
              $eventtype = 'Networking event';
          // if the event_Type is 1 then it will display Networking event
          } else if ($eventtype == 2) {
              $eventtype = 'Workshop event';
          }

          // need to retrive customer ID for the details page and not display is though

        }
      }
?>
