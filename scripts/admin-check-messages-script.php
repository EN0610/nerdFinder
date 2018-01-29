<?php
	/* CREATED BY HARRY */

	// Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    /*----------------------------------------------------
    POPULATING THE DROP DOWNS
    ----------------------------------------------------*/
    $dropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users ORDER BY firstname";
    $sqlResults = mysqli_query($conn, $dropdownSQL) or die (mysqli_error($conn));
    $usersDropDown = '';

    if (mysqli_num_rows($sqlResults) > 0){
        // At least one row of technical issues
        while ($row = mysqli_fetch_assoc($sqlResults)) {
            //
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

            if(isset($_SESSION['admin-message-userid1']) && $_SESSION['admin-message-userid1'] === $userid){
                $usersDropDown .= "<option value='$userid' selected>$firstname $lastname ($username)</option>";
            } else{
                $usersDropDown .= "<option value='$userid'>$firstname $lastname ($username)</option>";
            }
            
        }
    }

    /*----------------------------------------------------
    PROCESSING THE CHOSEN DROP DOWN OPTIONS
    ----------------------------------------------------*/

    if(isset($_SESSION['admin-message-userid1']) && isset($_SESSION['admin-message-userid2'])){

        // Message info exists in SessionData
        $userid1 = $_SESSION['admin-message-userid1'];
        $userid2 = $_SESSION['admin-message-userid2'];
        //
        if ($userid1 === $userid2) {
            // Sender and reciever are the same user

        }

    } else{
        $userid1 = 6;
        $userid2 = 7;
    }

    $messagesSQL = "SELECT messagecontent, messagesent, firstname, lastname, username
                    FROM nf_messages INNER JOIN nf_users ON (nf_messages.senderid = nf_users.userid)
                    WHERE senderid = $userid1 OR recieverid = $userid2 OR senderid = $userid2 OR recieverid = $userid1
                    ORDER BY messagesent";

    $messagesSQLResults = mysqli_query($conn, $messagesSQL) or die (mysqli_error($conn));
    
    $messageContent = '';

    if (mysqli_num_rows($messagesSQLResults) > 0){
        while ($row = mysqli_fetch_assoc($messagesSQLResults)) {

            $messagecontent = $row['messagecontent'];

            $pageContent = <<<MESSAGES

            <p>$messagecontent</p>

MESSAGES;
        }

    } else{

        $pageContent = '';

    }
?>