<?php
	/* CREATED BY HARRY */
    echo password_hash($password, PASSWORD_BCRYPT, array(
        'cost' => 11
    ));
?>