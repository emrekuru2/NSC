<?php
    session_start();
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once '../../../vendor/composer/src/Exception.php';
    require_once '../../../vendor/composer/src/Exception.php';
    require_once '../../../vendor/composer/src/PHPMailer.php';
    require_once '../../../vendor/composer/src/SMTP.php';
    require_once '../../../vendor/autoload.php';

    define('_DEFVAR', 1);
    include_once "../../db/database.php";
    include_once "../../db/dbFunctions.php";
    include_once "../functions/security.php";


    // start connection to database
    $conn = OpenCon();
    function sendEmail($email, $code){
        // Configuring email
        $mail = new PHPMailer(true);
        $mail->isSMTP(); // Remove line to view debug output
        $mail->Mailer = 'smtp';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 26;
        $mail->Host = "mail.cricketnovascotia.ca";
        $mail->Username = "testadmin@cricketnovascotia.ca";
        $mail->Password = "CricketNSCA";
        $mail->isHTML(true);

        $mail->Subject = "NSCA Password Reset";
        // set the from email
        $mail->SetFrom("testadmin@cricketnovascotia.ca", "Password Reset");
        // set the recipient email
        $mail->AddAddress($email);
        // create the body of the email
        $mail->Body = "Click the link below to reset your password: http://localhost/passwordReset.php?code=$code";
        // send the email
        $mail->Send();
    }
    function generateCode(){
        $length = 32;
        $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    if ( isset($_POST['submitReset']) ) { //reset password
            // get the email from the user
            $resetEmail = sanitize($conn, $_POST['resetEmail']); 
            // create prepared statement to get the user id
            $stmt = $conn->prepare("select * from NSCA_Login where email= ?");
            $stmt->bind_param("s", $resetEmail);

            // Execute And Get Results
            $stmt->execute();
            $result = mysqli_fetch_assoc($stmt->get_result());
            $stmt->close();
            // if the email is in the database
            if ($result==null) {
                header("location: ../../forgotPassword.php?error=true");
            }
            // delete any previous reset codes for the user
            $stmt = $conn->prepare("DELETE FROM nsca_resetcodes WHERE UserID = ?");
            $stmt->bind_param("i", $result['UserID']);
            $stmt->execute();
            $stmt->close();
            
            // generate a random code with 32 characters
            $code = generateCode();
            // create a prepared statement to insert the code into nsca_resetcodes
            $stmt = $conn->prepare("INSERT INTO nsca_resetcodes (UserID, code) VALUES (?, ?)");
            $stmt->bind_param("is", $result['UserID'], $code);
            // execute the statement
            $stmt->execute();
            $stmt->close();
            // send the email to the user
            sendEmail($resetEmail, $code);
            // redirect to the login page
            header("location: ../../forgotPassword.php?reset=true");
    } 
    // Close connection
    mysqli_close($conn);

?>

