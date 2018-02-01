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
    <title>Sign Up | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Sign up</h1>
            <h3>Save money and improve your business</h3>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
            <form class="flex-grid full-width-form">
                <article class="grid-1">
                    <h3>What's included</h3>
                    <ul class="bulleted-list">
                        <li>Free project processing</li>
                        <li>Priority ranking in searches</li>
                    </ul>
                </article>
            </form>
    </section>

    <section class="soft-box soft-box--padded wrapper main">
            <form class="flex-grid full-width-form">
                <article class="grid-1">
                    <h3>What's included</h3>
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
