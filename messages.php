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
        <span class="button button--primary-green messages__button">New message</span>
        <div class="messages__grad"></div>
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
<div class="overlay hide"></div>
<section class="modal hide">
    <span class="icon-exit-dark">
        <?php echo file_get_contents("img/icon-exit-dark.svg"); ?>
    </span>
    <form class="modal__form" action="scripts/send-new-message-script.php" method="post">
        <h3 class="modal__form-heading">New Message</h3>
        <select name="recieverid">
            <optgroup label="Send a message to:">
                <?php echo($usersDropDown);?>
            </optgroup>
        </select><span class="icon-arrow-down select-icon select-icon--small"></span>
        <textarea class="full-width-form__field modal__form-message" name="message" placeholder="Message" rows="4"></textarea>
        <input class="button button--primary-green" type="submit" name="submit" value="Send">
    </form>
</section>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/messages.js"></script>
</body>
</html>