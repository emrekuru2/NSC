<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../../vendor/composer/src/Exception.php';
    require_once '../../vendor/composer/src/PHPMailer.php';
    require_once '../../vendor/composer/src/SMTP.php';
    require_once '../../vendor/autoload.php';

    include_once("../db/database.php");
    include_once("../db/dbFunctions.php");
    include_once("../includes/functions/security.php");

    DefineSecurity();
    RestrictAdmin(CheckRole($_SESSION['User_ID'])); // Prevent direct access and prevent non-admin's to access
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    // Processing email
    if (isset($_REQUEST['submitEmail'])) {
        // Reading email inputs
        $emailSubject = sanitizeData($_REQUEST['emailFormTitle']); // Subject
        $emailName = sanitizeData($_REQUEST['emailFormFullName']); // Name
        $emailRecipients = sanitizeData($_REQUEST['emailFormEmail']); // Recipients
        $emailBody = sanitizeData($_REQUEST['emailFormTextBox']); // Body

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
            $mail->SetFrom("testadmin@cricketnovascotia.ca", $emailName);
        } else {
            $mail->SetFrom("testadmin@cricketnovascotia.ca", "Test Admin");
        }
        // Assigning recipients
        $mail->AddAddress($emailRecipients, "toAddress");
        // Assigning body
        $mail->Body = $emailBody;
        $mail->MsgHTML($emailBody);

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
