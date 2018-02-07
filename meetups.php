<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    //
    require_once('scripts/show-events-script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Meetups | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/event.css">
</head>

<body>
  <?php require_once('elements/nav.php'); ?>

  <header class="header background-gradient">
    <article class="wrapper">
      <h1>Find meetups</h1>
      <h4>Networking and workshop events to learn new skills.</h4>
    </article>
  </header>
  <section class="wrapper flex-grid">
    <section class="sidebar grid-3-1--small soft-box--padded">
      <h2>Please select an Event</h2>
      <br>
      <p> Please check out our events.<br>
          They are regularly held in the North East
      </p>
        <?php 
            if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 1)){
            // checking if the user is signed in
            echo('<a href="add-event-page.php" class="button button--primary-green center-button">Add Event</a>');

          }
      ?>
  </section>
  <section class="grid-3-2--small main">
  <?php echo($events);
?>

      
</section>
</section>
        <?php require_once('elements/footer--big.php');
        ?>

</body>
</html>
