<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    //
    require_once('scripts/event-individual.php');

    $eventid = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;
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
    <link rel="stylesheet" href="css/event.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>

<header class="header background-gradient">
    <article class="wrapper">
        <h1><?php echo($eventname); ?></h1>
        <h4></h4>
    </article>
</header>

    <section class="soft-box soft-box--padded wrapper main flex-grid">
  <article class="grid-3-2">
      <h2>Event Date</h2>
      <h3 class="grid__row"><?php echo($eventdate); ?></h3>
      <p class="grid__row"><?php echo($eventdescription); ?></p>
</article>
      <aside class="grid-3-1">
        <article class="grid__row">
            <h3>Location</h3>
            <a><?php echo($eventlocation);?>
            </a>
        </article>
        <article class="grid__row">
            <h3>Time</h3>
            <p><?php echo($starttime.' : '. $endtime);?></p>
        </article>

</aside>
<?php if (isset($_SESSION['userType']) && ($_SESSION['userType'] = 3)){
    // user SIGNED IN
?>

<form method="post"  action="scripts/attend-event.php">
    <input type="hidden" value="<?php echo($eventid);?>" name="eventid">
    <input class="button button--primary-green center-button" type="submit" name="submit" value="Attend Event"/>
</form>

<?php
}
else{
    // NON ADMIN
    echo('Not signed in to create an event');

}
?>


</section>



    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
