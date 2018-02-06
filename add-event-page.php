<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    //
    require_once('scripts/event-individual.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>| Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>

<header class="header--big">
<h1>Add an Event</h1>
</header>

<section class="soft-box soft-box--padded wrapper main">
  <form class="flex-grid full-width-form" action="scripts/add-meetup.php" method="post">
   <h2>New Event</h2>
           <article class="grid-1">
               <h3>Event Name</h3>
               <input class="full-width-form__field" type="text" name="eventname">
               <h3>Event Type</h3>
               <select name="eventtype" size="4" multiple>
                  <option name="eventtype" value="network">network</option>
                    <option name="eventtype" value="meetup">meetup</option>

                  </select>


               <h3>Event Description</h3>
               <input class="full-width-form__field" type="text" name="eventdescription">
               <h3>Event Date</h3>
               <input class="full-width-form__field" type="date" name="eventdate">
               <h3>Start Time</h3>
               <input class="full-width-form__field" type="time" name="starttime">
               <h3>End Time</h3>
               <input class="full-width-form__field" type="time" name="endtime">
               <h3>Location</h3>
               <input class="full-width-form__field" type="text" name="location">
<input class="button button--primary-green center-button" type="submit" name="insert" value="Add Event">
           </article>
           <article class="grid-1">
               <h3>Please enter the following</h3>
               <ul class="bulleted-list">
                   <li>Free project processing</li>
                   <li>Priority ranking in searches</li>
               </ul>
           </article>
</form>


</section>



    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
