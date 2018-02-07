<?php
    /* CREATED BY HARRY */

    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

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
        $userFirstname = $_SESSION['firstName'];
    } else{
        $userFirstname = '';
    }

    /*--------------------------
    OVERVIEW
    --------------------------*/

    // Total Nerds Calculation
    $totalNerds = "SELECT COUNT(*) FROM nf_users WHERE usertypeid = 2";

    $NerdCalc = '';

    if($result = mysqli_query($conn, $totalNerds)){
        while($row = mysqli_fetch_assoc($result)){
            // Count Nerds
            $NerdCalc = $row['COUNT(*)'];
        }
    }

    // Total Clients Calculation
    $totalClients = "SELECT COUNT(*) FROM nf_users WHERE usertypeid = 3";

    $clientCalc = '';

    if($result = mysqli_query($conn, $totalClients)){
        while($row = mysqli_fetch_assoc($result)){
            // Count Clients
            $clientCalc = $row['COUNT(*)'];
        }
    }

    // Total Project Calculation
    $totalProjects = "SELECT COUNT(*) FROM nf_projects";

    $projectCalc = '';

    if($result = mysqli_query($conn, $totalProjects)){
        while($row = mysqli_fetch_assoc($result)){
            // Count Projects
            $projectCalc = $row['COUNT(*)'];
        }
    }

    // Projects with Nerds
    $projectsWithNerds = "SELECT COUNT(*) FROM nf_projects WHERE nerdid IS NOT NULL";

    $projectWithNerdCalc = '';

    if($result = mysqli_query($conn, $projectsWithNerds)){
        while($row = mysqli_fetch_assoc($result)){
            // Count Projects
            $projectWithNerdCalc = $row['COUNT(*)'];
        }
    }

    // Projects Needing Nerds
    $projectsNeedingNerds = "SELECT COUNT(*) FROM nf_projects WHERE nerdid IS NULL";

    $projectNoNerdCalc = '';

    if($result = mysqli_query($conn, $projectsNeedingNerds)){
        while($row = mysqli_fetch_assoc($result)){
            // Count Projects
            $projectNoNerdCalc = $row['COUNT(*)'];
        }
    }

    /*--------------------------
    TECHNICAL UPDATES
    --------------------------*/

    $techIssuesSQL = "SELECT issuedescription FROM nf_techissues ORDER BY issuesent";
    $techIssueResults = mysqli_query($conn, $techIssuesSQL) or die (mysqli_error($conn));

    $techIssues = '';

    if (mysqli_num_rows($techIssueResults) > 0){
        // At least one row of technical issues
        while ($row = mysqli_fetch_assoc($techIssueResults)) {

            $issuedescription = $row['issuedescription'];
            // For every issue in the database add th relevant HTML to a variable, which, will be echoed onto the page
            $techIssues .= <<<CONTENT

            <table>
                <tr>
                    <td><span class="icon-exclamation tech-issue__icon"></span></td>
                    <td class="tech-issue">$issuedescription.<br> (Tel: 0191 232 6002)</td>
                </tr>
            </table>

CONTENT;
        }

    } else{
        // No technical issues in the database
        $techIssues = '<table class="moderation-empty"><tr><td>No issues to report</td></tr></table>';
    }

    /*--------------------------
    NEW PROJECTS REQUESTS
    --------------------------*/

    $unapprovedProjects = "SELECT *
                           FROM nf_projects INNER JOIN nf_users
                           ON (nf_projects.clientid = nf_users.userid)
                           WHERE approved = 0
                           ORDER BY posted";

    $unapprovedProjectsResults = mysqli_query($conn, $unapprovedProjects) or die (mysqli_error($conn));

    $projects = '';

    if (mysqli_num_rows($unapprovedProjectsResults) > 0){
        // At least 1 project awaiting approval
        while ($row = mysqli_fetch_assoc($unapprovedProjectsResults)) {

            $projectid = $row['projectid'];
            $projectname = $row['projectname'];
            $clientid = $row['clientid'];
            $clientusername = $row['username'];
            $posted = $row['posted'];

            $projects .= <<<CONTENT

            <table class="stats">
                <tr>
                    <td>
                        <a class="text-link" href="project.php?projectid=$projectid" target="_blank">$projectname</a>
                    </td>
                    <td>
                        <form id="project-reject-$projectid" class="approval-control" action="scripts/reject-project-process.php" method="post">
                            <input type="hidden" name="projectname" value="$projectname">
                            <input type="hidden" name="clientid" value="$clientid">
                            <input type="hidden" name="projectid" value="$projectid">
                            <a class="icon-close reject-icon" onclick="document.getElementById('project-reject-$projectid').submit();"></a>
                        </form>&nbsp;
                        <form id="project-approval-$projectid" class="approval-control" action="scripts/approve-project-process.php" method="post">
                            <input type="hidden" name="projectname" value="$projectname">
                            <input type="hidden" name="clientid" value="$clientid">
                            <input type="hidden" name="projectid" value="$projectid">
                            <a class="icon-check approve-icon" onclick="document.getElementById('project-approval-$projectid').submit();"></a>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="stats__small-text">
                        By $clientusername &nbsp;&nbsp;&nbsp;&nbsp; Posted: $posted
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr>
CONTENT;

        }

    } else{
        // No projects awaiting approval
        $projects = '<table class="moderation-empty"><tr><td>No projects awaiting approval</td></tr></table>';
    }

    /*--------------------------
    USER RESTRICTION
    --------------------------*/

    $userDropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users ORDER BY firstname";
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

    /*--------------------------
    NEW COMMENT MODERATION
    --------------------------*/

    $unaprovedComments = "SELECT *
                          FROM nf_comments INNER JOIN nf_users
                          ON (nf_comments.userid = nf_users.userid)
                          WHERE approved = 0
                          ORDER BY posted";

    $unaprovedCommentsResults = mysqli_query($conn, $unaprovedComments) or die (mysqli_error($conn));

    $comments = '';

    if (mysqli_num_rows($unaprovedCommentsResults) > 0){

        while ($row = mysqli_fetch_assoc($unaprovedCommentsResults)) {

            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $commentid = $row['commentid'];
            $commentcontent = $row['commentcontent'];
            $postid = $row['postid'];
            $userid = $row['userid'];

            $comments .= <<<CONTENT

            <table class="stats">
                <tr>
                    <td class="stats__small-text">
                        <p class="admin-interface__text">"$commentcontent"</p>
                        <br>
                        <a class="text-link" href="forum-post.php?postid=$postid" target="_blank">
                        View comment by $username </a>
                    </td>
                    <td>
                        <form id="comment-reject-$commentid" class="approval-control" action="scripts/reject-comment-process.php" method="post">
                            <input type="hidden" name="commentid" value="$commentid">
                            <input type="hidden" name="userid" value="$userid">
                            <input type="hidden" name="commentcontent" value="$commentcontent">
                            <a class="icon-close reject-icon" onclick="document.getElementById('comment-reject-$commentid').submit();"></a>
                        </form>&nbsp;
                        <form id="comment-approval-$commentid" class="approval-control" action="scripts/approve-comment-process.php" method="post">
                            <input type="hidden" name="commentid" value="$commentid">
                            <input type="hidden" name="userid" value="$userid">
                            <input type="hidden" name="commentcontent" value="$commentcontent">
                            <a class="icon-check approve-icon" onclick="document.getElementById('comment-approval-$commentid').submit();"></a>
                        </form>
                    </td>
                </tr>
            </table>
            <hr>
CONTENT;

        }

    } else{
        //
        $comments = '<table class="moderation-empty"><tr><td>No comments awaiting moderation</td></tr></table>';
    }

    /*--------------------------
    FORUM POSTS
    --------------------------*/

    $postsDropdownSQL = "SELECT postid, postcontent
                         FROM nf_posts
                         ORDER BY posttime DESC";
    $postsDropdownSQLResults = mysqli_query($conn, $postsDropdownSQL) or die (mysqli_error($conn));
    $postsDropdown = '';

    if (mysqli_num_rows($postsDropdownSQLResults) > 0){
        // At least one row
        while ($row = mysqli_fetch_assoc($postsDropdownSQLResults)) {
            //
            $postid = $row['postid'];
            $postcontent = $row['postcontent'];

            $postsDropdown .= "<option value='$postid'>$postcontent</option>";
        }
    }
    /*--------------------------
    FEEDBACK MECHANISM
    --------------------------*/

    $feedback = '';

    if (isset($_SESSION['admin-feedback'], $_SESSION['feedback-message'])){

        if (($_SESSION['admin-feedback']) === 1){

            $message = $_SESSION['feedback-message'];
            // Positive Feedback
            $feedback = <<<CONTENT

            <aside class="feedback positive-feedback">
                <span class="icon-check feedback-icon"></span>
                <h5 class="feedback-message">$message</h5>
                <a href="scripts/close-admin-feedback-process.php">
                    <img class="icon-exit" src="img/icon-exit.svg" alt="close">
                </a>
            </aside>
CONTENT;

        } else if (($_SESSION['admin-feedback']) === 2){

            $message = $_SESSION['feedback-message'];
            // Negative Feedback
            $feedback = <<<CONTENT

            <aside class="feedback negative-feedback">
                <span class="icon-exclamation feedback-icon"></span>
                <h5 class="feedback-message">$message</h5>
                <a href="scripts/close-admin-feedback-process.php">
                    <img class="icon-exit" src="img/icon-exit.svg" alt="close">
                </a>
            </aside>
CONTENT;
        } else{

            // No Feeback
            $feedback = '';

        }
    }

    mysqli_close($conn);
