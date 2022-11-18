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
            if(!($role == "Admin" || $role == "Manager")) {
                RedirectToIndex();
                die();
            }
            else {
                if(isset($_GET['len'])) {
                    $lstLength = $_GET['len'];
                    if($lstLength <50) {
                        $pdo = OpenCon();
                        if(isset($_GET['u'])) {
                            $lstPlayerStr = $_GET['u'];
                            $lstPlayers = explode("-", $lstPlayerStr);
                            $strIds = "";
                            for($i = 0; $i < count($lstPlayers); $i++) {
                                $strIds .= $lstPlayers[$i];
                                if($i != count($lstPlayers)-1) {
                                    $strIds .= ",";
                                }
                            }

                            // Change waiting to list, default team 1
                            $sql  = "UPDATE nsca_teamuser SET TeamID=1, waitingToJoin=1 WHERE UserID IN ($strIds)";
 
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            echo "<p class='alert-success'>Success!</p>";
                        }
                        elseif(isset($_GET['m'])) {
                            $lstPlayerStr = $_GET['m'];
                            $lstPlayers = (array) explode("-", $lstPlayerStr);
                            $teamName = isset($_GET['t']) ? $_GET['t'] : -1;
                            $teamID = -1;
                            $sql  = "SELECT nsca_team.TeamID FROM nsca_team WHERE nsca_team.TeamName='$teamName'";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while($row  = mysqli_fetch_assoc($result)) {
                                $teamID = $row['TeamID'];
                            }

                            if ($teamID > 0 ) {
                            // Change waiting to list, default team 1
                            $strIds = "";
                            for($i = 0; $i < count($lstPlayers); $i++) {
                                $strIds .= $lstPlayers[$i];
                                if($i != count($lstPlayers)-1) {
                                    $strIds .= ",";
                                }
                            }

                            $sql  = "UPDATE nsca_teamuser SET TeamID=$teamID, waitingToJoin=0 WHERE UserID IN ($strIds)";
 
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            echo "<p class='alert-success'>Success!</p>";
                            }
                        }
                        $stmt->close(); 
                    }
                    
                } elseif(isset($_GET['str'])) {
                    
                }
            }
                          
        }
    }
?>