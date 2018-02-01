<?php
    /* CREATED BY HARRY */

    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();

    require_once('scripts/admin-check-messages-script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Check User Messages | Nerd Finder Admin</title>
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
        <h1 class="admin-interface__heading">Check Messages</h1>
        <section class="admin-interface__content-wrapper">
            <article class="soft-box admin-interface__content padded-box">
                <?php echo($pageContent);?>
            </article>
            <article class="soft-box admin-interface__content">
                <form class="user-finder" action="scripts/admin-update-message-script.php" method="post">
                    <h2 class="user-finder__heading">From</h2>
                    <select name="userid1">
                        <?php echo($usersDropDown1);?>
                    </select><span class="icon-arrow-down select-icon"></span>
                    <h2 class="user-finder__heading">To</h2>
                    <select name="userid2">
                        <?php echo($usersDropDown2);?>
                    </select><span class="icon-arrow-down select-icon"></span>
                    <input class="button button--primary-green user-finder__button" type="submit" value="View Messages" >
                </form>
            </article>
        </section>
        <?php require_once('elements/footer--small.php');
        
            }
            else{
                // NON ADMIN
                echo('<h2 class="center-text grey-text no-access">You must be signed in as an admin to access this page</h2>
                      <p class="center-text">Click the SIGN IN button in the navigation bar above and sign in with your admin username to continue</p>
                    ');

            }
        ?>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
