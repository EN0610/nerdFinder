<?php
    /* CREATED BY HARRY */

    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
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
            <a class="admin-tools__link" href="admin-dashboard.php"><li class="admin-tools__tool"><span class="icon-speedometer admin-tools__link-icon"></span>Dashboard</li></a>
            <a class="admin-tools__link" href="admin-manage-events.php"><li class="admin-tools__tool"><span class="icon-calendar admin-tools__link-icon"></span>Manage events</li></a>
            <a class="admin-tools__link" href="admin-check-messages.php"><li class="admin-tools__tool"><span class="icon-envelope-open admin-tools__link-icon"></span>Check Messages</li></a>
            <a class="admin-tools__link" href="https://insights.hotjar.com/sites/746289/dashboard" target="_blank"><li class="admin-tools__tool"><span class="icon-eye admin-tools__link-icon"></span>Track users</li></a>
            <a class="admin-tools__link" href="https://analytics.google.com/analytics/web/" target="_blank"><li class="admin-tools__tool"><span class="icon-graph admin-tools__link-icon"></span>View analytics</li></a>
        </ul>
    </aside>
    <section class="admin-interface">
        <h1 class="admin-interface__heading">Manage Events</h1>
        <section class="admin-interface__content-wrapper">

        </section>
        <?php require_once('elements/footer--small.php');
        
            }
            else{
                // NON ADMIN
                echo('<h2 class="center-text sign-in-required">You must be signed in as an admin to access this page</h2>
                      <p class="center-text">Click the SIGN IN button in the navigation bar above an sign in with your admin username to continue</p>
                    ');

            }
        ?>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
