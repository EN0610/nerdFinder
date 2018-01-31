<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
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
    <header class="header header--big">
        <article class="wrapper">
            <h1 class="header__heading grid-2">Hire experts to create your apps, websites, software &amp; games</h1>
            <a class="button button--primary-white" href="">Hire Nerds</a>&nbsp;&nbsp;
            <a class="button button--secondary-white" href="">Become a Nerd</a>
        </article>
    </header>
    <h3>Nerds just for you</h3>
	<?php require_once('scripts/nerd-search.php'); ?>
    <form action="scripts/nerd-search.php" method="post">
        <label>Website</label>
        <input id="checkBox1" type="checkbox" name="Websites">
        <label>Mobile Apps</label>
        <input id="checkBox1" type="checkbox" name="MobileApps">
        <label>Tablet Apps</label>
        <input id="checkBox1" type="checkbox" name="TabletApps">
        <label>Software</label>
        <input id="checkBox1" type="checkbox" name="Software">
    </form>


    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>