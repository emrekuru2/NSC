<?php
    $title = "Edit Development Porgrams";
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
                            <th scope="col">Program Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <?php
                            displayAllTheProgram();
                        ?>

                    </table>
                    <a href="../admin/editProgramPage.php"><button  class="btn light-blue text-white btn-md mx-0 btn-rounded"> Add New Program</button>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>



<?php include "../includes/components/footer.php"; ?>