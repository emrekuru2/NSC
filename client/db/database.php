<?php

    function OpenCon() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "root";
        $db = "projectnsca";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
        return $conn;
    }

    function CloseCon($conn) {
        mysqli_close($conn);
    }