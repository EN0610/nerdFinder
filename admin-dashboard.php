<?php
    /* CREATED BY HARRY */
    
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
    <title>Dashboard | Nerd Finder Admin</title>
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
            <article class="soft-box admin-interface__content ">
                <h5>User control</h5>
                <hr>
                <form id="lock-user-form" action="scripts/lock-user-process.php" method="post" class="padded-box--small admin-interface__text">
                    <p class="admin-interface__text">Choose user</p>
                    <select name="user">
                        <?php echo($usersDropDown); ?>
                    </select><span class="icon-arrow-down select-icon"></span>
                    <a class="text-link" onclick="document.getElementById('lock-user-form').submit();">Lock</a>&nbsp;&nbsp;&nbsp;
                    <a class="text-link" href="mailto:devteam@nerdfinder.com?Subject=Delete%20User%20Account">Request delete</a>
                </form>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Forum comments</h5>
                <hr>
                <?php echo($comments);?>
            </article>
            <article class="soft-box admin-interface__content">
                <h5>Forum posts</h5>
                <hr>
                <form id="delete-forum-post" action="scripts/delete-forum-post-process.php" method="get" class="padded-box--small admin-interface__text">
                    <p class="admin-interface__text">Choose post</p>
                    <select name="post" id="update-post-id">
                        <?php echo($postsDropdown); ?>
                    </select><span class="icon-arrow-down select-icon"></span>
                    <a class="text-link" onclick="document.getElementById('delete-forum-post').submit();">Delete</a>&nbsp;&nbsp;&nbsp;
                    <span id="show-modal" class="text-link" href="">Edit post</span>
                </form>
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
    <div class="overlay hide"></div>
    <section class="modal hide">
        <span class="icon-exit-dark">
            <?php echo file_get_contents("img/icon-exit-dark.svg"); ?>
        </span>
        <form action="scripts/update-forum-post.php" method="post">
            <input id="modal__input" type="text" name="postcontent" placeholder="New post">
            <input id="modal__post-id" type="hidden" name="postid">
            <input class="button button--primary-green" type="submit" name="submit" value="Update post">
        </form>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
