<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Preparing username value field
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    } else{
        $username = '';
    }
    // Preparing password value field
    if (isset($_SESSION['password'])){
        $password = $_SESSION['password'];
    } else{
        $password = '';
    }
    // Preparing error message
    if (isset($_SESSION['errorMessage'])){
        $errorMessage = $_SESSION['errorMessage'];
    } else{
        $errorMessage = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Sign in to Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="flex-grid">
        <article class="grid-1 shadow--light">
            <div class="nerd-finder-logo"><?php echo file_get_contents("img/Nerd-Finder-Logo.svg"); ?></div>
            <form action="scripts/sign-in-process.php" method="get">
                <h3>Username</h3>
                <input type="text" name="username" value="<?php echo($username);?>">
                <h3>Password</h3>
                <input type="password" name="password" value="<?php echo($password);?>"><br>
                <p class="error-message"><?php echo($errorMessage)?></p>
                <a class="text-link" href="sign-up.php">Create account</a>&nbsp;&nbsp;
                <a class="text-link" href="forgotten-password.php">Forgotten password</a><br>
                <input class="background-gradient button" type="submit" name="" value="Sign In">
            </form>
        </article>
    </div>
    <?php require_once('elements/footer--small.php');?>
</body>
</html>