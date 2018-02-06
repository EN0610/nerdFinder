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
    // Pulling clicked on project from request stream AND validating
    $userid = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : 1;
    $userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid = filter_var($userid, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid = trim($userid);

    $projectid = isset($_REQUEST['projectid']) ? $_REQUEST['projectid'] : 1;
    $projectid = filter_var($projectid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $projectid = filter_var($projectid, FILTER_SANITIZE_SPECIAL_CHARS);
    $projectid = trim($projectid);
    // SQL using the ID in request stream to pull rest of project info from the Database
    $projectSql = "SELECT *
                       FROM nf_projects INNER JOIN nf_users
                       ON (nf_projects.clientid = nf_users.userid) INNER JOIN nf_specialismtypes
                       ON (nf_projects.specialismid = nf_specialismtypes.specialismid)
                       WHERE projectid = $projectid";

    $projectSqlResults = mysqli_query($conn, $projectSql) or die (mysqli_error($conn));

    if (mysqli_num_rows($projectSqlResults) > 0) {

        // Project found
        while ($row = mysqli_fetch_assoc($projectSqlResults)) {
            // Project details
            $projectname = $row['projectname'];
            $specialismid = $row['specialismid'];
            $specialismdesc = $row['specialismdesc'];
            $projectdescription = $row['projectdescription'];
            $budget = $row['budget'];
            $deadline = $row['deadline'];
            $inspirationimg1 = $row['inspirationimg1'];
            $inspirationimg2 = $row['inspirationimg2'];
            $inspirationimg3 = $row['inspirationimg3'];
            // User details
            $userid = $row['clientid'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $profilepic = $row['profilepic'];
        }
        if ($specialismdesc = 'Websites') {
            $specialismdesc = 'Website';

         } else if ($specialismdesc = 'Mobile apps') {
             $specialismdesc = 'Mobile app';
         } else if ($specialismdesc = 'Tablet apps') {
            $specialismdesc = 'Tablet app';
         }

    } else {

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php'); ?>
    <title><?php echo($firstname); ?> | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
<?php require_once('elements/nav.php'); ?>
<header class="header background-gradient">
    <section class="header--small wrapper">
        <a class="header--small__link" href="javascript:history.back()"><span class="icon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</a>
    </section>
</header>
<section class="soft-box soft-box--padded wrapper main flex-grid">
    <article class="grid-3-2">
        <h3 class="grid__row"><?php echo($specialismdesc);?> project</h3>
        <h2 class="grid__row"><?php echo($projectname); ?></h2>
        <p class="grid__row"><?php echo($projectdescription); ?></p>
        <h3 class="grid__row">Inspiration images</h3>
        <article class="grid__row">
            <img class="grid__row-image" src="<?php echo('img/projects/' . $inspirationimg1); ?>" alt="Project Inspiration Image 1"><img class="grid__row-image" src="<?php echo('img/projects/' . $inspirationimg2); ?>" alt="Project Inspiration Image 2"><img class="grid__row-image" src="<?php echo('img/projects/' . $inspirationimg3); ?>" alt="Project Inspiration Image 3">
        </article>
        <form action="scripts/project-show-interest.php" method="get" class="grid__row">
            <!-- PREPARING VARIABLES FOR MESSAGE -->
            <input type="hidden" name="projectid" value="<?php echo($projectid);?>">
            <input type="hidden" name="projectname" value="<?php echo($projectname);?>">
            <input type="hidden" name="clientid" value="<?php echo($userid); ?>">
            <input type="hidden" name="full-name" value="<?php echo($firstname . ' ' . $lastname);?>">
            <input class="button button--primary-green" type="submit" name="" value="Show interest">
        </form>
    </article>
    <aside class="grid-3-1">
        <article class="grid__row">
            <h3>Client</h3>
            <a href="profile.php?userid=<?php echo($userid);?>">
                <img class="nav__user-profile" src="img/profile-pics/<?php echo($profilepic); ?>" alt="Profile picture">
                <p class="user-profile-name"><?php echo($firstname . ' ' . $lastname);?></p>
            </a>
        </article>
        <article class="grid__row">
            <h3>Deadline</h3>
            <p><?php echo($deadline);?></p>
        </article>
        <article class="grid__row">
            <h3>Budget</h3>
            <p><?php echo('£' . $budget); ?></p><br>
            <a class="text-link" href="find-projects.php?specialismid=<?php echo($specialismid);?>"><?php echo('More ' . $specialismdesc . ' projects');?></a>
        </article>
    </aside>
</section>
<?php require_once('elements/footer--big.php'); ?>
</body>
</html>
