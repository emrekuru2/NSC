<?php
    $title = "Send Email";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>

    <form class="container-fluid" id="send-email-form" action="processAdminEmail.php" method="POST">

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
            <label for="emailFormFullName" class="col-form-label">Name (Optional: Leave this blank if you do not want your name to be displayed as the sender.)</label>
            <input type="text" id="emailFormFullName" name="emailFormFullName" class="form-control" placeholder="Name">
            <i class="fas fa-exclamation-circle send-email-input-warning-icon"></i>
            <p id="send-email-name-message">Leave this blank if you do not want your name to be displayed as the sender.</p>
        </div>

        <!-- Recipients -->
        <div class="send-email-row">
            <label for="emailFormEmail" class="send-email-input-label">Recipients</label>
            <input type="text" id="emailFormEmail" name="emailFormEmail" class="form-control" placeholder="recipient@email.com;">
            <button class="send-email-edit-group-btn" type="button" id="clear-all-recipients-btn" title="Clear All Recipients"><i class="fa-solid fa-delete-left fa-lg"></i></button>
            <button class="send-email-edit-group-btn" type="button" id="edit-email-group-btn" title="Edit Email Groups"><i class="fa-solid fa-user-pen"></i></button>
        </div>

        <!-- Email Group Button -->
        <div class="send-email-row email-group-list-row active" id="email-group-lists-closed">
            <button class="send-email-group-btn" type="button" id="email-group-lists-open-btn"><i class="fa-solid fa-caret-down" style="margin-left: 3px;"></i></button>
            <label class="send-email-group-btn-label" for="email-group-lists-open-btn">Email Groups</label>
        </div>

        <!-- Email Group List -->
        <div class="send-email-row email-group-list-column inactive" id="email-group-lists-opened">
            <!-- Email Group Button -->
            <div class="send-email-group-row">
                <button class="send-email-group-btn" type="button" id="email-group-lists-close-btn"><i class="fa-solid fa-caret-up" style="margin-left: 3px;"></i></button>
                <label class="send-email-group-btn-label" for="email-group-lists-close-btn">Email Groups</label>
            </div>

            <!-- General List -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">General</label>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-registered-users" name="email-group" value="all_users">
                    <label class="send-email-group-checkbox-label" for="group-all-registered-users">All registered users</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-development-users" name="email-group" value="all_development">
                    <label class="send-email-group-checkbox-label" for="group-all-development-users">All development program users</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-club-users" name="email-group" value="all_clubs">
                    <label class="send-email-group-checkbox-label" for="group-all-club-users">All club players</label>
                </div>
            </div>

            <!-- Clubs -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Clubs</label>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-club-A" name="email-group" value="club_a">
                    <label class="send-email-group-checkbox-label" for="group-club-A">Club A</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-club-B" name="email-group" value="club_b">
                    <label class="send-email-group-checkbox-label" for="group-club-B">Club B</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-club-C" name="email-group" value="club_c">
                    <label class="send-email-group-checkbox-label" for="group-club-C">Club C</label>
                </div>
            </div>

            <!-- Committees -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Committees</label>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-comm-A" name="email-group" value="committee_a">
                    <label class="send-email-group-checkbox-label" for="group-comm-A">Committee A</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-comm-B" name="email-group" value="committee_b">
                    <label class="send-email-group-checkbox-label" for="group-comm-B">Committee B</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-comm-C" name="email-group" value="committee_c">
                    <label class="send-email-group-checkbox-label" for="group-comm-C">Committee C</label>
                </div>
            </div>

            <!-- Regions -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Regions</label>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-region-A" name="email-group" value="region_a">
                    <label class="send-email-group-checkbox-label" for="group-region-A">Region A</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-region-B" name="email-group" value="region_b">
                    <label class="send-email-group-checkbox-label" for="group-region-B">Region B</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-region-C" name="email-group" value="region_c">
                    <label class="send-email-group-checkbox-label" for="group-region-C">Region C</label>
                </div>
            </div>

            <!-- 'Add Recipient' Button -->
            <div class="send-email-group-section">
                <button class="send-email-group-add-btn btn light-blue text-white my-4" type="button" id="add-email-recipients">Add</button>
            </div>
            <!-- 'Edit Email Groups' Button -->
            <!-- 'Uncheck All Boxes' Button -->

        </div>

        <!-- Email Body -->
        <div class="send-email-row">
            <label for="emailFormTextBox" class="send-email-input-label">Email Body</label>
            <textarea class="send-email-input-body" name="emailFormTextBox" id="emailFormTextBox" cols="100" rows="14" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="send-email-row">
            <button class="btn light-blue text-white btn-block my-4 send-email-submit-btn" type="button" id="submitEmail" name="submitEmail">Send Email</button>
        </div>

        <input type="hidden" id="email-recipient-json" name="email-recipient-json" value=""/>

    </form>

    <script src="../js/admin-email-pages.js"></script>
<?php
    include_once "../includes/components/footer.php";
?>
