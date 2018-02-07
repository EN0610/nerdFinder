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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <header class="header background-gradient">
      <article class="wrapper">
          <h1>Edit profile</h1>
          <h4>Update your personal information</h4>
      </article>
    </header>
      <section class='wrapper main'>
        <form action='scripts/edit-profie-process-nerd.php' method='get' class='flex-grid'>
            <section class = 'soft-box soft-box--padded grid-3-1--small'>
                <aside>
                    <h2 class='full-width-form__heading'>Your details</h2>
                    <h3>Username</h3>
                    <input class='full-width-form__field' type='text' name='username' id='$username' value="<?php echo($username);?>" accesskey='4' tabindex='4' readonly>
                    <h3>Email</h3>
                    <input class='full-width-form__field' type='email' name='email' id='email' value="<?php echo($email);?>" accesskey='3' tabindex='3'>
                    <h3>Password</h3>
                    <input class='full-width-form__field' type='password' name='userpassword' id='userpassword' value="<?php echo($userpassword);?>" accesskey='6' tabindex='6'>
                    <h3>Password Hint</h3>
                    <input class='full-width-form__field'type='text' name='passwordhint' id='passwordhint' value="<?php echo($passwordhint);?>" accesskey='7' tabindex='7'>
                    <h3>DOB</h3>
                    <input class='full-width-form__field' type='date' name='dob' id='dob' value="<?php echo($dob);?>" accesskey='5' tabindex='5'>
                </aside>
            </section>
            <section class='soft-box soft-box--padded grid-3-2--small'>
                <h2 class='full-width-form__heading'>About you</h2>
                <h3>Profile picture</h3>
                <img class='user-profile' src='img/profile-pics/no-image.jpg' alt='Profile Picture'>
                <input type='file' name='profilepic' id='profilepic' accesskey='8' tabindex='8' value='Browse'>
                <article class='flex-grid'>
                    <aside class='grid-2-1'>
                        <h3>Firstname</h3>
                        <input class='full-width-form__field' type='text' name='firstname' id='firstname' value="<?php echo($firstname);?>" accesskey='1' tabindex='1'>
                        <h3>Years of experience</h3>
                        <input class='full-width-form__field' type='number' name='experience' id='experience' value="<?php echo($experience);?>" accesskey='9' tabindex='9' min='0'>
                        <h3>Specialism</h3>
                        <select class='full-width-form__field' name='specialismid'>
                            <option value='1'>Websites</option>
                            <option value='2'>Mobile Apps</option>
                            <option value='3'>Tablet Apps</option>
                            <option value='4'>Software</option>
                        </select><span class='icon-arrow-down select-icon'></span>
                        <h3>Hourly rate</h3>
                        <input class='full-width-form__field' type='number' name='rate' id='hourlyrate' value="<?php echo($hourlyrate);?>" accesskey='10' tabindex='10' min='0'>
                    </aside>
                    <aside class='grid-2-1'>
                        <h3>Lastname</h3>
                        <input class='full-width-form__field' type='text' name='lastname' id='lastname' value="<?php echo($lastname);?>" accesskey='2' tabindex='2'>
                        <h3>Upload CV</h3>
                        <input class='full-width-form__field' type='file' name='nerdcv' id='nerdcv' accesskey='11' tabindex='11' value='Browse'>
                        <h3>Portfolio images</h3>
                        <input class='portfolioimg' type='file' name='portfolioimg1' id='portfolioimg1' accesskey='11' tabindex='11' value='Browse'>
                        <input class='portfolioimg' type='file' name='portfolioimg2' id='portfolioimg2' accesskey='11' tabindex='11' value='Browse'>
                        <input class='portfolioimg' type='file' name='portfolioimg3' id='portfolioimg3' accesskey='11' tabindex='11' value='Browse'>
                    </aside>
                </article>
                <input type='submit' value='SAVE CHANGES' class='button button--primary-green center-button' accesskey='12' tabindex='12'>&nbsp;&nbsp;&nbsp;
                <a class="button button--secondary-red center-button" href="scripts/delete-profile-process.php">DELETE PROFILE</a>
            </section>
        </form>
    </section>
    <?php require_once('elements/nav.php'); ?>
    <?php require_once('elements/footer--small.php'); ?>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
