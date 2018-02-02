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
                    <input type="hidden" value="$eventid" name="eventid">
                    <input type="hidden" value="$eventname" name="eventname">
                    <a class="text-link" onclick="document.getElementById('edit-event-$eventid').submit();">Edit</a>
                </form>
                <form class="meetup-event__modify" id="delete-event-$eventid" method="post" action="scripts/admin-delete-event.php">
                    <input type="hidden" value="$eventid" name="eventid">
                    <input type="hidden" value="$eventname" name="eventname">
                    <a class="text-link" onclick="document.getElementById('delete-event-$eventid').submit();">Delete</a>
                </form>
            </section>
            <hr>

EVENT;

        }
    } else{

        $eventList = <<<NOEVENTS

        <section class="meetup-event">
            <h2 class="light-grey-text">No events in database</h2>
        </section>

NOEVENTS;

    }
    /*--------------------------
    FEEDBACK MECHANISM
    --------------------------*/

    $feedback = '';

    if (isset($_SESSION['admin-feedback'], $_SESSION['feedback-message'])){

        if (($_SESSION['admin-feedback']) === 1){

            $message = $_SESSION['feedback-message'];
            // Positive Feedback
            $feedback = <<<CONTENT
            
            <aside class="feedback positive-feedback">
                <span class="icon-check feedback-icon"></span>
                <h5 class="feedback-message">$message</h5>
                <a href="scripts/close-admin-feedback-process.php">
                    <img class="icon-exit" src="img/icon-exit.svg" alt="close">
                </a>
            </aside>
CONTENT;
            
        } else if (($_SESSION['admin-feedback']) === 2){

            $message = $_SESSION['feedback-message'];
            // Negative Feedback
            $feedback = <<<CONTENT

            <aside class="feedback negative-feedback">
                <span class="icon-exclamation feedback-icon"></span>
                <h5 class="feedback-message">$message</h5>
                <a href="scripts/close-admin-feedback-process.php">
                    <img class="icon-exit" src="img/icon-exit.svg" alt="close">
                </a>
            </aside>
CONTENT;
        } else{

            // No Feeback
            $feedback = '';

        }
    }

    mysqli_close($conn);