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
    <link rel="stylesheet" href="css/event.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>

<header class="header--big">
<h1>Find Events</h1>
</header>


      <?php echo($events);?>
  
    <?php if (isset($_SESSION['userType']) && ($_SESSION['userType'] <= 3)){
        // user SIGNED IN
    ?>
    <a href="add-event-page.php" class="button button--primary-green center-button">Add Event &raquo;</a>


    <?php



        }
        else{
            // NON ADMIN
            echo('Not signed in to create an event');

        }
        ?>
        <?php require_once('elements/footer--big.php');
        ?>

</body>
</html>
