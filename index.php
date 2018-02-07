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
    <title>Hire Experts to Create Amazing Ideas | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header header--big">
        <article class="wrapper">
            <h1 class="header__heading grid-2">Hire experts to create your apps, websites, software &amp; games</h1>
            <a class="button button--primary-white" href="sign-up-client.php">Hire Nerds</a>&nbsp;&nbsp;
            <a class="button button--secondary-white" href="sign-up-nerd.php">Become a Nerd</a>
        </article>
    </header>
    <section id="how-it-works" class="center-text white band">
        <h3>How it works</h3>
        <hr>
        <section class="flex-grid wrapper">
            <article class="grid-1 works__stage">
                <img class="works__image" alt="Sign Up" src="img/how-it-works/sign-up.png">
                <h2>Sign up</h2>
                <p class="works__desc">Benefits include free access to Nerd Finder events and 24/7 customer service.</p>
                <a class="text-link" href="sign-up-client.php">Create account</a>
            </article>
            <article class="grid-1 works__stage">
                <img class="works__image" alt="Post a project" src="img/how-it-works/post-project.png">
                <h2>Post a project</h2>
                <p class="works__desc">Introduce your idea and gain interest from the Nerd Finder community.</p>
                <a class="text-link" href="find-projects.php">Browse projects</a>
            </article>
            <article class="grid-1 works__stage">
                <img class="works__image" alt="Hire nerds" src="img/how-it-works/hire-nerds.png">
                <h2>Hire nerds</h2>
                <p class="works__desc">Find experts who can bring your idea into reality using our search facility.</p>
                <a class="text-link" href="find-nerds.php">Browse nerds</a>
            </article>
        </section> 
    </section>
    <section class="center-text band">
        <h3>Go premium</h3>
        <hr>
        <article class="wrapper">
            <h2 class="shoutout">Remove £25 processing fee</h2>
            <a href="go-premium.php" class="button button--secondary-red">Upgrade now</a>
        </article>
    </section>
    <section class="white band">
        <h3 class="center-text">Categories</h3>
        <hr>
        <section class="flex-grid wrapper">
            <article class="grid-1 grid__row">
                <img src="img/categories/Website.jpg" alt="Websites">
                <h2 class="category__heading">Websites</h2>
            </article>
            <article class="grid-1 grid__row">
                <img src="img/categories/Mobile.jpg" alt="Mobile Apps">
                <h2 class="category__heading">Mobile Apps</h2>
            </article>
            <article class="grid-1 grid__row">
                <img src="img/categories/Tablet.jpg" alt="Tablet Apps">
                <h2 class="category__heading">Tablet Apps</h2>
            </article>
            <article class="grid-1">
                <img src="img/categories/Software.jpg" alt="Software">
                <h2 class="category__heading">Software</h2>
            </article>
            <article class="grid-1"></article>
            <article class="grid-1"></article>
        </section>
    </section>
    <section id="case-study" class="band">
        <h3 class="center-text">Case study</h3>
        <hr>
        <section class="wrapper">
            <article class="headline__container">
                <h2 class="headline">Save money like Debbie by using Nerd Finder to make an award-winning website for just £500</h2>
                <a class="button button--secondary-green" href="create-project-client.php">Create a project</a>
            </article><!--
            --><p class="callout">Debbie Michaels<br>Owner of Super Soaps</p>
        </section> 
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
