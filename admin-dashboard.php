<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 1)){

    /*--------------------------
    GREETING
    --------------------------*/
    // Setting timezone to London
    date_default_timezone_set('Europe/London');
    // Getting the current time (Hour)
    $time = date('H', time());
    // Change Welcome greeting based on time of day
    if ($time < "12") {
        $greeting = "morning";
    } else if ($time >= "12" && $time < "17") {
        $greeting = "afternoon";
    } else {
        $greeting = "evening";
    } 
    // Getting signed in users first naem to personalise greeting
    if (isset($_SESSION['firstName'])){
        $firstname = $_SESSION['firstName'];
    } else{
        $firstname = '';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome | Nerd Finder Admin Dashboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php require_once('elements/nav.php') ?>
    <aside class="admin-tools">
        <ul>
            <li class="admin-tools__tool"><span class="icon-arrow-left admin-tools__link-icon"></span></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-eyeglass admin-tools__link-icon"></span>Monitor nerds</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-briefcase admin-tools__link-icon"></span>Check projects</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-calendar admin-tools__link-icon"></span>Manage events</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-speech admin-tools__link-icon"></span>Go to forum</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-eye admin-tools__link-icon"></span>Track users</a></li>
            <li class="admin-tools__tool"><a class="admin-tools__link" href=""><span class="icon-graph admin-tools__link-icon"></span>View analytics</a></li>
        </ul>
    </aside>
    <section class="admin-interface">
        <h1 class="admin-interface__heading">Good <?php echo($greeting.', '); echo($firstname);?></h1>
        <section class="admin-interface__content-wrapper">
            <article class="soft-box admin-interface__content">
                <h5>Overview</h5>
                <hr>
                <table>
                    <tr>
                        <td>Total number of nerds</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Total number of clients</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Total number of project listings</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Projects with nerds</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Projects awaiting a nerd</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Available nerds</td>
                        <td></td>
                    </tr>
                </table>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Technical updates</h5>
                <hr>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Project requests</h5>
                <hr>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Forum comments</h5>
                <hr>
            </article>
        </section>
        <p class="copyright">© Nerd Finder, 2017. All rights reserved.</p>
    </section>
    <?php require_once('elements/footer--small.php');?>
</body>
</html>
<?php 
    }
    else{
            
    }
?>