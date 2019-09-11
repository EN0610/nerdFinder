
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $eventSQL = "SELECT * FROM nf_events ORDER BY eventname";
  $eventResults = mysqli_query($conn, $eventSQL) or die (mysqli_error($conn));

  $events = '';
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
              $eventtype = '<img src="img/events/Networking.jpg" class="rating" title="Fresh" alt="Fresh" /> Networking event.';
          // if the event_Type is 1 then it will display Networking event
          } else if ($eventtype == 2) {
              $eventtype = '<img src="img/events/Workshop.png" class="rating" title="Fresh" alt="Fresh" /> Workshop event.';
          }
          // need to retrive customer ID for the details page and not display is though
          $events .= <<<CONTENT
            <a href=meetup-details.php?eventid={$eventid}>
              <section class="forum-soft-box">
                <div class="flex-grid full-width-form">
                  <div class="grid-1">
                    <p>$eventtype</p>
                  </div>
                  <div class="grid-1">
                    <h2>{$eventname}</h2>
                  </div>
                  <div class= grid-1>
                    <h4 class=event-box_location>$eventlocation</h4>
                  </div>
                </div>
              </section>
            </a>
CONTENT;
        }
      }
?>
