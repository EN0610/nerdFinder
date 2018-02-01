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
    <form id = "feedback" action="scripts/sign-up-process-client.php" method="post">
      <h3>Profile</h3>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required  accesskey="1" tabindex="1">
      <label for="userpassword">Password</label>
      <input type="text" name="userpassword" id="userpassword" required  accesskey="2" tabindex="2">
      <label for="passwordhint">Password Hint</label>
      <input type="text" name="passwordhint" id="passwordhint" accesskey="3" tabindex="3">
      <label for="dob">DATE OF BIRTH</label>
      <input type="date" name="dob" id="dob" accesskey="4" tabindex="4">
  </section>

  <section class="soft-box soft-box--padded wrapper main">
    <h3>About you</h3>
    <label for="profilepic">Profile Picture</label>
    <input type="file" name="profilepic" id="profilepic" accesskey="5" tabindex="5">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" required  accesskey="6" tabindex="6">
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" required  accesskey="7" tabindex="7">
    <label for="company">Company</label>
    <input type="text" name="company" id="company" accesskey="8" tabindex="8">
    <label for="jobtitle">Job Title</label>
    <input type="text" name="jobtitle" id="jobtitle" accesskey="9" tabindex="9">
    <label for="businessarea">Business Area</label>
    <input type="text" name="businessarea" id="businessarea" accesskey="10" tabindex="10">

    <input type="submit" value="HIRE NERDS" class="button button--primary-green center-button" accesskey="6" tabindex="6">
    </form>
  </section>
  <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
