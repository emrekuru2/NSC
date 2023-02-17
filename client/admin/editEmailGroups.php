<?php
$title = "Send Email";

include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));
$conn = OpenCon();
?>
<div class="send-email-group-section">
    <a href="../admin/sendEmail.php"><button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="send-email--btn" title="Return to Send Email Page">Return to Send Email Page</button></a>
</div>
<form class="container-fluid dark-grey-text">
    <h1 class="display-3 text-center font-weight-bold">Manage Email Groups</h1>
</form>

<script>
    console.log("Email Subject: " + sessionStorage.getItem('emailSubject'))
    console.log("Email Name: " + sessionStorage.getItem('emailName'))
    console.log("Email Recipients: " + sessionStorage.getItem('emailRecipients'))
    console.log("Email Body: " + sessionStorage.getItem('emailBody'))
</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table border">
                    <thead class="light-blue white-text">
                    <tr>
                        <th scope="col">Club Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $allClubs = getClubs($conn);

                    while ($row = mysqli_fetch_assoc($allClubs)) {
                        $clubID = $row['ClubID'];
                        $clubName = $row['Name'];
                        ?>

                        <?php

                        echo "  
                           <tr>
                                <td>
                                  <a>$clubName</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?clubID=$clubID>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                        ?>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table border">
                    <thead class="light-blue white-text">
                    <tr>
                        <th scope="col">Committee Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $allSubCommittees = getAllSubCommittees($conn);

                    while ($row = mysqli_fetch_assoc($allSubCommittees)) {
                    $committeeID = $row['SubID'];
                    $committeeName = $row['Name'];
                    ?>

                    <?php
                        echo "  
                           <tr>
                                <td>
                                  <a>$committeeName</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?committeeID=$committeeID>
                                    <button type='button'>Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                        ?>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table border">
                    <thead class="light-blue white-text">
                    <tr>
                        <th scope="col">Region Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $groupNames = array("Halifax", "Moncton", "Saint John's");
                    for($i = 0; $i < count($groupNames); $i++) {

                        echo "  
                           <tr>
                                <td>
                                  <a>$groupNames[$i]</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?groupNames=$groupNames[$i]>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table border">
                    <thead class="light-blue white-text">
                    <tr>
                        <th scope="col">Team Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $allTeams = getTeams($conn);

                    while ($row = mysqli_fetch_assoc($allTeams)) {
                        $teamID = $row['TeamID'];
                        $teamName = $row['TeamName'];
                        ?>

                        <?php

                        echo "  
                           <tr>
                                <td>
                                  <a>$teamName</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?teamID=$teamID>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                        ?>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../includes/components/footer.php";
?>


