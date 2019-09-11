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
              $firstname2 = $row['firstname'];
              $lastname2 = $row['lastname'];
              $email2 = $row['email'];
              $username2 = $row['username'];
              $dob2 = $row['dob'];
              $userpassword2 = $row['userpassword'];
              $passwordhint2 = $row['passwordhint'];
              $profilepic2 = $row['profilepic'];
              $experience2 = $row['experience'];
              $portfolioImg12 = $row['portfolioimg1'];
              $portfolioImg22 = $row['portfolioimg2'];
              $portfolioImg32 = $row['portfolioimg3'];
              $specialismid2 = $row['specialismid'];
              $hourlyrate2 = $row['hourlyrate'];
              $nerdcv2 = $row['nerdcv'];
              $company = $row['company'];
              $jobtitle = $row['jobtitle'];
              $businessarea = $row['businessarea'];
            }
            // SQL using the ID in request stream to pull rest of project info from the Database
            $projectSql = "SELECT *
                               FROM nf_projects INNER JOIN nf_users
                               ON (nf_projects.nerdid = nf_users.userid) INNER JOIN nf_specialismtypes
                               ON (nf_projects.specialismid = nf_specialismtypes.specialismid)
                               WHERE userid = $userid";
            $projectSqlResults = mysqli_query($conn, $projectSql) or die (mysqli_error($conn));
            if (mysqli_num_rows($projectSqlResults) > 0) {
                // Project found
                while ($row = mysqli_fetch_assoc($projectSqlResults)) {
                    // Project details
                    $projectname = $row['projectname'];
                    $specialismid = $row['specialismid'];
                    $specialismdesc = $row['specialismdesc'];
                    $projectdescription = $row['projectdescription'];
                    $budget = $row['budget'];
                    $deadline = $row['deadline'];
                    $inspirationimg1 = $row['inspirationimg1'];
                    $inspirationimg2 = $row['inspirationimg2'];
                    $inspirationimg3 = $row['inspirationimg3'];
                    // User details
                    $userid = $row['clientid'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $username = $row['username'];
                    $profilepic = $row['profilepic'];
                }
                if ($specialismdesc = 'Websites') {
                    $specialismdesc = 'Website';
                 } else if ($specialismdesc = 'Mobile apps') {
                     $specialismdesc = 'Mobile app';
                 } else if ($specialismdesc = 'Tablet apps') {
                    $specialismdesc = 'Tablet app';
                 }
            } else {
            }
            // SQL using the ID in request stream to pull rest of project info from the Database
           $projectSqlClient = "SELECT *
                              FROM nf_projects INNER JOIN nf_users
                              ON (nf_projects.clientid = nf_users.userid) INNER JOIN nf_specialismtypes
                              ON (nf_projects.specialismid = nf_specialismtypes.specialismid)
                              WHERE userid = $userid";

           $projectSqlClientResults = mysqli_query($conn, $projectSqlClient) or die (mysqli_error($conn));

           if (mysqli_num_rows($projectSqlClientResults) > 0) {

               // Project found
               while ($row = mysqli_fetch_assoc($projectSqlClientResults)) {
                   // Project details
                   $projectname = $row['projectname'];
                   $specialismid = $row['specialismid'];
                   $specialismdesc = $row['specialismdesc'];
                   $projectdescription = $row['projectdescription'];
                   $budget = $row['budget'];
                   $deadline = $row['deadline'];
                   $inspirationimg1 = $row['inspirationimg1'];
                   $inspirationimg2 = $row['inspirationimg2'];
                   $inspirationimg3 = $row['inspirationimg3'];
                   // User details
                   $userid = $row['clientid'];
                   $firstname = $row['firstname'];
                   $lastname = $row['lastname'];
                   $username = $row['username'];
                   $profilepic = $row['profilepic'];
                   $company = $row['company'];
                   $jobtitle = $row['jobtitle'];
               }
               if ($specialismdesc = 'Websites') {
                   $specialismdesc = 'Website';

                } else if ($specialismdesc = 'Mobile apps') {
                    $specialismdesc = 'Mobile app';
                } else if ($specialismdesc = 'Tablet apps') {
                   $specialismdesc = 'Tablet app';
                }

           } else {

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
    <script type="text/javascript" src="js/main.js"></script>
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
                  <img class="nav__user-profile" src="img/profile-pics/$profilepic2" alt="Profile picture">
                  <h2>$firstname2 $lastname2</h2>
                  <h3>$specialismdesc2 Specialist</h3>
                  <h3>with $experience2 Years of experience</h3>
                  <h3>HIRE for £$hourlyrate2/hr</h3>
                  <a class="button button--secondary-red center-button" href="messages.php">MESSAGE</a>
              </aside>
          </section>
          <section class="user-box__wrapper">
            <h3>PORTFOLIO IMAGES</h3>
            <article>
                <img class="user-box__pic" src="img/portfolios/$portfolioImg12" alt="Portfolio Image"><!--
                --><img class="user-box__pic" src="img/portfolios/$portfolioImg22" alt="Portfolio Image"><!--
                --><img class="user-box__pic" src="img/portfolios/$portfolioImg32" alt="Portfolio Image">
            </article>
          </section>
          <section>
            <article class="grid-3-2">
                <h3 class="grid__row">$specialismdesc2 project</h3>
                <h2 class="grid__row">$projectname2</h2>
                <p class="grid__row">$projectdescription2</p>
                <h3 class="grid__row">Inspiration images</h3>
                <article class="grid__row">
                    <img class="grid__row-image" src="img/projects/$inspirationimg1" alt="Project Inspiration Image 1">
                    <img class="grid__row-image" src="img/projects/$inspirationimg2" alt="Project Inspiration Image 2">
                    <img class="grid__row-image" src="img/projects/$inspirationimg3" alt="Project Inspiration Image 3">
                </article>            </article>
          </section>
      </section>
CONTENT;
    } else if ($usertypeid == 3) {
    $profilepage = <<<CONTENT
        <h2 class="full-width-form__heading"NERD USER</h2>
        <img class="nav__user-profile" src="img/profile-pics/$profilepic" alt="Profile picture">
        <h2>$firstname $lastname</h2>
        <h3>$jobtitle</h3>
        <h3>at $company</h3>
        <a class="button button--secondary-red center-button" href="messages.php">MESSAGE</a>
      </aside>
    </section>

    <section>
      <article class="grid-3-2">
        <h3 class="grid__row">$specialismdesc project</h3>
        <h2 class="grid__row">$projectname</h2>
        <p class="grid__row">$projectdescription</p>
        <h3 class="grid__row">Inspiration images</h3>
      </article>
      <article class="grid__row">
        <img class="grid__row-image" src="img/projects/$inspirationimg1" alt="Project Inspiration Image 1">
        <img class="grid__row-image" src="img/projects/$inspirationimg2" alt="Project Inspiration Image 2">
        <img class="grid__row-image" src="img/projects/$inspirationimg3" alt="Project Inspiration Image 3">
      </article>            
    </section>
CONTENT;
  } echo($profilepage);
    require_once('elements/footer--big.php');?>
</body>
</html>
