<?php

    $title = "Admin Dashboard";

    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
    
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <div class="col-7 offset-4">
                    <div class="card w-50">
                        <div class="card-header">
                            Visitors Today
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center"><?php //echo $count[0]; ?></p>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    </div>


<?php include "../includes/components/footer.php";?>