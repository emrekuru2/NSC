<?php
    RestrictIncludes();
    function RestrictIncludes() {
        // If accessing file through URL, redirect
        if(preg_match("/includes/", $_SERVER["PHP_SELF"]) == 1) {
            header("Location: ../../index.php");
            die();
        }
    }

    /*
    - Adpated from: https://www.vultr.com/docs/implement-role-based-access-control-with-php-and-mysql-on-ubuntu-20-04-server/
    */
    function checkPermissions($user_id, $permission_id) { 

        include_once "../../db/database.php";
        include_once "../../db/dbFunctions.php";

        $pdo = OpenCon();     

        try {

            $sql  = 'SELECT nsca_roletype.RoleID, nsca_roletype.Name FROM `nsca_user` LEFT JOIN nsca_roletype ON nsca_user.UserRole = nsca_roletype.RoleID WHERE nsca_user.UserID = 1';
             $data = [
                     'RoleID'       => $role_id,
                     'Name' => $role_name
                     ];  

             $stmt = $pdo->prepare($sql);
             $stmt->execute($data);
             $row  = $stmt->fetch();

             $authorized = ''; 

             if ($role_name == 'Guest User') {
                 $authorized = "true";
             } else {
                 $authorized = "false";
             }

             return $authorized;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
}


    ?>