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
    <title>| Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>

<header class="header--big">
<h1>Find Events</h1>
</header>

      <div class="wrapper_1 soft-box--padded main">
      <?php echo($events);?>
    </div>
    <form action="scripts/add-event.php" method="post" class="flex-grid" name="event-form">
        <section class="grid-2-1">
            <input type="hidden" name="eventid" value="<?php echo($_SESSION['eventid']);?>">

        </section>

        <input class="button button--primary-green center-button" type="submit" name="add" value="add event">

    </form>

    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
