<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // get the relevant script
    require_once('scripts/show-forum.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>Forum | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>
    <header class="header background-gradient">
        <article class="wrapper">
            <h1>Forum</h1>
            <h4>Post questions and learn how to use Nerd Finder</h4>
        </article>
    </header>
    <section class="wrapper flex-grid">
        <section class="sidebar grid-3-1--small soft-box--padded">
            <h2>New post</h2>
            <form class="full-width-form" action="scripts/add-forum-post.php" method="post">
                <h3>In Topic</h3>
                <select class="full-width-form__field" name="forumid" required>
                    <optgroup label="Topics">
                        <option value="1">Tips &amp; Tricks</option>
                        <option value="2">Miscellaneous</option>
                        <option value="3">Frequently asked questions</option>
                        <option value="4">Service problems</option>
                    </optgroup>
                </select><span class="icon-arrow-down select-icon"></span>
                <textarea class="full-width-form__field new-post-content" name="postcontent" placeholder="What would you like to post?" required rows="3"></textarea>
                <input class="button button--primary-green" type="submit" value="Post in forum">
            </form>
        </section>
        <section class="grid-3-2--small">
            <?php echo($posts);?>
        </section>
    </section>
    <?php require_once('elements/footer--big.php');?>
</body>
</html>