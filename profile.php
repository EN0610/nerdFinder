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

  <header class="header background-gradient">
      <section class="header--small wrapper">
          <a class="header--small__link" href="javascript:history.back()"><span class="icon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</a>
      </section>
  </header>
  <section class="soft-box soft-box--padded wrapper main">
    <a class="button button--primary-white" href="edit-profile-nerd.php">Edit Your Profile</a>&nbsp;&nbsp;

  </section>

    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--big.php');
    }
      else if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 3)){
            // CLIENT SIGNED IN
            require_once('elements/nav.php'); ?>
            <header class="header background-gradient">
                <article class="wrapper">
                    <h1>client!</h1>
                    <h4>You must be signed in to access this page</h4>
                </article>
            </header>
            <section class="soft-box soft-box--padded wrapper main">
                <h2>Click the SIGN IN button in the navigation bar above and sign in with your Nerd or Client username to continue</h2>

            </section>
            <?php require_once('elements/footer--big.php');
        } else
            // NON CLIENT OR NERD SIGNED IN
            require_once('elements/nav.php');?>
            <header class="header background-gradient">
                <article class="wrapper">
                    <h1>Whoops!</h1>
                    <h4>You must be signed in to access this page</h4>
                </article>
            </header>
            <section class="soft-box soft-box--padded wrapper main">
                <h2>Click the SIGN IN button in the navigation bar above and sign in with your Nerd or Client username to continue</h2>
            </section>
            <?php require_once('elements/footer--big.php');?>
</body>
</html>
