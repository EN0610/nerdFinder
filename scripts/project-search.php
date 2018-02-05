<?php
/* CREATED BY JOE */

require_once('database-connection.php');

$projectsql = "SELECT * 
            FROM nf_projects
            WHERE approved = 0";

$projectResult = $conn->query($projectsql);

$projects = "";

if ($projectResult->num_rows > 0) {
    // output data of each row
    while($row = $projectResult->fetch_assoc()) {

        $projectname = $row["projectname"];
        $projectdescription = $row["projectdescription"];
        $budget = $row["budget"];
        $inspirationimg1 = $row["inspirationimg1"];
        $inspirationimg2 = $row["inspirationimg2"];


        $projects .=  <<<PROJECTS
            <article class="user-box">
             <img class="user-box_pic" src="img/projects/$inspirationimg1" alt="Portfolio Image">
             <img class="user-box_pic" src="img/projects/$inspirationimg2" alt="Portfolio Image">
             <h2 class="user-box_name"> $projectname </h2>
             <p class="user-box_experience"> $projectdescription </p>
             <p class="user-box_hourlyrate"> £$budget </p>
             <div class="clearfix"></div>
            </article>
PROJECTS;
    }
} else {
    echo "Currently no projects on!";
}

$conn->close();