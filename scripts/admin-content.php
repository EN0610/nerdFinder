<?php
    
    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

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
        $techIssues = '<table><tr><td>No issues</td></tr></table>';
    }

    /*--------------------------
    NEW PROJECTS REQUESTS
    --------------------------*/

    $unapprovedProjects = "SELECT projectid, projectname, firstname, lastname, posted, approved 
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
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $posted = $row['posted'];

            $projects .= <<<CONTENT

            <table class="stats">
                <tr>
                    <td><a class="text-link" href="project.php?projectid=$projectid" target="_blank">$projectname</a></td>
                    <td><a class="icon-close project-reject-icon" href="scripts/reject-project-process.php"></a>&nbsp;&nbsp;<a class="icon-check project-approve-icon" href="scripts/approve-project-process.php"></a></td>
                </tr>
                <tr>
                    <td class="stats__small-text">By $firstname $lastname &nbsp;&nbsp;&nbsp;&nbsp; Posted: $posted</td>
                    <td></td>
                </tr>
            </table>
            <hr>
CONTENT;

        }

    } else{
        // No projects awaiting approval
        $projects = '<table><tr><td>No projects awaiting approval</td></tr></table>';
    }

    /*--------------------------
    NEW COMMENT MODERATION
    --------------------------*/

    $unaprovedComments = "SELECT commentcontent, postid, approved
                          FROM nf_comments INNER JOIN nf_users
                          ON (nf_comments.userid = nf_users.userid)
                          WHERE approved = 0
                          ORDER BY posted";

    $unaprovedCommentsResults = mysqli_query($conn, $unaprovedComments) or die (mysqli_error($conn));

    $comments = '';

    if (mysqli_num_rows($unaprovedCommentsResults) > 0){

        while ($row = mysqli_fetch_assoc($unaprovedCommentsResults)) {

            $commentcontent = $row['commentcontent'];
            $postid = $row['postid'];

            $comments .= <<<CONTENT

            <table class="stats">
                <tr>
                    <td class="stats__small-text">"$commentcontent"<br><br><a class="text-link" href="forum-post.php?postid=$postid" target="_blank">View post</a></td>
                    <td><a class="icon-close project-reject-icon" href="scripts/reject-comment-process.php"></a>&nbsp;&nbsp;<a class="icon-check project-approve-icon" href="scripts/approve-comment-process.php"></a></td>
                </tr>
            </table>
            <hr>
CONTENT;

        }

    } else{
        //
        $comments = '<table><tr><td>No comments awaiting moderation</td></tr></table>';
    }

    mysqli_close($conn);

?>