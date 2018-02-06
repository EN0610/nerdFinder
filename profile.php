<?php
// Defining path to session data folder where all session data will be saved/found
require_once('scripts/session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('scripts/set-environment.php');
// Connecting to the Database
require_once('scripts/database-connection.php');

    $userid =  isset($_REQUEST['userid']) ? $_REQUEST['userid'] : 1;
    $userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid = filter_var($userid, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid = trim($userid);
    // SQL using the ID in request stream to pull rest of project info from the Database
    $sql = "SELECT * FROM nf_users WHERE userid = $userid";

    $editprofile = mysqli_query($conn, $sql) or die (mysqli_error($conn));

            while ($row =mysqli_fetch_assoc($editprofile)) {
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
              $email = $row['email'];
              $username = $row['username'];
              $dob = $row['dob'];
              $userpassword = $row['userpassword'];
              $passwordhint = $row['passwordhint'];
              $profilepic = $row['profilepic'];
              $experience = $row['experience'];
              $specialismid = $row['specialismid'];
              $rate = $row['rate'];
              $nerdcv = $row['nerdcv'];
              $portfolioimg1 = $row['portfolioimg1'];
            }
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
    <?php require_once('elements/footer--big.php');?>
    }
      <?php else if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 3)){
            // CLIENT SIGNED IN
            require_once('elements/nav.php'); ?>
            <header class="header background-gradient">
                <article class="wrapper">
                    <h1>client!</h1>
                </article>
            </header>
            <section class="soft-box soft-box--padded wrapper main">
              <?php
        echo "<div class= \"nf_users\">\n";
        echo "<img class= \"nav__user-profile\" src=\"img/profile-pics/$profilePicURL\">\n";
        echo "<p><span class= \"firstname\">$firstname</span></p>\n";
        echo "<p><span class= \"firstname\">$lastname</span></p>\n";
        echo "<p><span class= \"company\">$company</span></p>\n";
        echo "<p><span class= \"jobtitle\">$jobtitle</span></p>\n";
        echo "<p><span class= \"projectname\">$projectname</span></p>\n";
        echo "<p><span class= \"projectdescription\">$projectdescription</span></p>\n";
        echo "<p><span class= \"budget\">$budget</span></p>\n";
        echo "<p><span class= \"deadline\">$deadline</span></p>\n";
        echo "</div>\n";

      mysqli_free_result($rsprofile);
      mysqli_close($conn);
      ?>
            <?php require_once('elements/footer--big.php'); ?>
        } <?php else {
            // NON CLIENT OR NERD SIGNED IN
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
            <?php require_once('elements/footer--big.php');?>
          }
</body>
</html>
