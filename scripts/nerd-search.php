<?php
/* CREATED BY JOE */
require_once('scripts/session-save-path.php');
require_once('set-environment.php');
require_once('database-connection.php');

$nerdsql = "SELECT * 
            FROM nf_users 
            WHERE usertypeid = 2";

$nerdResult = $conn->query($nerdsql);

$nerds = "";

if ($nerdResult->num_rows > 0) {
    // output data of each row
    while($row = $nerdResult->fetch_assoc()) {

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $profilepic = $row["profilepic"];
        $exp = $row ["experience"];
        $hourlyrate = $row ["hourlyrate"];
        $portfolioimg1 = $row ["portfolioimg1"];

        $nerds .=  <<<NERDS
            <article class="user-box">
             <img class="user-box_pic1" src="img/portfolios/$portfolioimg1" alt="Portfolio Image">
             <img class="user-box_profilepic" src="img/profile-pics/$profilepic" alt="User Box Picture">
             <h2 class="user-box_name"> $firstname $lastname </h2>
             <p class="user-box_experience"> $exp years experience</p>
             <p class="user-box_hourlyrate"> £$hourlyrate/ph </p>
             <div class="clearfix"></div>
            </article>
NERDS;

    }
} else {
    echo "This isn't the Nerd you are looking for";
}

$conn->close();


