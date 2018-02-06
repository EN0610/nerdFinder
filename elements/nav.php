<?php
    if (isset($_SESSION['profilePicURL'])){
        $profilePicURL = $_SESSION['profilePicURL'];
    } else{
        $profilePicURL = '';
    }

    if (isset($_SESSION['signedIn'])){
        // User signed in
        if ($_SESSION['userType'] == 1){
            // Admin user
            $nav = <<<CONTENT

            <aside class="nav__admin">
                <a href="admin-dashboard.php" class="nav__admin-text">Admin interface</a>
            </aside>
            <ul class="nav__item-list">
                <li class="nav__item"><a href="find-nerds.php">Find nerds</a></li>
                <li class="nav__item"><a href="find-projects.php">Find projects</a></li>
                <li class="nav__item"><a href="meetups.php">Meetups</a></li>
                <li class="nav__item"><a href="forum.php">Forum</a></li>
            </ul>
            <span class="nav__icon icon-menu"></span>
            <a class="nav__icon nav__messages-icon icon-envelope" href="messages.php"></a>
            <section class="nav__user-area">
                <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="Profile picture">
                <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>
            </section>
            <section class="soft-box nav__drop-down shadow--dark hide">
                <ul>
                    <li><a class="nav__drop-down-list-item" href="admin-dashboard.php">Admin dashboard</a></li>
                    <li><a class="nav__drop-down-list-item" href="">Edit profile</a></li>
                    <li><a class="nav__drop-down-list-item" href="scripts/sign-out-process.php">Sign out</a></li>
                </ul>
            </section>

CONTENT;
        } else if ($_SESSION['userType'] == 2){
            // Nerd user
            $nav = <<<CONTENT

            <ul class="nav__item-list">
                <li class="nav__item"><a href="index.php#how-it-works">How it works</a></li>
                <li class="nav__item"><a href="find-projects.php">Find projects</a></li>
                <li class="nav__item"><a href="go-premium.php">Go premium</a></li>
                <li class="nav__item"><a href="meetups.php">Meetups</a></li>
                <li class="nav__item"><a href="forum.php">Forum</a></li>
            </ul>
            <span class="nav__icon icon-menu"></span>
            <a class="nav__icon nav__messages-icon icon-envelope" href="messages.php"></a>
            <section class="nav__user-area">
                <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
                <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>
            </section>
            <section class="soft-box nav__drop-down shadow--dark hide">
                <ul>
                    <li><a class="nav__drop-down-list-item" href="profile.php">View profile</a></li>
                    <li><a class="nav__drop-down-list-item" href="edit-profile.php">Edit profile</a></li>
                    <li><a class="nav__drop-down-list-item" href="scripts/sign-out-process.php">Sign out</a></li>
                </ul>
            </section>

CONTENT;
        } else {
            // Client user
            $nav = <<<CONTENT

            <ul class="nav__item-list">
                <li class="nav__item"><a href="index.php#how-it-works">How it works</a></li>
                <li class="nav__item"><a href="find-nerds.php">Find nerds</a></li>
                <li class="nav__item"><a href="go-premium.php">Go premium</a></li>
                <li class="nav__item"><a href="meetups.php">Meetups</a></li>
                <li class="nav__item"><a href="forum.php">Forum</a></li>
            </ul>
            <a class="button button--nav button--secondary-red nav__button" href="project-new.php">New project</a>
            <span class="nav__icon icon-menu"></span>
            <a class="nav__icon nav__messages-icon icon-envelope" href="messages.php"></a>
            <section class="nav__user-area">
                <img class="nav__user-profile" src="img/profile-pics/$profilePicURL" alt="User profile picture">
                <span class="nav__icon nav__drop-down-icon icon-arrow-down"></span>
            </section>
            <section class="soft-box nav__drop-down shadow--dark hide">
                <ul>
                    <li><a class="nav__drop-down-list-item" href="profile.php">View profile</a></li>
                    <li><a class="nav__drop-down-list-item" href="edit-profile.php">Edit profile</a></li>
                    <li><a class="nav__drop-down-list-item" href="scripts/sign-out-process.php">Sign out</a></li>
                </ul>
            </section>

CONTENT;
        }

    } else{
        // User not signed in, Show sign out navigation
        $nav = <<<CONTENT

        <ul class="nav__item-list">
            <li class="nav__item"><a href="index.php#how-it-works">How it works</a></li>
            <li class="nav__item"><a href="go-premium.php">Go premium</a></li>
            <li class="nav__item"><a href="meetups.php">Meetups</a></li>
            <li class="nav__item"><a href="forum.php">Forum</a></li>
        </ul>
        <span class="nav__icon icon-menu"></span>
        <a class="button button--nav button--secondary-red" href="sign-in.php">Sign in</a>

CONTENT;
    }
?>

<nav class="nav shadow--dark">
    <section class="nav__wrapper">
        <div class="nerd-finder-logo" ><a href="index.php"><span class="hide">Nerd Finder</span><?php echo file_get_contents("img/Nerd-Finder-Logo.svg"); ?></a></div>
        <?php echo($nav);?>
    </section>
</nav>