<?php
    $profilePicURL = $_SESSION['profilePicURL'];

    if (isset($_SESSION['signedIn'])){
        // User signed in
        if ($_SESSION['userType'] == 1){
            // Admin user
            $nav = <<<CONTENT

            <ul class="nav__item-list">
                <li class="nav__item"><a href="">How it works</a></li>
                <li class="nav__item"><a href="">Find nerds</a></li>
                <li class="nav__item"><a href="">Find projects</a></li>
                <li class="nav__item"><a href="">Go premium</a></li>
                <li class="nav__item"><a href="">Meetups</a></li>
                <li class="nav__item"><a href="">Forum</a></li>
            </ul>
            <span class="nav__icon nav__messages-icon icon-envelope"></span>
            <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
            <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>

CONTENT;
        } else if ($_SESSION['userType'] == 2){
            // Nerd user
            $nav = <<<CONTENT

            <ul class="nav__item-list">
                <li class="nav__item"><a href="">How it works</a></li>
                <li class="nav__item"><a href="">Find projects</a></li>
                <li class="nav__item"><a href="">Go premium</a></li>
                <li class="nav__item"><a href="">Meetups</a></li>
                <li class="nav__item"><a href="">Forum</a></li>
            </ul>
            <span class="nav__icon nav__messages-icon icon-envelope"></span>
            <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
            <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>

CONTENT;
        } else{
            // Client user
            $nav = <<<CONTENT

            <ul class="nav__item-list">
                <li class="nav__item"><a href="">How it works</a></li>
                <li class="nav__item"><a href="">Find nerds</a></li>
                <li class="nav__item"><a href="">Go premium</a></li>
                <li class="nav__item"><a href="">Meetups</a></li>
                <li class="nav__item"><a href="">Forum</a></li>
            </ul>
            <a class="button button--nav button--secondary-red" href="sign-in.php">New project</a>
            <span class="nav__icon nav__messages-icon icon-envelope"></span>
            <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
            <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>

CONTENT;
        }

    } else{
        // User not signed in, Show sign out navigation
        $nav = <<<CONTENT

        <ul class="nav__item-list">
            <li class="nav__item"><a href="">How it works</a></li>
            <li class="nav__item"><a href="">Find nerds</a></li>
            <li class="nav__item"><a href="">Go premium</a></li>
            <li class="nav__item"><a href="">Meetups</a></li>
            <li class="nav__item"><a href="">Forum</a></li>
        </ul>
        <a class="button button--nav button--secondary-red" href="sign-in.php">Sign in</a>

CONTENT;
    }
?>

<nav class="nav shadow--dark">
    <section class="grid-3 nav__wrapper">
        <div class="nerd-finder-logo" ><?php echo file_get_contents("img/Nerd-Finder-Logo.svg"); ?></div>
        <?php echo($nav);?>
    </section>
</nav>