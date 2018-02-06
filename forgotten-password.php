<?php
    /* CREATED BY HARRY */
    
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Forgotten Password | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Forgotten Password</h1>
            <h4>Don't worry, we've got you covered</h4>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
        <h2>Email or password hint</h2>
            <form class="flex-grid full-width-form" action="scripts/go-premium-script.php" method="post">
                <article class="grid-1">
                    <h3>Password hint</h3>
                    
                </article>
                <article class="grid-1">
                    <h3>Card number</h3>
                    <input class="full-width-form__field" type="text" name="card-number">
                    <h3>Name on card</h3>
                    <input class="full-width-form__field" type="text" name="name">
                </article>
                <article class="grid-1">
                    <h3>Security code</h3>
                    <input class="full-width-form__field" type="text" name="security-code">
                    <h3>Expiration Date</h3>
                    <input class="full-width-form__field" type="date" name="expiration">
                </article>
                <input class="button button--primary-green center-button" type="submit" name="" value="Pay by card">
            </form>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>