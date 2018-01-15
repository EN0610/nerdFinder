<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Connecting to the file where all admin content is calculated with SQL
    require_once('scripts/admin-content.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Welcome | Nerd Finder Admin Dashboard</title>
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
            <li class="admin-tools__tool"><a class="admin-tools__link" href="find-nerds.php"><span class="icon-eyeglass admin-tools__link-icon"></span>Monitor nerds</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="find-projects.php"><span class="icon-briefcase admin-tools__link-icon"></span>Check projects</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="meetups.php"><span class="icon-calendar admin-tools__link-icon"></span>Manage events</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="forum.php"><span class="icon-speech admin-tools__link-icon"></span>Go to forum</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="https://insights.hotjar.com/sites/746289/dashboard" target="_blank"><span class="icon-eye admin-tools__link-icon"></span>Track users</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="https://analytics.google.com/analytics/web/" target="_blank"><span class="icon-graph admin-tools__link-icon"></span>View analytics</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href="admin-messages.php" target="_blank"><span class="icon-envelope admin-tools__link-icon"></span>Check Messages</a></li>
        </ul>
    </aside>
    <section class="admin-interface">
        <h1 class="admin-interface__heading">Good <?php echo($greeting . ', ' . $userFirstname);?></h1>
        <section class="admin-interface__content-wrapper">
            <article class="soft-box admin-interface__content">
                <h5>Overview</h5>
                <hr>
                <table class="stats">
                    <tr>
                        <td>Total number of nerds</td>
                        <td><?php echo($NerdCalc);?></td>
                    </tr>
                    <tr>
                        <td>Total number of clients</td>
                        <td><?php echo($clientCalc);?></td>
                    </tr>
                    <tr>
                        <td>Total number of project listings</td>
                        <td><?php echo($projectCalc);?></td>
                    </tr>
                    <tr>
                        <td>Projects with nerds</td>
                        <td><?php echo($projectWithNerdCalc);?></td>
                    </tr>
                    <tr>
                        <td>Projects awaiting a nerd</td>
                        <td><?php echo($projectNoNerdCalc);?></td>
                    </tr>
                </table>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Technical updates</h5>
                <hr>
                <?php echo($techIssues);?>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Project requests</h5>
                <hr>
                <?php echo($projects);?>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Forum comments</h5>
                <hr>
                <?php echo($comments);?>
            </article>
        </section>
        <?php echo($feedback);?>
        <?php
            }
            else{
                // NON ADMIN
                echo('<p class="center-text">You must be signed in as an admin to access this page</p>
                     <p class="center-text">Click the SIGN IN button in the navigation bar above to sign in');

            }
        ?>
            <?php require_once('elements/footer--small.php');?>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
