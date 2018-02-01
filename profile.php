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
  <?php if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 2)){
      // NERD SIGNED IN
  ?>

  <h2>
    Hello world, i am a nerd
  </h2>

    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--big.php');
    }
      else {
            // NON NERD OR CLIENT
            require_once('elements/nav.php'); ?>
            <header class="header background-gradient">
                <article class="wrapper">
                    <h1>Whoops!</h1>
                    <h4>You must be signed in to access this page</h4>
                </article>
            </header>
            <section class="soft-box soft-box--padded wrapper main">
                <h2>Click the SIGN IN button in the navigation bar above and sign in with your Nerd or Client username to continue</h2>

            </section>
            <?php require_once('elements/footer--big.php');
            echo('<h2 class="center-text sign-in-required">You must be signed in as a Nerd or a Client to access this page</h2><p class="center-text">Click the SIGN IN button in the navigation bar above and sign in with your Nerd or Client username to continue</p>');
        }
            ?>

</body>
</html>
