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
    <title>Create a project | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Create a new project</h1>
            <h2>Out with the old, in with the new</h2>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
            <form class="flex-grid full-width-form">
                <article class="grid-1">
                    <h3>Project details</h3>
                    <form id = "feedback" action="scripts/sign-up-process-client.php" method="post">
                      <label for="projectname">NAME</label>
                      <input type="text" name="projectname" id="projectname" required  accesskey="1" tabindex="1">
                      <label for="projectdescription">DESCRIPTION</label>
                      <input type="text" name="projectdescription" id="projectdescription" required  accesskey="2" tabindex="2">
                </article>
                <article class="grid-1">
                      <label for="projectspecialistarea">SPECIALIST AREA</label>
                      <input type="text" name="projectspecialistarea" id="projectspecialistarea" required  accesskey="3" tabindex="3">
                      <label for="projectdeadline">DEADLINE</label>
                      <input type="date" name="projectdeadline" id="projectdeadline" required  accesskey="4" tabindex="4">
                      <label for="projectbudget">BUDGET</label>
                      <input type="text" name="projectbudget" id="projectbudget" required  accesskey="5" tabindex="5">
                </article>
                <article class="grid-1">
                  <label for="projectinspiration">Profile Picture</label>
                  <input type="file" name="projectinspiration" id="projectinspiration" accesskey="6" tabindex="6">

                </article>
            </form>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
