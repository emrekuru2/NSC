<?php
    $title = "Manage Team Application";
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
                            <th scope="col">Name</th>
                            <th scope="col">Team To Join</th>
                            <th scope="col">Agree / Decline</th>
                        </tr>
                        </thead>
                       <?php
                            manageApplyToTeam();
                       ?>

                    </table>
                </div>
            </div>
        </div>
    </div>



<?php include "../includes/components/footer.php";?>