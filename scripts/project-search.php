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

        $projectid = $row["projectid"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $profilepic =$row["profilepic"];
        $projectname = $row["projectname"];
        $deadline = $row["deadline"];
        $budget = $row["budget"];
        $inspirationimg1 = $row["inspirationimg1"];
        $inspirationimg2 = $row["inspirationimg2"];
        $inspirationimg3 = $row["inspirationimg3"];


        $projects .=  <<<PROJECTS
            <a href="project.php?projectid=$projectid" class="user-box">
                <article>
                 <img class="user-box__pic" src="img/projects/$inspirationimg1" alt="Portfolio Image"><!--
                 --><img class="user-box__pic" src="img/projects/$inspirationimg2" alt="Portfolio Image"><!--
                 --><img class="user-box__pic" src="img/projects/$inspirationimg3" alt="Portfolio Image">
                 <section class="user-box__wrapper">
                     <h2 class="user-box__project-name">$projectname</h2>
                     <p class="user-box__details">$deadline &nbsp;&nbsp;&nbsp; Budget: £$budget</p>
                     <img class="user-box__profilepic" src="img/profile-pics/$profilepic" alt="User Box Picture">
                     <h3 class="user-box__name">$firstname $lastname</h3>
                 </section>
                </article>
            </a>
PROJECTS;
    }
} else {
    echo "Currently no projects on!";
}

$conn->close();