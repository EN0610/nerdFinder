<?php
	/* CREATED BY HARRY */

	// Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    if(isset($_SESSION['admin-message-userid1']) && isset($_SESSION['admin-message-userid2'])){
        //
        $userid1 = $_SESSION['admin-message-userid1'];
        $userid2 = $_SESSION['admin-message-userid2'];
    } else{
        //
        $pageContent = '<h2 class="light-grey-text">Select 2 users to check messages between them</h2>';
    }

    /*----------------------------------------------------
    POPULATING THE DROP DOWNS
    ----------------------------------------------------*/
    $dropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users ORDER BY firstname";
    $dropdownSqlResults = mysqli_query($conn, $dropdownSQL) or die (mysqli_error($conn));
    $usersDropDown1 = '';
    $usersDropDown2 = '';

    if (mysqli_num_rows($dropdownSqlResults) > 0){
        // At least one row of technical issues
        while ($row = mysqli_fetch_assoc($dropdownSqlResults)) {
            // 
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            // 
            if ($userid == $userid1) {
                // Messages shown are for user in current iteration
                $usersDropDown .= "<option value='$userid' selected>$firstname $lastname ($username)</option>";
            } else if ($userid == $user){
                // Messages shown aren't for current user
                $usersDropDown .= "<option value='$userid'>$firstname $lastname ($username)</option>";
            }
            
        }
    }

    /*----------------------------------------------------
    DISPLAYING MESSAGES
    ----------------------------------------------------*/
    if(isset($_SESSION['admin-message-userid1']) && isset($_SESSION['admin-message-userid2'])){
        // Message info exists in SessionData
        $userid1 = $_SESSION['admin-message-userid1'];
        $userid2 = $_SESSION['admin-message-userid2'];
        
        if ($userid1 == $userid2) {
            // Sender and reciever are the same user
            $pageContent = '<h2>Sender a reciever are same user</h2>';
        }
        // 
        $messagesSQL = "SELECT messagecontent, messagesent, firstname, lastname, username, senderid, recieverid
                        FROM nf_messages INNER JOIN nf_users ON (nf_messages.senderid = nf_users.userid)
                        WHERE senderid = $userid1 OR recieverid = $userid2 OR senderid = $userid2 OR recieverid = $userid1
                        ORDER BY messagesent";
        // 
        $messagesdropdownSQLResults = mysqli_query($conn, $messagesSQL) or die (mysqli_error($conn));

        if (mysqli_num_rows($messagesdropdownSQLResults) > 0){

            while ($row = mysqli_fetch_assoc($messagesdropdownSQLResults)) {
                // 
                $messagecontent = $row['messagecontent'];
                $recieverid = $row['recieverid'];
                $senderid = $row['senderid'];

                if ($userid1 == $senderid) {
                    // User 1 is sender
                    $pageContent .= '<p class="user-message user-message__sent">' . $messagecontent . '</p>';

                } else if ($userid1 == $recieverid) {
                    // User 2 is sender
                    $pageContent .= '<p class="user-message user-message__recieved">' . $messagecontent . '</p>';
                }

            }

        }

    } else{
        // View messages button not yet pressed (no results)
        $pageContent = '<h2 class="light-grey-text">Select 2 users to check messages between them</h2>';
    }

?>