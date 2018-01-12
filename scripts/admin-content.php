<?php
    /*--------------------------
    OVERVIEW
    --------------------------*/

    $totalNerds = "SELECT COUNT(*) FROM nf_users WHERE usertypeid = 2";
    $totalClients = "SELECT COUNT(*) FROM nf_users WHERE usertypeid = 3";
    $totalProjects = "SELECT COUNT(*) FROM nf_projects";
    $projectsNeedingNerds = "SELECT COUNT(*) FROM nf_projects WHERE nerdid IS NULL";
    $projectsWithNerds = "SELECT COUNT(*) FROM nf_projects WHERE nerdid IS NOT NULL";

    /*--------------------------
    TECHNICAL UPDATES
    --------------------------*/

    $techIssues = "SELECT issuedescription FROM nf_techissues ORDER BY issuesent";

    /*--------------------------
    NEW PROJECTS REQUESTS
    --------------------------*/

    $unapprovedProjects = "SELECT projectname, firstname, lastname, posted, approved 
                           FROM nf_projects INNER JOIN nf_users
                           ON (nf_projects.nerdid = nf_users.userid)
                           WHERE approved = 0
                           ORDER BY posted";

    /*--------------------------
    NEW COMMENTS
    --------------------------*/

    $unaprovedComments = "SELECT commentcontent, firstname, lastname, approved
                          FROM nf_comments INNER JOIN nf_users
                          ON (nf_projects.userid = nf_users.userid)
                          WHERE approved = 0
                          ORDER BY posted";


?>