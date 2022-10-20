<?php
    // Prevent direct access
    RestrictIncludes();

    // Constants
    $_ADMIN_STR = 'Admin';

    function RedirectToIndex() {
        header("Location: ../index.php");
        die();
    }

    function DefineSecurity() {
        // Method suggested by https://stackoverflow.com/questions/409496/prevent-direct-access-to-a-php-include-file
        define('_DEFVAR', 1);
        //defined('_DEFVAR') or exit('Restricted Access');
    }

    function RestrictIncludes() {
        // If accessing file through URL, redirect
        if(preg_match("/includes/", $_SERVER["PHP_SELF"]) == 1 && !defined('_DEFVAR')){
            RedirectToIndex();
        }
    }

    function RestrictAdmin(string $userRole) {
        // If accessing file through URL, redirect
        if(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 1 && !defined('_DEFVAR')){
            RedirectToIndex();
        }

        // If the user role is not set => not logged in => redirect
        if(isset($userRole)) {
            // If the userRole is set and it is not admin => redirect
            if(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 1 && $userRole != 'Admin') {
                RedirectToIndex();
            }

        }
        else {
            RedirectToIndex();
        }
    }

    /*
    - Adpated from: https://www.vultr.com/docs/implement-role-based-access-control-with-php-and-mysql-on-ubuntu-20-04-server/
    */
    function CheckRole($session_user_id) {

        $pdo = OpenCon();     

        try {
            // Verifying that it is the same user as the logged one
            if (isset($_SESSION['User_ID'])  && $session_user_id = $_SESSION['User_ID'] && $_SESSION['LoggedIn']) {
                // Retriving user role from the database
                $sql  = 'SELECT nsca_roletype.RoleID, nsca_roletype.Name FROM `nsca_user` LEFT JOIN nsca_roletype ON nsca_user.UserRole = nsca_roletype.RoleID WHERE nsca_user.UserID = '. $_SESSION['User_ID'] ;
 
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                
                while($row = mysqli_fetch_assoc($result)) {
                    $user_role = $row['Name'];
                }
                return $user_role;
            }
            else {
                // Not logget in
                header("Location: index.php");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    ?>