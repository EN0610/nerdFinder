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
            <li class="admin-tools__tool"><span id="dashboardResizer" class="icon-arrow-left admin-tools__link-icon"></span></li>
            <a class="admin-tools__link" href="admin-dashboard.php"><li class="admin-tools__tool"><span class="icon-speedometer admin-tools__link-icon"></span><span class="admin-tools__link-text">Dashboard</span></li></a>
            <a class="admin-tools__link" href="admin-manage-events.php"><li class="admin-tools__tool"><span class="icon-calendar admin-tools__link-icon"></span><span class="admin-tools__link-text">Manage events</span></li></a>
            <a class="admin-tools__link" href="admin-check-messages.php"><li class="admin-tools__tool"><span class="icon-envelope-open admin-tools__link-icon"></span><span class="admin-tools__link-text">Check Messages</span></li></a>
            <a class="admin-tools__link" href="admin-refunds.php"><li class="admin-tools__tool"><span class="icon-credit-card admin-tools__link-icon"></span><span class="admin-tools__link-text">User Refunds</span></li></a>
            <a class="admin-tools__link" href="https://insights.hotjar.com/sites/746289/dashboard" target="_blank"><li class="admin-tools__tool"><span class="icon-eye admin-tools__link-icon"></span><span class="admin-tools__link-text">Track users</span></li></a>
            <a class="admin-tools__link" href="https://analytics.google.com/analytics/web/" target="_blank"><li class="admin-tools__tool"><span class="icon-graph admin-tools__link-icon"></span><span class="admin-tools__link-text">View analytics</span></li></a>
        </ul>
    </aside>
    </aside>
    <section class="admin-interface">
        <h1 class="admin-interface__heading">User Refunds</h1>
        <section class="admin-interface__content-wrapper">
            <article class="soft-box padded-box full-width meetup__margin">
                <form method="post" onsubmit="return false">
                    <section class="flex-grid">
                        <article class="grid-1">
                            <h3>Refund amount</h3>
                            <input class="full-width-form__field" type="number" name="amount" placeholder="£">
                            <h3>User</h3>
                            <select class="full-width-form__field">
                                <?php echo($usersDropDown);?>
                            </select><span class="icon-arrow-down select-icon select-icon"></span>
                        </article>
                        <article class="grid-1">
                            <h3>Account number</h3>
                            <input class="full-width-form__field" type="text" name="card-number">
                            <h3>Name on card</h3>
                            <input class="full-width-form__field" type="text" name="name">
                        </article>
                        <article class="grid-1">
                            <h3>Sort code</h3>
                            <input class="full-width-form__field" type="text" name="security-code">
                            <h3>Expiration Date</h3>
                            <input class="full-width-form__field" type="date" name="expiration">
                        </article>
                        <input class="button button--primary-green" type="submit" value="Refund">
                    </section>
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
    <script type="text/javascript" src="js/admin.js"></script>
</body>
</html>
