<?php
    $title = "Send Email";
    require_once "../includes/components/adminHeader.php";
    require_once "../includes/functions/getEmailGroups.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    $conn = OpenCon();


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
        </div>

        <!-- Email Group List Closed -->
        <div class="send-email-row email-group-list-row active" id="email-group-lists-closed">
            <button class="send-email-group-btn" type="button" id="email-group-lists-open-btn"><i class="fa-solid fa-caret-down" style="margin-left: 3px;"></i></button>
            <label class="send-email-group-btn-label" for="email-group-lists-open-btn">Email Groups</label>
        </div>

        <!-- Email Group List Opened -->
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
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-development-users" name="email-group" value="all_programs">
                    <label class="send-email-group-checkbox-label" for="group-all-development-users">All programs users</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-club-users" name="email-group" value="all_clubs">
                    <label class="send-email-group-checkbox-label" for="group-all-club-users">All club players</label>
                </div>
            </div>

            <!-- Teams -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Teams</label>
                <?php
                $allTeams = getTeams($conn);

                while ($row = mysqli_fetch_assoc($allTeams)) {
                    $teamID = $row['TeamID'];
                    $teamName = $row['TeamName'];
                    ?>

                    <div class="send-email-group-row">
                        <input class="send-email-group-checkbox" type="checkbox" id="team-<?php echo $teamID ?>" name="email-group" value="team_<?php echo $teamID ?>">
                        <label class="send-email-group-checkbox-label" for="team-<?php echo $teamID ?>"><?php echo $teamName ?></label>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- Clubs -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Clubs</label>
                <?php
                    $allClubs = getClubs($conn);

                    while ($row = mysqli_fetch_assoc($allClubs)) {
                        $clubID = $row['ClubID'];
                        $clubName = $row['Name'];
                        ?>

                        <div class="send-email-group-row">
                            <input class="send-email-group-checkbox" type="checkbox" id="group-club-<?php echo $clubID ?>" name="email-group" value="club_<?php echo $clubID ?>">
                            <label class="send-email-group-checkbox-label" for="group-club-<?php echo $clubID ?>"><?php echo $clubName ?></label>
                        </div>

                        <?php
                    }
                ?>
            </div>

            <!-- Committees -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Committees</label>
                <?php
                $allSubCommittees = getAllSubCommittees($conn);

                while ($row = mysqli_fetch_assoc($allSubCommittees)) {
                    $committeeID = $row['SubID'];
                    $committeeName = $row['Name'];
                    ?>

                    <div class="send-email-group-row">
                        <input class="send-email-group-checkbox" type="checkbox" id="group-club-<?php echo $committeeID ?>" name="email-group" value="club_<?php echo $committeeID ?>">
                        <label class="send-email-group-checkbox-label" for="group-club-<?php echo $committeeID ?>"><?php echo $committeeName ?></label>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- Regions -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Regions</label>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="region-halifax" name="email-group" value="region_halifax">
                    <label class="send-email-group-checkbox-label" for="region-halifax">Halifax</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="region-moncton" name="email-group" value="region_moncton">
                    <label class="send-email-group-checkbox-label" for="region-moncton">Moncton</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="region-saint-johns" name="email-group" value="region_saint_johns">
                    <label class="send-email-group-checkbox-label" for="region-saint-johns">Saint John's</label>
                </div>
                <!-- TODO: Populate database with region/location data. -->
            </div>

            <!-- Programs -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Programs</label>
                <?php
                $allPrograms = getAllPrograms($conn);

                while ($row = mysqli_fetch_assoc($allPrograms)) {
                    $programID = $row['DevID'];
                    $programName = $row['Name'];
                    ?>

                    <div class="send-email-group-row">
                        <input class="send-email-group-checkbox" type="checkbox" id="program-<?php echo $programID ?>" name="email-group" value="program_<?php echo $programID ?>">
                        <label class="send-email-group-checkbox-label" for="program-<?php echo $programID ?>"><?php echo $programName ?></label>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- Buttons -->
            <div class="send-email-group-section">
                <button class="send-email-group-add-btn btn light-blue text-white my-4" type="button" id="add-email-recipients" title="Add Checked Groups to Recipients">Add</button>
                <button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="uncheck-all-groups" title="Uncheck All Groups">Uncheck All</button>
                <button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="edit-email-group-btn" title="Edit Email Groups">Edit Email Groups</button>
            </div>
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
