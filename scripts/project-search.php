<?php
require_once('database-connection.php');

$sql = "SELECT * 
            FROM nf_projects 
            WHERE nerdid = NULL";

$result = $conn->query($sql);

$projects = "";