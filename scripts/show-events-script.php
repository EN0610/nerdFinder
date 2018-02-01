
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $eventSQL = "SELECT * FROM nf_events ORDER BY eventname";
  $eventResults = mysqli_query($conn, $eventSQL) or die (mysqli_error($conn));

  $events = '';

  if (mysqli_num_rows($eventResults) > 0){
      // At least one row of technical issues
      while ($row = mysqli_fetch_assoc($eventResults)) {

          $eventname = $row['eventname'];
          $eventdate = $row['eventdate'];
          $eventlocation = $row['location'];
          $starttime = $row['starttime'];
          $endtime = $row['eventname'];
          $eventtype = $row['eventtype'];
          // For every issue in the database add th relevant HTML to a variable, which, will be echoed onto the page
          //if (condition) {
            # code...
          //}

          $events .= <<<TABLE
              <tr>
                  <td></td>
                  <td>$eventname.</td>
                  <td>$eventdate.</td>
                  <td>$eventlocation.</td>
                  <td>$starttime.</td>
                  <td>$endtime.</td>
                  <td>$eventtype.</td>

              </tr>
TABLE;
        }
      }
?>
