<?php
$title = "Edit or Delete Group";
include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));
$conn = OpenCon();
?>
<div class="send-email-group-section">
    <a href="../admin/editEmailGroups.php"><button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="send-email--btn" title="Return to Edit Email Group Page">Return to Manage Email Group Page</button></a>
</div>

<form class="container-fluid dark-grey-text">
        <?php if(isset($_GET['clubID'])) {
            $allClubs = getClubs($conn);
            while ($row = mysqli_fetch_assoc($allClubs)) {
                $clubID = $row['ClubID'];
                $clubName = $row['Name'];
                if ($clubID == ($_GET['clubID'])) {
                    echo "<h3 class='display-4 text-center font-weight-bold'>Manage $clubName Email Group</h3>";
                }
            }
        }
        else if(isset($_GET['teamID'])) {
            $allTeams = getTeams($conn);
            while ($row = mysqli_fetch_assoc($allTeams)) {
                $teamID = $row['TeamID'];
                $teamName = $row['TeamName'];
                if ($teamID == ($_GET['teamID'])) {
                    echo "<h4 class='display-4 text-center font-weight-bold'>Manage $teamName Email Group</h4>";
                }
            }
        }
        else if(isset($_GET['committeeID'])) {
        $allSubCommittees = getAllSubCommittees($conn);
        while ($row = mysqli_fetch_assoc($allSubCommittees)) {
            $committeeID = $row['SubID'];
            $committeeName = $row['Name'];
            if($committeeID == ($_GET['committeeID'])) {
                echo "<h4 class='display-4 text-center font-weight-bold'>Manage $committeeName Email Group</h4>";
                }
            }
        }
        else if(isset($_GET['groupNames'])) {
            $groupNames = array("Halifax", "Moncton", "Saint John's");
        for($i = 0; $i < count($groupNames); $i++) {
            if($groupNames[$i] == $_GET['groupNames']) {
                echo "<h4 class='display-4 text-center font-weight-bold'>Manage $groupNames[$i] Email Group</h4>";
                }
            }
        }
        ?>
</form>