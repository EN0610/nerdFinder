<?php
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // get the relevant script
    require_once('scripts/Show-forum.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php');?>
    <title>| Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/event.css">
</head>
<body>
<?php require_once('elements/nav.php'); ?>
        <header class="background-gradient">

    <article class="wrapper">
        <h1>Forum</h1>
    </article>
    </header>

      <?php echo($posts);?>

    <?php if (isset($_SESSION['userType']) && ($_SESSION['userType'] = 1)){
        //checking from the session, what usertype is and only displaying for 1 (admin)
    ?>
    <section class = "soft-box soft-box--padded wrapper-forum main">
      <form class="flex-grid full-width-form" action="scripts/add-forum-post.php" method="post">
        <input class="full-width-form__field" type="text" name="postcontent" required placeholder="text"><br><br>
        <input  class="full-width-form__field" type="date" name="posted" required placeholder="date"><br><br>
        <input class="button button--primary-green center-button" type="submit" name="insert" value="Add Data To Database">
      </form>
    </section>

    <?php
        }
        else{
            // For all users not signed in as the admin, this message will be displayed
            echo('Not signed in to create q');
          }
    ?>

    <?php require_once('elements/footer--big.php');?>
</body>
</html>
