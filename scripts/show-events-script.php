
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
              $eventtype = '<img src="img/event1.png" class="rating" title="Fresh" alt="Fresh" /> Networking event.';
          // if the event_Type is 1 then it will display Networking event
          } else if ($eventtype == 2) {
              $eventtype = '<img src="img/event.jpg" class="rating" title="Fresh" alt="Fresh" /> Workshop event.';
          }




          // need to retrive customer ID for the details page and not display is though
          $events .= <<<CONTENT

              <section class= soft-box soft-box--padded wrapper main flex-grid >
                <article class= events-grid__row>
                  $eventtype
                    <h2 class= event-grid-3-1>
                      <a href=meetup-details.php?eventid={$eventid}>{$eventname} </a>
                      <br><p>$eventlocation</p>
                </article
              </section>
CONTENT;
        }
      }
?>
