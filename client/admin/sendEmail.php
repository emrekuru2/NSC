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

    <div class="container-fluid">

        <div class="row">
            <div class="col-7 offset-2">
                <div class="text-center">
                    <h1 class="h1 mb-0 text-gray-800">Send Email</h1>
                </div>
                <!-- Default form login -->

            </div>
        </div>
        <div class="row">
            <div class="col-7 offset-2">

                <form class="text-center" action="sendEmail.php" method="POST">


                    <div class="form-group row">
                        <label for="emailFormTitle" class="col-form-label">Email Subject</label>
                        <input type="text" id="emailFormTitle" name="emailFormTitle" class="form-control"
                               placeholder="Subject" required>
                    </div>

                    <div class="form-group row">
                        <label for="emailFormFirstName" class="col-form-label">Full Name</label>
                        <input type="text" id="emailFormFullName" name="emailFormFullName" class="form-control"
                               placeholder="Full Name">
                        <div class="mt-1">
                            <i class="fas fa-exclamation-circle" style="color:orange"></i> Leave this blank if you do
                            not want your name to be displayed as the sender.
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailFormEmail" class="col-form-label">Recipient Email</label>
                        <input type="email" id="emailFormEmail" name="emailFormEmail" class="form-control"
                               placeholder="E-mail">
                    </div>


                    <div class="form-group row">
                        <label for="emailFormTextBox" class="col-form-label">Email Content</label>
                        <textarea name="emailFormTextBox" id="emailFormTextBox" cols="100" rows="14"
                                  required></textarea>
                    </div>


                    <!-- Submit button -->
                    <button class="btn light-blue text-white btn-block my-4" type="submit" name="submitEmail">Send
                        Email
                    </button>


                </form>

            </div>
        </div>
    </div>


<?php
    include_once "../includes/components/footer.php";
?>
