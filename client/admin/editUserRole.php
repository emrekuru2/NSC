<?php
    $title = "Manage User Role";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-7 offset-2">
                <div class="text-center">
                    <table class="table">
                        <thead class="black white-text">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">In Team</th>
                            <th scope="col">In Club</th>
                            <th scope="col">User Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <?php
                            displayUserInformation();
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>



<?php include "../includes/components/footer.php"; ?>