<?php
/* CREATED BY JOE */
require_once('scripts/session-save-path.php');
require_once('set-environment.php');
require_once('database-connection.php');

$nerdsql = "SELECT * 
            FROM nf_users INNER JOIN nf_specialismtypes
            ON nf_users.specialismid = nf_specialismtypes.specialismid
            WHERE usertypeid = 2";

$nerdResult = $conn->query($nerdsql);

$nerds = "";

if ($nerdResult->num_rows > 0) {
    // output data of each row
    while($row = $nerdResult->fetch_assoc()) {

        $userid = $row["userid"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $specialismdesc = $row["specialismdesc"];
        $profilepic = $row["profilepic"];
        $exp = $row["experience"];
        $hourlyrate = $row["hourlyrate"];
        $portfolioImg1 = $row["portfolioimg1"];
        $portfolioImg2 = $row["portfolioimg2"];
        $portfolioImg3 = $row["portfolioimg3"];

        $hourlyrate = substr($hourlyrate, 0, 2);

        $nerds .= <<<NERDS

        <a href="profile.php?userid=$userid" class="user-box shadow--light">
            <article>
                <section>
                    <img class="user-box__pic" src="img/portfolios/$portfolioImg1" alt="Portfolio Image"><!--
                    --><img class="user-box__pic" src="img/portfolios/$portfolioImg2" alt="Portfolio Image"><!--
                    --><img class="user-box__pic" src="img/portfolios/$portfolioImg3" alt="Portfolio Image">
                </section>
                <section class="user-box__wrapper">
                    <article>
                        <img class="user-box__profilepic" src="img/profile-pics/$profilepic" alt="User Box Picture">
                        <h3 class="user-box__name">$firstname $lastname</h3>
                    </article>
                    <p class="user-box__experience"> $specialismdesc <br> $exp years experience</p><!--
                    --><h2 class="user-box__rate">£$hourlyrate/ph</h2>
                </section>
            </article>
        </a>
NERDS;

    }
} else {
    echo "This isn't the Nerd you are looking for";
}

$conn->close();


