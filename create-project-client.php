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
        <h4>Out with the old, in with the new</h4>
      </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
<<<<<<< HEAD
      <h3>Project details</h3>
      <form id = "feedback" action="scripts/create-project-process.php" method="post" class="flex-grid full-width-form">
        <article class="grid-1">
          <h3 for="projectname">NAME</h3>
          <input type="text" name="projectname" id="projectname" required  accesskey="1" tabindex="1">
          <h3 for="projectdescription">DESCRIPTION</h3>
          <input type="text" name="projectdescription" id="projectdescription" required  accesskey="2" tabindex="2">
        </article>
        <article class="grid-1">
          <h3 for="projectspecialistarea">SPECIALIST AREA</h3>
          <select name="projectspecialistarea" id="projectspecialistarea" required  accesskey="3" tabindex="3">
            <option value="1">Websites</option>
            <option value="2">Mobile apps</option>
            <option value="3">Tablet apps</option>
            <option value="4">Software</option>
          </select><span class='icon-arrow-down select-icon'></span>
          <h3 for="projectdeadline">DEADLINE</h3>
          <input type="date" name="projectdeadline" id="projectdeadline" required  accesskey="4" tabindex="4">
          <h3 for="projectbudget">BUDGET</h3>
          <input type="text" name="projectbudget" id="projectbudget" required  accesskey="5" tabindex="5">
        </article>
        <article class="grid-1">
          <h3 for="inspirationimg1">Inspiration Image 1</h3>
          <input type="file" name="inspirationimg1" id="inspirationimg1" accesskey="6" tabindex="6">
          <h3 for="inspirationimg2">Inspiration Image 2</h3>
          <input type="file" name="inspirationimg2" id="inspirationimg2" accesskey="7" tabindex="7">
          <h3 for="inspirationimg3">Inspiration Image 3</h3>
          <input type="file" name="inspirationimg3" id="inspirationimg3" accesskey="8" tabindex="8">
        </article>
        <input type="checkbox" name="terms"><p class="terms__text">I agree to the Nerd Finder website service terms and conditions</p>
        <input type="submit" value="CREATE PROJECT" class="button button--primary-green center-button" accesskey="12" tabindex="12">
=======
      <h2>Project details</h2>
      <form class="flex-grid full-width-form" id = "feedback" action="scripts/create-project-process.php" method="post">
      <article class="grid-1">
            <h3 for="projectname">NAME</h3>
            <input class="full-width-form__field" type="text" name="projectname" id="projectname" required  accesskey="1" tabindex="1">
            <h3 for="projectdescription">DESCRIPTION</h3>
            <input class="full-width-form__field" type="text" name="projectdescription" id="projectdescription" required  accesskey="2" tabindex="2">
      </article>
      <article class="grid-1">
        <h3 for="projectspecialistarea">SPECIALIST AREA</h3>
        <select class="full-width-form__field" name="projectspecialistarea" id="projectspecialistarea" required  accesskey="3" tabindex="3">
          <option value="1">Websites</option>
          <option value="2">Mobile apps</option>
          <option value="3">Tablet apps</option>
          <option value="4">Software</option>
        </select><span class='icon-arrow-down select-icon'></span>
        <h3 for="projectdeadline">DEADLINE</h3>
        <input class="full-width-form__field" type="date" name="projectdeadline" id="projectdeadline" required  accesskey="4" tabindex="4">
        <h3 for="projectbudget">BUDGET</h3>
        <input class="full-width-form__field" type="text" name="projectbudget" id="projectbudget" required  accesskey="5" tabindex="5">
      </article>
      <article class="grid-1">
        <h3 for="inspirationimg1">Inspiration Image 1</h3>
        <input class="full-width-form__field" type="file" name="inspirationimg1" id="inspirationimg1" accesskey="6" tabindex="6">
        <h3 for="inspirationimg2">Inspiration Image 2</h3>
        <input class="full-width-form__field" type="file" name="inspirationimg2" id="inspirationimg2" accesskey="7" tabindex="7">
        <h3 for="inspirationimg3">Inspiration Image 3</h3>
        <input class="full-width-form__field" type="file" name="inspirationimg3" id="inspirationimg3" accesskey="8" tabindex="8">
      </article>
      <article>
      <input type="checkbox" name="terms"><p class="terms__text">I agree to the Nerd Finder website service terms and conditions</p>
      <input type="submit" value="CREATE PROJECT" class="button button--primary-green center-button" accesskey="12" tabindex="12">
    </article>
>>>>>>> 612fdf2dfeb2846c60dc020d69897e065b8c11f9
      </form>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
  </body>
</html>
