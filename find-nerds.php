<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Script for searching for nerds
    require_once('scripts/nerd-search.php');
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
    <link rel="stylesheet" href="css/user-box.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Find Nerds</h1>
            <h4>Accelerate your project'success </h4>
        </article>
    </header>
    <h3> <br> </h3>
    <h3> <br> </h3>
    <section class="">
        <?php echo $nerds ;?>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>