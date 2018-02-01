<?php
    /* CREATED BY HARRY */

    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Pulling data in from a script to save space
    require_once('scripts/admin-manage-events-content.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Manage Events | Nerd Finder Admin</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <?php if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 1)){
        // ADMIN SIGNED IN
    ?>
    <aside class="admin-tools">
        <ul>
            <a class="admin-tools__link" href="admin-dashboard.php"><li class="admin-tools__tool"><span class="icon-speedometer admin-tools__link-icon"></span><span class="admin-tools__link-text">Dashboard</span></li></a>
            <a class="admin-tools__link" href="admin-manage-events.php"><li class="admin-tools__tool"><span class="icon-calendar admin-tools__link-icon"></span><span class="admin-tools__link-text">Manage events</span></li></a>
            <a class="admin-tools__link" href="admin-check-messages.php"><li class="admin-tools__tool"><span class="icon-envelope-open admin-tools__link-icon"></span><span class="admin-tools__link-text">Check Messages</span></li></a>
            <a class="admin-tools__link" href="https://insights.hotjar.com/sites/746289/dashboard" target="_blank"><li class="admin-tools__tool"><span class="icon-eye admin-tools__link-icon"></span><span class="admin-tools__link-text">Track users</span></li></a>
            <a class="admin-tools__link" href="https://analytics.google.com/analytics/web/" target="_blank"><li class="admin-tools__tool"><span class="icon-graph admin-tools__link-icon"></span><span class="admin-tools__link-text">View analytics</span></li></a>
        </ul>
    </aside>
    <section class="admin-interface">
        <h1 class="admin-interface__heading meetup-heading">Manage Events</h1><button class="button button--primary-green new-meetup">New Meetup</button>
        <section class="admin-interface__content-wrapper soft-box meetup__margin">
            <?php echo($eventList);?>
        </section>
        <?php require_once('elements/footer--small.php');
        
            }
            else{
                // NON ADMIN
                echo('<h2 class="center-text sign-in-required">You must be signed in as an admin to access this page</h2>
                      <p class="center-text">Click the SIGN IN button in the navigation bar above and sign in with your admin username to continue</p>
                    ');

            }
        ?>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
