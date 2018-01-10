<?php

    if (isset($_SESSION['signedIn'])){
        // User signed in
        $nav = '';

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
        <a class="button button--nav button--secondary-red" href="sign-in.php">SIGN IN</a>
CONTENT;
    }
?>

<nav class="nav shadow--dark">
    <section class="grid-3 nav__wrapper">
        <div class="nerd-finder-logo" ><?php echo file_get_contents("img/Nerd-Finder-Logo.svg"); ?></div>
        <?php echo($nav);?>
    </section>
</nav>