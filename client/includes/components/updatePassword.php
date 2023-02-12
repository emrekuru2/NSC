<?php
    session_start();

    define('_DEFVAR', 1);
    include_once "../../db/database.php";
    include_once "../../db/dbFunctions.php";
    include_once "../functions/security.php";


    // start connection to database
    $conn = OpenCon();

    if ( isset($_POST['resetPassword']) ) { 
            // get the password from the user
            $newPassword = sanitize($conn, $_POST['newPassword']);
            // get the confirm password from the user
            $confirmedPassword = sanitize($conn, $_POST['confirmedPassword']);
            // get the code from the user
            $code = sanitize($conn, $_POST['resetCode']);
            // compare the passwords
            if ($newPassword != $confirmedPassword) {
                header("location: ../../passwordReset.php?code=".$code."&error=true");
            }
            else{
                // check if password is valid
                if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $newPassword)){
                    // check if code exists in the database
                    $sql = "SELECT * FROM nsca_resetcodes WHERE code = '$code'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if($row==null){
                        echo "<br><p class='text-danger'>Invalid code</p>";
                    }else{
                        // get the user id from the code
                        $userID = $row['UserID'];
                        // hash the password
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        // create a prepared statement to update the password
                        $stmt = $conn->prepare("UPDATE NSCA_Login SET password = ? WHERE UserID = ?");
                        $stmt->bind_param("si", $hashedPassword, $userID);
                        // execute the statement
                        $stmt->execute();
                        $stmt->close();
                        // delete the code from the database
                        $stmt = $conn->prepare("DELETE FROM nsca_resetcodes WHERE UserID = ?");
                        $stmt->bind_param("i", $userID);
                        $stmt->execute();
                        $stmt->close();
                        // redirect to the login page
                        header("location: ../../loginform.php?reset=true");
                    }
                }
                else{
                    header("location: ../../passwordReset.php?code=".$code."&valid=true");
                }
        }

            // // create prepared statement to get the user id
            // $stmt = $conn->prepare("select * from NSCA_Login where email= ?");
            // $stmt->bind_param("s", $resetEmail);

            // // Execute And Get Results
            // $stmt->execute();
            // $result = mysqli_fetch_assoc($stmt->get_result());
            // $stmt->close();
            // // if the email is in the database
            // if ($result==null) {
            //     header("location: ../../forgotPassword.php?error=true");
            // }
            // // delete any previous reset codes for the user
            // $stmt = $conn->prepare("DELETE FROM nsca_resetcodes WHERE UserID = ?");
            // $stmt->bind_param("i", $result['UserID']);
            // $stmt->execute();
            // $stmt->close();
            
            // // generate a random code with 32 characters
            // $code = generateCode();
            // // create a prepared statement to insert the code into nsca_resetcodes
            // $stmt = $conn->prepare("INSERT INTO nsca_resetcodes (UserID, code) VALUES (?, ?)");
            // $stmt->bind_param("is", $result['UserID'], $code);
            // // execute the statement
            // $stmt->execute();
            // $stmt->close();
            // // send the email to the user
            // sendEmail($resetEmail, $code);
            // // redirect to the login page
            // header("location: ../../forgotPassword.php?reset=true");
    } 
    // Close connection
    mysqli_close($conn);

?>

