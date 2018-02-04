
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $eventSQL = "SELECT * FROM nf_events ORDER BY eventname";
  $eventResults = mysqli_query($conn, $eventSQL) or die (mysqli_error($conn));



  if (mysqli_num_rows($eventResults) > 0){
      // At least one row of events
      while ($row = mysqli_fetch_assoc($eventResults)) {

          $eventid = $row['eventid'];
          $eventname = $row['eventname'];
          $eventdate = $row['eventdate'];
          $eventlocation = $row['location'];
          $starttime = $row['starttime'];
          $endtime = $row['eventname'];
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
          $events .= <<<CONTENT
              <section class= soft-box soft-box--padded wrapper>
                  <h1><a href=meetup-details.php?eventid={$eventid} >{$eventname}</h1>
                  <p>$eventdate.</p>
                  <p>$eventlocation.</p>
                  <p>$starttime.</p>
                  <p>$endtime.</p>
                  <p>$eventtype.</p>

              </section>
CONTENT;
        }
      }
?>
