<?php
    /* CREATED BY HARRY */

    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Emptying current session
    session_unset();
    // Destroying current session
    session_destroy();

    /*----------------------------------------------------
    STARTING A NEW SESSION
    ----------------------------------------------------*/

    // Starting a new session
    session_start();
    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    /*----------------------------------------------------
    RETRIVING AND VALIDATING SIGN IN DATA
    ----------------------------------------------------*/

    // Retriving data from form fields
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
    // Sanitising data but not encoding quotes
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    // Escaping <,>,& and all ASCII characters with a value below 32
    $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
    // Trimming data to remove and white/ empty space
    $username = trim($username);
    $password = trim($password);
    // Any data left by this point will not be harmful to the database

    /*----------------------------------------------------
    APPLYING SIGN IN FORM ENTRIES TO DATABASE
    ----------------------------------------------------*/

    $signInSQL = "SELECT userpassword, userid, usertypeid, profilepic, firstname FROM nf_users WHERE username = ?";
    // Preparing the SQL statement and DB connection for querying
    $stmt = mysqli_prepare($conn, $signInSQL);
    // Error checking
    if (!$stmt) {
        echo("<p><b>Mysqli error: <b>".mysqli_error($conn)."</p>\n");
    }
    // Binding SQL query and database connection to the entered username parameters (string datatype)
    mysqli_stmt_bind_param($stmt, "s", $username);
    // Error checking
    if (!mysqli_execute($stmt)) {
        echo("<p><b>SQL error: <b>".mysqli_stmt_error($stmt)."</p>\n");
    }
    // Executing the preapred statement with the entered form data
    mysqli_stmt_execute($stmt);
    // Putting the results of the executed prepared statement into a variable for usage
    mysqli_stmt_bind_result($stmt, $hashedPassword, $userid, $usertypeid, $profilepic, $firstname);
    // Checking results

    /*----------------------------------------------------
    USING STMT RESULTS TO SIGN USER IN (OR NOT)
    ----------------------------------------------------*/

    if (mysqli_stmt_fetch($stmt)){
        // Username is correct
        if (password_verify($password, $hashedPassword)){
            // Sign in details correct
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['signedIn'] = true;
            $_SESSION['errorMessage'] = '';
            $_SESSION['userid'] = $userid;
            $_SESSION['profilePicURL'] = $profilepic;
            $_SESSION['firstName'] = $firstname;
            // Checking User Type
            if ($usertypeid == 1) {
                // Admin user
                $_SESSION['userType'] = 1;

            } else if($usertypeid == 2){
                // Nerd user
                $_SESSION['userType'] = 2;
            } else{
                // Client user
                $_SESSION['userType'] = 3;
            }
            // Redirecting user back to homepage as signed in
            header('Location: ../profile.php?userid=' . $userid);

        } else{
            // Username correct but password incorrect
            $_SESSION['username'] = $username;
            $_SESSION['errorMessage'] = 'Incorrect password';
            // PASSWORD HINT
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } 

    } else{
        // Username not correct
        $_SESSION['errorMessage'] = 'Incorrect username';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /*----------------------------------------------------
    CLOSING SQL STATEMENT AND DB CONNECTION
    ----------------------------------------------------*/

    mysqli_stmt_close($stmt);
    // Closing database connection to save requests to and from database
    mysqli_close($conn);
?>
