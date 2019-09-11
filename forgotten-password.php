<?php
    /* CREATED BY HARRY */
    
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Setting the development enviroment to show errors
    require_once('scripts/set-environment.php');
    // Connecting to the Database
    require_once('scripts/database-connection.php');
    //
    if (isset($_SESSION['password-hint'])) {
        $passwordHint = $_SESSION['password-hint'];
    } else{
        $passwordHint = '?';
    }

    $userDropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users WHERE usertypeid = 2 OR usertypeid = 3 ORDER BY firstname";
    $userDropdownSQLResults = mysqli_query($conn, $userDropdownSQL) or die (mysqli_error($conn));
    $usersDropDown = '';

    if (mysqli_num_rows($userDropdownSQLResults) > 0){
        // At least one row
        while ($row = mysqli_fetch_assoc($userDropdownSQLResults)) {
            //
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

            $usersDropDown .= "<option value='$userid'>$firstname $lastname ($username)</option>";            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Forgotten Password | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Forgotten Password</h1>
            <h4>Don't worry, use your hint</h4>
        </article>
    </header>
    <section class="main flex-grid wrapper">
        <article class="soft-box soft-box--padded grid-1">
            <h2>Password hint</h2>
            <form class="full-width-form" action="scripts/find-password-hint-script.php" method="post">
                <h3>Username</h3>
                <select class="full-width-form__field" name="user" required>
                    <optgroup label="Select a user">
                        </optgroup><?php echo($usersDropDown);?> 
                    </optgroup>
                </select><span class="icon-arrow-down select-icon"></span>
                <h3>Password hint</h3>
                <input class="full-width-form__field" type="text" disabled value="<?php echo($passwordHint);?>">
                <input class="button button--primary-green center-button" type="submit" value="Get my hint">
            </form>
        </article>
        <article class="soft-box soft-box--padded grid-1">
            <h2>Still can't remember?</h2>
            <form class="full-width-form" method="post">
                <h3>Send a reset to my email</h3>
                <input class="full-width-form__field" type="email" name="email" required placeholder="Your email">
                <input class="button button--primary-green center-button" type="submit" value="Send reset">
            </form>
        </article>
        <article class="grid-1"></article>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>