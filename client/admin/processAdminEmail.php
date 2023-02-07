<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../../vendor/composer/src/Exception.php';
    require_once '../../vendor/composer/src/PHPMailer.php';
    require_once '../../vendor/composer/src/SMTP.php';
    require_once '../../vendor/autoload.php';

    include_once "../includes/functions/security.php";
    DefineSecurity();
    include_once "../db/database.php";
    include_once "../db/dbFunctions.php";

    // Prevent direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    // Checking if form button was pressed
    if (isset($_REQUEST['submitEmail'])) { // Processing email
        // Reading email inputs
        $emailSubject = sanitizeData($_REQUEST['emailFormTitle']);
        $emailName = sanitizeData($_REQUEST['emailFormFullName']);
        $emailRecipients = sanitizeData($_REQUEST['emailFormEmail']);
        $emailBody = sanitizeData($_REQUEST['emailFormTextBox']);

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

        // Assigning subject
        $mail->Subject = $emailSubject;

        // Assigning name
        if ($emailName != "") {
            try {
                $mail->SetFrom("testadmin@cricketnovascotia.ca", $emailName);
            } catch (Exception $e) {
                header("Location: sendEmail.php?error=3");
            }
        } else {
            try {
                $mail->SetFrom("testadmin@cricketnovascotia.ca", "Test Admin");
            } catch (Exception $e) {
                header("Location: sendEmail.php?error=3");
            }
        }

        // Assigning recipients
        try {
            $mail->AddAddress($emailRecipients, "toAddress");
        } catch (Exception $e) {
            header("Location: sendEmail.php?error=3");
        }

        // Assigning body
        $mail->Body = $emailBody;
        try {
            $mail->MsgHTML($emailBody);
        } catch (Exception $e) {
            header("Location: sendEmail.php?error=3"); // Error 3: Email processing exception
        }

        // Sending email
        if($mail->Send()) {
            var_dump($mail);
            header("Location: sendEmail.php?success=1"); // Success: Email sent
        } else {
            var_dump($mail);
            header("Location: sendEmail.php?error=2"); // Error 2: Email sending error
        }
    }
    else {
        header("Location: sendEmail.php?error=1"); // Error 1: Form not submitted
    }
?>

<head>
    <meta charset="utf-8">
    <title>Sending Email...</title>
    <link rel="icon" href="../../img/favicon.jpeg">
</head>
