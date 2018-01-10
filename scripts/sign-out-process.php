<?php
    /*----------------------------------------------------
    RESUMING CURRENT SESSION
    ----------------------------------------------------*/

    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();

    /*----------------------------------------------------
    END CURRENT SESSION & RETURN USER TO LAST DESTINATION
    ----------------------------------------------------*/

    // Emptying current session
    session_unset();
    // Destroying current session
    session_destroy();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>