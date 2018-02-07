<?php
// Defining path to session data folder where all session data will be saved/found
require_once('scripts/session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('scripts/set-environment.php');
// Connecting to the Database
require_once('scripts/database-connection.php');
  $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : 1;
  $usertypeid = isset($_REQUEST['usertypeid']) ? $_REQUEST['usertypeid'] : null;



    // SQL using the ID in request stream to pull rest of project info from the Database
    $sql = "SELECT * FROM nf_users WHERE userid = $userid";

    $editprofile = mysqli_query($conn, $sql) or die (mysqli_error($conn));

            while ($row =mysqli_fetch_assoc($editprofile)) {
              $usertypeid = $row['usertypeid'];
              $userid = $row['userid'];
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
              $email = $row['email'];
              $username = $row['username'];
              $dob = $row['dob'];
              $userpassword = $row['userpassword'];
              $passwordhint = $row['passwordhint'];
              $profilepic = $row['profilepic'];
              $experience = $row['experience'];
              $portfolioImg1 = $row['portfolioimg1'];
              $portfolioImg2 = $row['portfolioimg2'];
              $portfolioImg3 = $row['portfolioimg3'];
              $specialismid = $row['specialismid'];
              $hourlyrate = $row['hourlyrate'];
              $nerdcv = $row['nerdcv'];
              $portfolioimg1 = $row['portfolioimg1'];
              $company = $row['company'];
              $jobtitle = $row['jobtitle'];
              $businessarea = $row['businessarea'];
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title><?php echo $firstname . " " . $lastname;?> | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
  <?php require_once('elements/nav.php'); ?>
  <header class="header background-gradient">
      <section class="header--small wrapper">
          <a class="header--small__link" href="javascript:history.back()"><span class="icon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</a>
      </section>
  </header>
      <section class='wrapper main'>
          <section class = 'soft-box soft-box--padded grid-3-1--small'>
              <aside>

                <!--  NERD User
                      PROFILE Picture
                      Username
                      specialismid
                      experience
                      Hourlyrate
                      MESSAGE
                      download cv -->
                  <?php if ($usertypeid == 2) {
                    $profilepage = <<<CONTENT
                  <h2 class="full-width-form__heading"NERD USER</h2>
                  <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="Profile picture">
                  <h2>$firstname $lastname</h2>
                  <h3>$specialismid Specialist</h3>
                  <h3>with $experience Years of experience</h3>
                  <h3>HIRE for £$hourlyrate/hr</h3>
              </aside>
          </section>
          <section>
            <h3>PORTFOLIO IMAGES</h3>
            <article class="user-box">
                <img class="user-box_pic" src="img/portfolios/$portfolioImg1" alt="Portfolio Image">
                <img class="user-box_pic" src="img/portfolios/$portfolioImg2" alt="Portfolio Image">
                <img class="user-box_pic" src="img/portfolios/$portfolioImg3" alt="Portfolio Image">
            </article>
          </section>
      </section>
CONTENT;
    } else if ($usertypeid == 3) {
    $profilepage = <<<CONTENT
    <section class='wrapper main'>
      <section class = 'soft-box soft-box--padded grid-3-1--small'>
          <aside>
            <h2 class='full-width-form__heading'>CLIENT USER</h2>
            <img class="nav__user-profile" src=img/profile-pics/pedro-dacantus.jpg alt="Profile picture">
            <h2>$firstname $lastname</h2>
            <h3>$specialismid Specialist</h3>
            <h3>with $experience Years of experience</h3>
            <h3>HIRE for £$hourlyrate/hr</h3>
          </aside>
      </section>
    </section>
    <section>
      <h3>CLIENT</h3>
    </section>
CONTENT;
  } echo($profilepage);
    require_once('elements/footer--small.php');?>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
