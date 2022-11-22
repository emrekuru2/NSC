<?php

    $title = "Admin Dashboard";

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
                    <th scope="col">Time of the day</th>
                    <th scope="col">Number of Visitors</th>
                </tr>
                </thead>
                <?php
                    displayVisitors();
                ?>

            </table>
        </div>
    </div>
</div>
</div>


<?php include "../includes/components/footer.php";?>