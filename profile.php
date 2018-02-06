<?php
// Defining path to session data folder where all session data will be saved/found
require_once('scripts/session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('scripts/set-environment.php');
// Connecting to the Database
require_once('scripts/database-connection.php');

    $userid = $_SESSION['userid'];

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
              $hourlyrate = $row['hourlyrate'];
              $nerdcv = $row['nerdcv'];
              $portfolioimg1 = $row['portfolioimg1'];
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Edit profile | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">
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
      <section class='wrapper main'>
        <form action='scripts/edit-profie-process-nerd.php' method='get' class='flex-grid'>
            <section class = 'soft-box soft-box--padded grid-3-1--small'>
                <aside>
                  <!--  NERD User
                        PROFILE Picture
                        Username
                        specialismid
                        experience
                        Hourlyrate
                        MESSAGE
                        download cv-->

                    <h2 class='full-width-form__heading'>NERD USER</h2>
                    <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
                    <h2><?php echo $firstname . " " . $lastname;?></h2>
                    <h3><?php echo $specialismid;?> Specialist</h3>
                    <h3>with <?php echo $experience;?> Years of experience</h3>
                    <h3>HIRE for £<?php echo $hourlyrate ;?>/hr</h3>
                </aside>
            </section>
            <section>
                <h3 class = 'full-width-form__heading'>PORTFOLIO IMAGES</h3>
            </section>
        </form>
    </section>
  <?php } require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--small.php'); ?>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
