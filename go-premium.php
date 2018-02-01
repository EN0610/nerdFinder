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
    <title>Go premium | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Upgrade to premium</h1>
            <h4>Forget about £25 processing fee on projects</h4>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
        <h2>£10 per month</h2>
            <form class="flex-grid full-width-form">
                <article class="grid-1">
                    <h3>What's included</h3>
                    <ul class="bulleted-list">
                        <li>Free project processing</li>
                        <li>Priority ranking in searches</li>
                    </ul>
                </article>
                <article class="grid-1">
                    <h3>Card number</h3>
                    <input class="full-width-form__field" type="text" name="card-number">
                    <h3>Name of card</h3>
                    <input class="full-width-form__field" type="text" name="name">
                </article>
                <article class="grid-1">
                    <h3>Security code</h3>
                    <input class="full-width-form__field" type="text" name="security-code">
                    <h3>Expiration Date</h3>
                    <input class="full-width-form__field" type="text" name="expiration">
                </article>
                <input class="button button--primary-green center-button" type="submit" name="" value="Pay by card">
            </form>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>