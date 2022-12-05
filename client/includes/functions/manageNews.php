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
                            $lstNewsStr = $_GET['d'];
                            $lstNews = explode("-", $lstNewsStr);
                            $strIds = "";
                            for($i = 0; $i < count($lstNews); $i++) {
                                $strIds .= $lstNews[$i];
                                if($i != count($lstNews)-1) {
                                    $strIds .= ",";
                                }
                            }

                            $sqlLstFolderPaths = "SELECT Pictures FROM nsca_news WHERE NewsID IN ($strIds)";
                            
                            $stmt = $pdo->prepare($sqlLstFolderPaths);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($path);
                            
                            if($stmt->num_rows > 0) {
                                while($stmt->fetch()) {
                                    if (is_dir("../../".$path) === true) {
                                        rrmdir("../../".$path);
                                    }
                                }
                            }

                            $stmt->close();

                            // Change waiting to list, default team 1
                            $sql  = "DELETE FROM nsca_news WHERE NewsID IN ($strIds)";
 
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

    function rrmdir($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    rrmdir($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }
?>