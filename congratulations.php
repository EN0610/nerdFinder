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
    <title>Congratulations | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1 class="center-heading">Congratulations!</h1>
        </article>
    </header>
    <section class="center-text soft-box soft-box--padded grid-1 shadow--light main">
        <span class="icon-check icon-check--big"></span>
        <h2 class="full-width-form__field">You're all set up</h2>
        <p class="full-width-form__field">You can now begin using your account</p><br>
        <a class="button button--primary-green" href="sign-in.php">Sign in</a>
    </section>
    <footer>
        <p class="copyright--center center-text">© Nerd Finder, 2017. All rights reserved.</p>
    </footer>
</body>
</html>
