<?php
    /* CREATED BY HARRY */

    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    /*--------------------------
    GREETING
    --------------------------*/
    $eventSQL = "SELECT *
                 FROM nf_events
                 ORDER BY eventdate";

    $eventSQLResults = mysqli_query($conn, $eventSQL) or die (mysqli_error($conn));

    $eventList = '';

    if (mysqli_num_rows($eventSQLResults) > 0){
        // At least one row of events
        while ($row = mysqli_fetch_assoc($eventSQLResults)) {

            $eventid = $row['eventid'];
            $eventname = $row['eventname'];
            $eventtype = $row['eventtype'];
            $eventdescription = $row['eventdescription'];
            $eventdate = $row['eventdate'];
            $location = $row['location'];
            $starttime = $row['starttime'];
            $endtime = $row['endtime'];

            if ($eventtype == 1) {
                // Networking Event
                $eventtype = 'Networking event';
            } else if ($eventtype == 2) {
                // Workshop Event
                $eventtype = 'Workshop event';
            }

            $eventList .= <<<EVENT

            <section class="meetup-event">
                <section class="flex-grid">
                    <article class="grid-3-2">
                        <h2>$eventname</h2>
                        <h3>$eventtype</h3>
                        <p class="grid__row">$eventdescription</p>
                    </article>
                    <article class="grid-3-1">
                        <div class="grid__row">
                            <h3>Date &amp; Time</h3>
                            <p>$eventdate</p>
                            <p>$starttime - $endtime</p>
                        </div>
                        <div class="grid__row">
                            <h3>Location</h3>
                            <p>$location</p>
                        </div>
                    </article>
                </section>
                <form class="meetup-event__modify" id="edit-event-$eventid">
                    <input type="hidden" value="$eventid">
                    <a class="text-link" onclick="document.getElementById('edit-event-$eventid').submit();">Edit</a>
                </form>
                <form class="meetup-event__modify" id="delete-event-$eventid">
                    <input type="hidden" value="$eventid">
                    <a class="text-link" onclick="document.getElementById('delete-event-$eventid').submit();">Delete</a>
                </form>
            </section>
            <hr>

EVENT;

        }
    } else{

        $eventList = <<<NOEVENTS

        <section class="meetup-event">
            
        </section>

NOEVENTS;

    }
?>