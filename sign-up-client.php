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
    <form id = "feedback" action="scripts/sign-up-process-client.php" method="post" enctype="multipart/form-data">
      <h3>Profile</h3>
      <h3 for="username">Username</h3>
      <input type="text" name="username" id="username" required  accesskey="1" tabindex="1">
      <h3 for="email">Email</h3>
      <input type="email" name="email" id="email" required  accesskey="2" tabindex="2">
      <h3>Password</h3>
      <input type="password" name="userpassword" id="userpassword" required  accesskey="3" tabindex="3">
      <h3 for="passwordhint">Password Hint</h3>
      <input type="text" name="passwordhint" id="passwordhint" required accesskey="4" tabindex="4">
      <h3 for="dob">DATE OF BIRTH</h3>
      <input type="date" name="dob" id="dob" required accesskey="5" tabindex="5">
  </section>

  <section class="soft-box soft-box--padded wrapper main">
    <h3>About you</h3>
    <label for="profilepic">Profile Picture</label>
    <input type="file" name="profilepic" id="profilepic" accesskey="6" tabindex="6">
    <h3 for="firstname">First Name</h3>
    <input type="text" name="firstname" id="firstname" required  accesskey="7" tabindex="7">
    <h3 for="lastname">Last Name</h3>
    <input type="text" name="lastname" id="lastname" required  accesskey="8" tabindex="8">
    <h3 for="company">Company</h3>
    <input type="text" name="company" id="company" accesskey="9" tabindex="9">
    <h3 for="jobtitle">Job Title</h3>
    <input type="text" name="jobtitle" id="jobtitle" accesskey="10" tabindex="10">
    <h3 for="businessarea">Business Area</h3>
    <input type="text" name="businessarea" id="businessarea" accesskey="11" tabindex="11">

    <input type="submit" value="HIRE NERDS" class="button button--primary-green center-button" accesskey="12" tabindex="12">
    </form>
  </section>
  <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
