<?php
/* CREATED BY JOE */

require_once('database-connection.php');

$projectsql = "SELECT * 
            FROM nf_projects  INNER JOIN nf_users
            ON nf_projects.clientid = nf_users.userid
            WHERE approved = 0";

$projectResult = $conn->query($projectsql);

$projects = "";

if ($projectResult->num_rows > 0) {
    // output data of each row
    while($row = $projectResult->fetch_assoc()) {

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $profilepic =$row["profilepic"];
        $projectid = $row["projectid"];
        $projectname = $row["projectname"];
        $projectdescription = $row["projectdescription"];
        $budget = $row["budget"];
        $inspirationimg1 = $row["inspirationimg1"];
        $inspirationimg2 = $row["inspirationimg2"];


        $projects .=  <<<PROJECTS
            <a href="project.php?projectid=$projectid">
                <article class="soft-box soft-box--padded forum-post">
                 <img class="project-box_pic" src="img/projects/$inspirationimg1" alt="Portfolio Image">
                 <img class="project-box_pic" src="img/projects/$inspirationimg2" alt="Portfolio Image">
                 <h2 class="project-box_name"> $projectname </h2>
                 <p class="project-box_experience"> $projectdescription </p>
                 <img class="user-box_profilepic" src="img/profile-pics/$profilepic" alt="User Box Picture">
                 <h2 class="user-box_name">$firstname $lastname</h2>
                 <p class="project-box_hourlyrate"> Budget: <br> £$budget </p>
                 <div class="clearfix"></div>
                </article>
            </a>
PROJECTS;
    }
} else {
    echo "Currently no projects on!";
}

$conn->close();