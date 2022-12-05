<?php
    $title = "Edit Sub Committees";
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
                            <th scope="col">Sub-Committees Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <?php
                            displayAllTheSubCommitees();
                        ?>

                    </table>
                    <a href="../admin/createSubCommittees.php"><button  class="btn light-blue text-white btn-md mx-0 btn-rounded"> Add New Sub-Committees</button>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>



<?php include "../includes/components/footer.php"; ?>