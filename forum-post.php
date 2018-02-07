<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();

    require_once('scripts/show-forum-post.php');
    require_once('scripts/add-forum-comments.php');

    $postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>| Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php require_once('elements/nav.php'); ?>

    <header class="background-gradient">

    <h1>  <?php
      echo ($postcontent);
      ?>
    </h1>

  </header>

  <section class="wrapper flex-grid">
      <section class="sidebar grid-3-1--small soft-box--padded">
        <h2>Add Comments</h2>
      <form class="flex-grid full-width-form" action="scripts/add-forum-comments.php" method="post">

      <input class="full-width-form__field" type="text" name="commentcontent" required placeholder="Comment"><br><br>
      <input type="hidden" value="<?php echo($postid);?>" name="postid">
      <input  class="full-width-form__field" type="hidden" name="posted" value="<?php echo($currentTime);?>" required placeholder="Date"><br><br>

      <input class="button button--primary-green center-button" type="submit" name="insert" value="Add Comment">
      </form>
      </section>
      <section class="grid-3-2--small">
  <?php
      echo ($post);
      ?>
    </section>
    <?php require_once('elements/footer--big.php'); ?>
</body>
</html>
