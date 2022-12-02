<?php
    // Prevent direct access
    // Preventing unauthorized access
    if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' ) ) {
        $isAllowed = 1;
        
    }  else {
        header("Location: ../../index.php");
        die();
    }
    define('_DEFVAR', 1);
    include_once($_SERVER["DOCUMENT_ROOT"]."/db/database.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/db/dbFunctions.php");
    
    function CheckRole($user_id) {

        $pdo = OpenCon();     

        try {
            // Retriving user role from the database
            $sql  = 'SELECT nsca_roletype.RoleID, nsca_roletype.Name FROM `nsca_user` LEFT JOIN nsca_roletype ON nsca_user.UserRole = nsca_roletype.RoleID WHERE nsca_user.UserID = '.$user_id ;

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            
            while($row = mysqli_fetch_assoc($result)) {
                $user_role = $row['Name'];
            }
            return $user_role;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function RedirectToIndex() {
        header("Location: ../index.php");
        die();
    }

    if($isAllowed == 1) {
        
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $role = CheckRole($userId);
            if(!($role == "Admin")) {
                RedirectToIndex();
                die();
            }
            else {
                if(isset($_GET['len'])) {
                    $lstLength = $_GET['len'];
                    if($lstLength <50) {
                        $pdo = OpenCon();
                        if(isset($_GET['d'])) {
                            $lstPlayerStr = $_GET['d'];
                            $lstPlayers = explode("-", $lstPlayerStr);
                            $strIds = "";
                            for($i = 0; $i < count($lstPlayers); $i++) {
                                $strIds .= $lstPlayers[$i];
                                if($i != count($lstPlayers)-1) {
                                    $strIds .= ",";
                                }
                            }

                            // Change waiting to list, default team 1
                            $sql  = "DELETE FROM nsca_NEWS WHERE NewsID IN ($strIds)";
 
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            echo "<p class='alert-success'>Success!</p>";
                        }
                        $stmt->close(); 
                    }
                }
                          
            }
        }
    }
?>