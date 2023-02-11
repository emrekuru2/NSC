<?php
$title = "Send Email";

include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));

?>
<form class="container-fluid dark-grey-text">
    <h1 class="display-3 text-center font-weight-bold">Manage Groups</h1>
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
                <table class="table">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">Club Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $groupNames = array("Club A", "Club B", "Club C");
                    for($i = 0; $i < count($groupNames); $i++) {

                        echo "  
                           <tr>
                                <td>
                                  <a>$groupNames[$i]</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&userName=$fullName>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&type=2>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">Committee Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $groupNames = array("Committee A", "Committee B", "Committee C");
                    for($i = 0; $i < count($groupNames); $i++) {

                        echo "  
                           <tr>
                                <td>
                                  <a>$groupNames[$i]</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&userName=$fullName>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&type=2>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">Region Groups</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $groupNames = array("Region A", "Region B", "Region C");
                    for($i = 0; $i < count($groupNames); $i++) {

                        echo "  
                           <tr>
                                <td>
                                  <a>$groupNames[$i]</a>
                                </td>
                                <td>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&userName=$fullName>
                                    <button type='button' >Edit</button>
                                </a>
                                <a href=../admin/editEmailGroupsForm.php?userID=$UserID&type=2>
                                    <button type='button' >Delete</button>
                                </a>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <a href="../admin/sendEmail.php"<button class="btn light-blue text-white btn-md mx-0 btn-rounded">Return to Send Email Page</button>
    <a href="../admin/editEmailGroupsForm.php"><button  class="btn light-blue text-white btn-md mx-0 btn-rounded"> Add New Group</button>
</div>
<?php
include_once "../includes/components/footer.php";
?>


