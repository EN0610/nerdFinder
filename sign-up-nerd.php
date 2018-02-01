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
    <form id = "feedback" action="scripts/sign-up-process-nerd.php" method="post">
    <section>
    <fieldset>
      <legend>Sign Up</legend>
        <section>
          <label for="firstname">First Name<span>*</span>:</label>
          <input type="text" name="firstname" id="firstname" required  accesskey="1" tabindex="1">
          <label for="lastname">Last Name<span>*</span>:</label>
          <input type="text" name="lastname" id="lastname" required  accesskey="2" tabindex="2">
          <label for="email">Email<span>*</span>:</label>
          <input type="email" name="email" id="email" required  accesskey="3" tabindex="3">
          <label for="username">Username<span>*</span>:</label>
          <input type="text" name="username" id="username" required  accesskey="4" tabindex="4">
          <label for="dob">DOB<span>*</span>:</label>
          <input type="date" name="dob" id="dob" required accesskey="5" tabindex="5">
          <label for="userpassword">Password<span>*</span>:</label>
          <input type="password" name="userpassword" id="userpassword" required  accesskey="6" tabindex="6">
          <label for="passwordhint">Password Hint<span>*</span>:</label>
          <input type="text" name="passwordhint" id="passwordhint" accesskey="7" tabindex="7">
          <label for="profilepic">Profile Picture<span>*</span>:</label>
          <input type="file" name="profilepic" id="profilepic" accesskey="8" tabindex="8">
          <label for="experience">Experience<span>*</span>:</label>
          <input type="text" name="experience" id="experience" accesskey="9" tabindex="9">
          <label for="specialism">Specialism<span>*</span>:</label>
          <select name="specialismid">
            <option value="1">Websites</option>
            <option value="2">Mobile Apps</option>
            <option value="3">Tablet Apps</option>
            <option value="4">Software</option>
          </select><span class="icon-arrow-down select-icon"></span>
          <label for="rate">Hourly Rate<span>*</span>:</label>
          <input type="text" name="rate" id="rate" accesskey="10" tabindex="10">
          <label for="nerdcv">Upload CV<span>*</span>:</label>
          <input type="file" name="nerdcv" id="nerdcv" accesskey="11" tabindex="11">
          <label for="portfolioimg1">Portfolio Images<span>*</span>:</label>
          <input type="file" name="portfolioimg1" id="portfolioimg1" accesskey="11" tabindex="11">
        </section>
    </fieldset>
    </section>

    <input type="submit" value="BECOME A NERD" accesskey="6" tabindex="6">
    </form>

    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--small.php'); ?>
</body>
</html>
