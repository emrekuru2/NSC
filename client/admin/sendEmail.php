<?php
    $title = "Send Email";
    require_once "../includes/components/adminHeader.php";
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

        <!-- 'From' Name -->
        <div class="send-email-row">
            <label for="emailFormFullName" class="col-form-label">From Name (Optional)</label>
            <input type="text" id="emailFormFullName" name="emailFormFullName" class="form-control" placeholder="Name">
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
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-club-users" name="email-group" value="all_clubs">
                    <label class="send-email-group-checkbox-label" for="group-all-club-users">All club players</label>
                </div>
                <div class="send-email-group-row">
                    <input class="send-email-group-checkbox" type="checkbox" id="group-all-development-users" name="email-group" value="all_programs">
                    <label class="send-email-group-checkbox-label" for="group-all-development-users">All development program users</label>
                </div>
            </div>

            <!-- Clubs -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Clubs</label>
                <?php
                    $allClubs = getClubs($conn);

                    if ($allClubs->num_rows == 0) {
                        ?>
                        <div class="send-email-group-row">
                            <label class="send-email-group-no-checkbox-label">No clubs.</label>
                        </div>
                        <?php
                    }

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

            <!-- Teams -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Teams</label>
                <?php
                $allTeams = getTeams($conn);

                if ($allTeams->num_rows == 0) {
                    ?>
                    <div class="send-email-group-row">
                        <label class="send-email-group-no-checkbox-label">No teams.</label>
                    </div>
                    <?php
                }

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

            <!-- Development Programs -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Development Programs</label>
                <?php
                $allPrograms = getAllPrograms($conn);

                if ($allPrograms->num_rows == 0) {
                    ?>
                    <div class="send-email-group-row">
                        <label class="send-email-group-no-checkbox-label">No development programs.</label>
                    </div>
                    <?php
                }

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

            <!-- Committees -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Sub-Committees</label>
                <?php
                $allSubCommittees = getAllSubCommittees($conn);

                if ($allSubCommittees->num_rows == 0) {
                    ?>
                    <div class="send-email-group-row">
                        <label class="send-email-group-no-checkbox-label">No sub-committees.</label>
                    </div>
                    <?php
                }

                while ($row = mysqli_fetch_assoc($allSubCommittees)) {
                    $committeeID = $row['SubID'];
                    $committeeName = $row['Name'];
                    ?>

                    <div class="send-email-group-row">
                        <input class="send-email-group-checkbox" type="checkbox" id="committee-<?php echo $committeeID ?>" name="email-group" value="committee_<?php echo $committeeID ?>">
                        <label class="send-email-group-checkbox-label" for="committee-<?php echo $committeeID ?>"><?php echo $committeeName ?></label>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- Regions -->
            <div class="send-email-group-section">
                <label class="send-email-group-list-title">Regions</label>
                <?php
                $allRegions = getAllLocations($conn);

                if ($allRegions->num_rows == 0) {
                    ?>
                    <div class="send-email-group-row">
                        <label class="send-email-group-no-checkbox-label">No regions.</label>
                    </div>
                    <?php
                }

                while ($row = mysqli_fetch_assoc($allRegions)) {
                    $regionID = $row['LocationID'];
                    $regionName = $row['Name'];
                    ?>

                    <div class="send-email-group-row">
                        <input class="send-email-group-checkbox" type="checkbox" id="region-<?php echo $regionID ?>" name="email-group" value="region_<?php echo $regionID ?>">
                        <label class="send-email-group-checkbox-label" for="region-<?php echo $regionID ?>"><?php echo $regionName ?></label>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- Buttons -->
            <div class="send-email-group-section">
                <!-- <button class="send-email-group-add-btn btn light-blue text-white my-4" type="button" id="add-email-recipients" title="Add Checked Groups to Recipients">Add</button> -->
                <button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="uncheck-all-groups" title="Uncheck All Groups">Uncheck All</button>
                <!-- <button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="edit-email-group-btn" title="Edit Email Groups">Edit Email Groups</button> -->
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
