<?php
    // Setting the development enviroment to show errors
    require_once('scripts/show-messages.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('scripts/analytics-tracking.php'); ?>
    <title>Your Messages | Nerd Finder</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/messages.css">
</head>
<body>
<?php require_once('elements/nav.php'); ?>
<header class="header background-gradient">
    <section class="header--small wrapper">
        <a class="header--small__link" href="javascript:history.back()"><span class="icon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</a>
    </section>
</header>
<section class="wrapper--messages">
    <aside class="side-panel shadow--dark">
        <h1>Your messages</h1>
        <?php echo($conversations);?>
    </aside><!--
 --><section class="message-container">
        <article class="message-container__messages">
            <?php echo($messages);?>
        </article>
        <form action="scripts/send-message-script.php" method="post" class="message-container__form" id="send-message">
            <textarea class="message-container__textarea" placeholder="Type something" rows="2" name="message"></textarea><!--
         --><span class="icon-arrow-up-circle message-container__submit" onclick="document.getElementById('send-message').submit();"></span>
        </form>
    </section>
</section>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/messages.js"></script>
</body>
</html>