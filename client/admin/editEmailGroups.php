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
    <form action="" method="GET">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <select name="sort-method" class="form-control">
                        <option value="">Sort Groups By</option>
                        <option value="A-Z" <?php if(isset($_GET['sort-method']) && $_GET['sort-method'] == "A-Z") {echo "selected";}?> >A-Z (Ascending Order)</option>
                        <option value="Z-A" <?php if(isset($_GET['sort-method']) && $_GET['sort-method'] == "Z-A") {echo "selected";} ?> >Z-A (Descending Order)</option>
                    </select>
                    <button type= "submit" class="input-group-text btn-primary" id="basic-addon2">
                        Sort
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-7 offset-2">
            <div class="text-center">
                <table class="table">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">Group</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $path = 'test.json';
                    $json = file_get_contents($path);
                    $data = json_decode($json, true);
                    $groupNames = array_keys($data);
                    for($i = 0; $i < count($groupNames); $i++) {

                        echo "  
                           <tr>
                                <td>
                                  <a>test</a>
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
</div>
<?php
include_once "../includes/components/footer.php";
?>


