<?php
    /* CREATED BY HARRY */
    
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Showing error reporting
    require_once('scripts/set-environment.php');
    // Connecting to the Database
    require_once('scripts/database-connection.php');
    //
    if (isset($_SESSION['userid'])) {

        $userid = $_SESSION['userid'];
        //
        $sql = "SELECT premium
                FROM nf_users
                WHERE userid = $userid";

        if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                $premium = $row['premium'];
                //
                if ($premium == 1) {
                    $premiumUser = true;
                } else{
                    $premiumUser = false;
                }
            }
        }
    } else{

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Go premium | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <?php 
            if($premiumUser){

                $page = <<<PREMIUM

                <h1>Upgrade to premium</h1>
            <h4>Forget about £25 processing fee on projects</h4>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
            <h2>Congratulations!</h2><br>
            <p>You're already a premium member, your benefits are:</p><br>
            <ul class="bulleted-list">
                <li>Free project processing</li>
                <li>Priority ranking in searches</li>
            </ul>
            <a href="profile.php?userid=$userid" class="button button--primary-green center-button">View my profile</a>
    </section>

PREMIUM;
            } else{

                $page = <<<NOPREMIUM

                <h1>Upgrade to premium</h1>
            <h4>Forget about £25 processing fee on projects</h4>
        </article>
    </header>
    <section class="soft-box soft-box--padded wrapper main">
        <h2>£10 per month</h2>
        <form class="flex-grid full-width-form" action="scripts/go-premium-script.php" method="post">
            <article class="grid-1">
                <h3>What's included</h3>
                <ul class="bulleted-list">
                    <li>Free project processing</li>
                    <li>Priority ranking in searches</li>
                </ul>
            </article>
            <article class="grid-1">
                <h3>Card number</h3>
                <input class="full-width-form__field" type="text" name="card-number" required>
                <h3>Name on card</h3>
                <input class="full-width-form__field" type="text" name="name" required>
            </article>
            <article class="grid-1">
                <h3>Security code</h3>
                <input class="full-width-form__field" type="text" name="security-code" required>
                <h3>Expiration Date</h3>
                <input class="full-width-form__field" type="date" name="expiration" required>
            </article>
            <input class="button button--primary-green center-button" type="submit" name="" value="Pay by card">
        </form>
    </section>

NOPREMIUM;
            }
    echo($page);?>
            
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>