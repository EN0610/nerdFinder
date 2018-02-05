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
  <header class="header background-gradient">
      <article class="wrapper">
          <h1>Sign up</h1>
          <h4>Work on amazing projects</h4>
      </article>
  </header>

    <form id = "feedback" action="scripts/sign-up-process-nerd.php" method="post">
    <section>
    <fieldset>
      <section class = "soft-box soft-box--padded wrapper main">
        <h2>Profile</h2>

        <h3>Username</h3>
        <input type="text" name="username" id="username" required  accesskey="4" tabindex="4">

        <h3>Email</h3>
        <input type="email" name="email" id="email" required  accesskey="3" tabindex="3">

        <h3>Password</h3>
        <input type="password" name="userpassword" id="userpassword" required  accesskey="6" tabindex="6">

        <h3>Password Hint</h3>
        <input type="text" name="passwordhint" id="passwordhint" required accesskey="7" tabindex="7">

        <h3>DOB</h3>
        <input type="date" name="dob" id="dob" required accesskey="5" tabindex="5">
      </section>

      <section class = "soft-box soft-box--padded wrapper main">
        <h3>Firstname</h3>
        <input type="text" name="firstname" id="firstname" required  accesskey="1" tabindex="1">
        <h3>Lastname</h3>
        <input type="text" name="lastname" id="lastname" required  accesskey="2" tabindex="2">

        <h3>Profile picture</h3>
        <img class = "nav__user-profile" src="img/profile-pics/no-image.jpg" alt="Profile Picture">
        <input type="file" name="profilepic" id="profilepic" accesskey="8" tabindex="8">

        <h3>Years of experience</h3>
        <input type="number" name="experience" id="experience" accesskey="9" tabindex="9">

        <h3>Specialiasm</h3>
        <select name="specialismid" required>
          <option value=""> </option>
          <option value="1">Websites</option>
          <option value="2">Mobile Apps</option>
          <option value="3">Tablet Apps</option>
          <option value="4">Software</option>
        </select><span class="icon-arrow-down select-icon"></span>

        <h3>Hourly rate</h3>
        <input type="number" name="rate" id="rate" accesskey="10" tabindex="10">

        <h3>Upload CV</h3>
        <input type="file" name="nerdcv" id="nerdcv" accesskey="11" tabindex="11">

        <h3>Portfolio images</h3>
        <input type="file" name="portfolioimg1" id="portfolioimg1" accesskey="11" tabindex="11">

        <input type="submit" value="BECOME A NERD" class="button button--primary-green center-button" accesskey="12" tabindex="12">
      </section>
    </fieldset>
    </section>

    </form>

    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--small.php'); ?>
</body>
</html>
