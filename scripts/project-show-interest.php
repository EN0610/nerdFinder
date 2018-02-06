<?php
	/* CREATED BY HARRY */

	// Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Setting the development enviroment to show errors
    require_once('scripts/set-environment.php');
    // Connecting to the Database
    require_once('scripts/database-connection.php');
    //
    
?>