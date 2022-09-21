<?php

$title = "Manage Team Application";
include "../db/dbFunctions.php";
include "../includes/components/adminHeader.php";

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



<?php

include "../includes/components/footer.php";