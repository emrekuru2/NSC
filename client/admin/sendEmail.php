<?php

$title = "Send Email";

include "../includes/components/adminHeader.php";


// Swift Mailer Library
require_once '../../vendor/autoload.php';


if (isset($_POST['submitEmail'])) {

// Mail Transport
    $transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
    $transport->setUsername('novascotiacricketassociation@gmail.com')->setPassword('fSUN8LGR1Xj8');

// Mailer
    $mailer = new Swift_Mailer($transport);


    //if they used a name to send as
    if (isset($_POST['emailFormFullName'])) {
        // Create a message
            $message = (new Swift_Message($_POST['emailFormTitle']))
                ->setFrom(array('novascotiacricketassociation@gmail.com' => $_POST['emailFormFullName']))
                ->setTo($_POST['emailFormEmail'])
                ->setBody($_POST['emailFormTextBox']);


    } else {
        // Create a message
            $message = (new Swift_Message($_POST['emailFormTitle']))
                ->setFrom(array('novascotiacricketassociation@gmail.com'))
                ->setTo($_POST['emailFormEmail'])
                ->setBody($_POST['emailFormTextBox']);
        }


// Send the message
    if ($mailer->send($message)) {
        echo '<p class="text-center text-success">Mail sent successfully.</p>';
    } else {
        echo '<p class="text-center text-danger"> There was an error sending the email. Please try again later.</p>';
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

include "../includes/components/footer.php";
