<?php
    // Prevent direct access
    include_once $_SERVER["DOCUMENT_ROOT"]."/includes/functions/security.php";
    RestrictIncludes();
    
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    
?>