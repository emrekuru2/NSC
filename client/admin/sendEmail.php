<?php
    $title = "Send Email";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>

    <form class="container-fluid" action="processAdminEmail.php" method="POST">

        <!-- Title -->
        <div class="send-email-row">
            <h1 class="send-email-title h1 mb-0 text-gray-800">Send Email</h1>
        </div>

        <?php
        if (isset($_GET['success'])) {
            echo "<div class=\"send-email-row\" style=\"justify-content: center;\">\n" .
                    "<div class=\"send-email-alert-success\">Email sent successfully!</div>\n" .
                "</div>";
        }
        else if (isset($_GET['error'])) {
            echo "<div class=\"send-email-row\" style=\"justify-content: center;\">\n" .
                    "<div class=\"send-email-alert-error\">An error occurred. Please try again.</div>\n" .
                "</div>";
        }
        ?>

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

        <!-- Email Group List -->
        <div class="send-email-row">
            <div class="send-email-group-list">
                <button class="send-email-group-list-btn"></button>
                <p class="send-email-group-list-title">Email Groups</p>
            </div>
        </div>

        <!-- Email Body -->
        <div class="send-email-row">
            <label for="emailFormTextBox" class="send-email-input-label">Email Body</label>
            <textarea class="send-email-input-body" name="emailFormTextBox" id="emailFormTextBox" cols="100" rows="14" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="send-email-row">
            <button class="btn light-blue text-white btn-block my-4 send-email-submit-btn" type="submit" id="submitEmail" name="submitEmail">Send Email</button>
        </div>

    </form>

    <script src="../js/admin-email-pages.js"></script>
<?php
    include_once "../includes/components/footer.php";
?>
