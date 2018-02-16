<?php
    	//database connection variables
	    $servername = "35.182.138.156";
        $username = "dbUser1";
        $password = "password";
        $dbname = "testDB1";

        //connection
        $db = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }  
?>