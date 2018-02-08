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
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Sign up</h1>
            <h4>Save money and improve your business</h4>
        </article>
    </header>
    <section class="wrapper main">
        <form action="scripts/sign-up-process-client.php" method="post" class="flex-grid">
            <section class = "soft-box soft-box--padded grid-3-1--small">
                <aside>
                    <h2 class="full-width-form__heading">Profile</h2>
                    <h3>Username</h3>
                    <input class="full-width-form__field" type="text" name="username" id="username" required  accesskey="1" tabindex="1">
                    <h3>Email</h3>
                    <input class="full-width-form__field" type="email" name="email" id="email" required  accesskey="2" tabindex="2">
                    <h3>Password</h3>
                    <input class="full-width-form__field" type="password" name="userpassword" id="userpassword" required  accesskey="3" tabindex="3">
                    <h3>Password Hint</h3>
                    <input class="full-width-form__field"type="text" name="passwordhint" id="passwordhint" required accesskey="4" tabindex="4">
                    <h3>DOB</h3>
                    <input class="full-width-form__field" type="date" name="dob" id="dob" required accesskey="5" tabindex="5">
                </aside>
            </section>
            <section class="soft-box soft-box--padded grid-3-2--small">
                <h2 class="full-width-form__heading">About you</h2>
                <h3>Profile picture</h3>
                <img class="user-profile" src="img/profile-pics/no-image.jpg" alt="Profile Picture">
                <input type="file" name="profilepic" id="profilepic" accesskey="6" tabindex="6" value="Browse">
                <article class="flex-grid">
                    <aside class="grid-2-1">
                        <h3>Firstname</h3>
                        <input class="full-width-form__field" type="text" name="firstname" id="firstname" required  accesskey="7" tabindex="7">
                        <h3>Company</h3>
                        <input class="full-width-form__field" type="text" name="company" id="company" accesskey="9" tabindex="9">
                        <h3>Job Title</h3>
                        <input class="full-width-form__field" type="text" name="jobtitle" id="jobtitle" accesskey="11" tabindex="11">
                    </aside>
                    <aside class="grid-2-1">
                        <h3>Lastname</h3>
                        <input class="full-width-form__field" type="text" name="lastname" id="lastname" required accesskey="8" tabindex="8">
                        <h3>business Area</h3>
                        <input type="text" name="businessarea" id="businessarea" accesskey="10" tabindex="10">
                    </aside>
                </article>
                <input type="checkbox" name="terms" required><p class="terms__text">I agree to the Nerd Finder website service terms and conditions</p>
                <input type="submit" value="HIRE NERDS" class="button button--primary-green center-button" required accesskey="12" tabindex="12">
            </section>
        </form>
    </section>
    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--big.php'); ?>
  </body>
</html>
