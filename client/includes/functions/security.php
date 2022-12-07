<?php
    // Prevent direct access
    RestrictIncludes();

    // Constants
    const ADMIN_ACCESS_LVL = 0;
    const MANAGER_ACCESS_LVL = 1;
    const PLAYER_ACCESS_LVL = 2;
    const MINIMAL_ACCESS_LVL = 3;

    $_ADMIN_ACCESS_LST = array('Admin');
    $_MANAGER_ACCESS_LST = array_merge(array('Manager'), $_ADMIN_ACCESS_LST);
    $_PLAYER_ACCESS_LST =  array_merge(array('Player'), $_MANAGER_ACCESS_LST);
    $_MINIMAL_ACCESS_LST = array_merge(array('Guest User', 'Umpire'), $_PLAYER_ACCESS_LST);

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
        global $_ADMIN_ACCESS_LST;
        // If accessing file through URL, redirect
        if(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 1 && !defined('_DEFVAR')){
            RedirectToIndex();
        }

        // If the user role is not set => not logged in => redirect
        if(isset($userRole)) {
            // If the userRole is set and it is not admin => redirect
            if(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 1) {
                CheckRoleInArray($_ADMIN_ACCESS_LST,$userRole);
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

    function CheckRoleInArray($array, $user_role) {
        // If it is not in the list => redirect
        if (!in_array($user_role, $array,  true)) {
            RedirectToIndex();
            die();
        }
        return true;
    }

    // Redirects to index, if not logged in
    function CheckLoggedIn() {
        if(!isset($_SESSION['LoggedIn']) || $_SESSION['LoggedIn'] == false) { RedirectToIndex();}
    }

    /* Each page should provide a access lvl. If the user role is in the access lvl, then the page is loaded. Otherwise, 
        redirected to index. Admin has access to all levels.
    */
    function AccessControlBasedOnLevel($access_level, $session_user_id) {
      global $_ADMIN_ACCESS_LST, $_MANAGER_ACCESS_LST, $_PLAYER_ACCESS_LST, $_MINIMAL_ACCESS_LST;
        
       $user_role = CheckRole($session_user_id);

       if($access_level == ADMIN_ACCESS_LVL) {
        CheckRoleInArray($_ADMIN_ACCESS_LST, $user_role);
       }
       elseif($access_level == MANAGER_ACCESS_LVL) {
        CheckRoleInArray($_MANAGER_ACCESS_LST, $user_role);
       }
       elseif($access_level == PLAYER_ACCESS_LVL) {
        CheckRoleInArray($_PLAYER_ACCESS_LST, $user_role);
       }
       elseif($access_level == MINIMAL_ACCESS_LVL) {
        CheckRoleInArray($_MINIMAL_ACCESS_LST, $user_role);
       }

    }
    # Session Logout after in activity 
    function inactiveLogout(){ 
    $logLength = 1800; # time in seconds :: 1800 = 30 minutes 
    $ctime = strtotime("now"); # Create a time from a string 
    # If no session time is created, create one 
    if(!isset($_SESSION['sessionX'])){  
        # create session time 
        $_SESSION['sessionX'] = $ctime;  
    }else{ 
        # Check if they have exceded the time limit of inactivity 
        if(((strtotime("now") - $_SESSION['sessionX']) > $logLength) && checkLoggedIn()){ 
            # If exceded the time, log the user out 
            header("Location: ../logout.php");
            # Redirect to login page to log back in 
            exit; 
        }else{ 
            # If they have not exceded the time limit of inactivity, keep them logged in 
            $_SESSION['sessionX'] = $ctime; 
        } 
    } 
} 

?>