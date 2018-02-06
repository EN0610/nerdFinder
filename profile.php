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
                </article>
            </header>
            <section class="soft-box soft-box--padded wrapper main">
              <?php
              require_once('scripts/database-connection.php');	  // make db connection
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              $userid = $_SESSION['userid'];
              $profilePicURL = $_SESSION['profilePicURL'];

              $sql = "SELECT nf_users.userid, usertypeid, firstname, lastname, email, username, dob, userpassword, passwordhint, premium, locked, profilepic, company, jobtitle, businessarea, nf_projects.projectid, nf_projects.clientid, nf_projects.projectname, nf_projects.projectdescription, nf_projects.budget, nf_projects.deadline
              FROM nf_users
              JOIN nf_projects
              ON nf_users.userid=nf_projects.clientid
              WHERE nf_users.userid = $userid";

      $rsprofile = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      while ($row = mysqli_fetch_assoc($rsprofile)) {
        $userid = $row['userid'];
        $usertypeid = $row['usertypeid'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $dob = $row['dob'];
        $userpassword = $row['userpassword'];
        $passwordhint = $row['passwordhint'];
        $premium = $row['premium'];
        $locked = $row['locked'];
        $profilepic = $row['profilepic'];
        $company = $row['company'];
        $jobtitle = $row['jobtitle'];
        $businessarea = $row['businessarea'];
        $projectid = $row['projectid'];
        $clientid = $row['clientid'];
        $projectname = $row['projectname'];
        $projectdescription = $row['projectdescription'];
        $budget = $row['budget'];
        $deadline = $row['deadline'];


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
      }

      mysqli_free_result($rsprofile);
      mysqli_close($conn);
      ?>
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
