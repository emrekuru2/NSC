<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/composer/src/Exception.php';
    require '../../vendor/composer/src/PHPMailer.php';
    require '../../vendor/composer/src/SMTP.php';

    $title = "Send Email";

    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    // Swift Mailer Library
    require_once '../../vendor/autoload.php';


    function sendMail($toAddress, $subject, $body, $fromName = "") {
        // Mail Transport
        echo "Sending Email...";
        $mail = new PHPMailer(true);
        // remove the following line if you want to see the debug output
        $mail->isSMTP();      
        $mail->Mailer = 'smtp';
        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 26;
        $mail->Host       = "mail.cricketnovascotia.ca";
        $mail->Username   = "testadmin@cricketnovascotia.ca";
        $mail->Password   = "CricketNSCA";

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        if ($fromName != "") {
            $mail->SetFrom("testadmin@cricketnovascotia.ca", $fromName);
        } else {
            $mail->SetFrom("testadmin@cricketnovascotia.ca", "testadmin");
        }
        $mail->AddAddress($toAddress, "toAddress");
        $content = $body;
        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    }
    if (isset($_POST['submitEmail'])) {
        //if they used a name to send as
        if (isset($_POST['emailFormFullName'])) {
            // send the mail with a name
            sendMail($_POST['emailFormEmail'],$_POST['emailFormTitle'], $_POST['emailFormTextBox'], $_POST['emailFormFullName']);
        } else {
            // send the mail without a name
            sendMail($_POST['emailFormEmail'],$_POST['emailFormTitle'], $_POST['emailFormTextBox']);
        }        
    }
?>

    <form class="container-fluid" action="sendEmail.php" method="POST">

        <!-- Title -->
        <div class="send-email-row">
            <h1 class="send-email-title h1 mb-0 text-gray-800">Send Email</h1>
        </div>

        <!-- Email Sent Feedback -->
        <div class="send-email-row" style="justify-content: center;">
            <div class="send-email-alert-success">Email sent successfully!</div>
        </div>
        <div class="send-email-row" style="justify-content: center;">
            <div class="send-email-alert-error">Error occurred while sending email.</div>
        </div>

        <!-- Subject -->
        <div class="send-email-row">
            <label for="emailFormTitle" class="col-form-label">Subject</label>
            <input type="text" id="emailFormTitle" name="emailFormTitle" class="form-control" placeholder="Subject" required>
        </div>

        <!-- Full Name -->
        <div class="send-email-row">
            <label for="emailFormFullName" class="col-form-label">Name (Optional)</label>
            <input type="text" id="emailFormFullName" name="emailFormFullName" class="form-control" placeholder="Name">
            <i class="fas fa-exclamation-circle send-email-input-warning-icon"></i>
            <p id="send-email-name-message">Leave this blank if you do not want your name to be displayed as the sender.</p>
        </div>

        <!-- Recipients -->
        <div class="send-email-row">
            <label for="emailFormEmail" class="send-email-input-label">Recipients</label>
            <input type="email" id="emailFormEmail" name="emailFormEmail" class="form-control" placeholder="recipient@email.com">
            <button class="send-email-edit-group-btn" type="button" id="edit-email-group-btn" title="Edit Email Groups"><i class="fa-solid fa-user-pen"></i></button>
        </div>

        <!-- Email Body -->
        <div class="send-email-row">
            <label for="emailFormTextBox" class="send-email-input-label">Email Body</label>
            <textarea class="send-email-input-body" name="emailFormTextBox" id="emailFormTextBox" cols="100" rows="14" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="send-email-row">
            <button class="btn light-blue text-white btn-block my-4 send-email-submit-btn" type="submit" name="submitEmail">Send Email</button>
        </div>

    </form>

    <script src="../js/admin-email-pages.js"></script>
    <script>if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }</script>
<?php
    include_once "../includes/components/footer.php";
?>
