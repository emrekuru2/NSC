<?php

$title = "Manage Team List";
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
                            <th scope="col">Team Name</th>
                            <th scope="col">In Club</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <?php
                            displayAllTheTeam();
                        ?>

                    </table>
                    <a href="../EditTeamPage.php"><button  class="btn light-blue text-white btn-md mx-0 btn-rounded"> Create A New Team </button>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>



<?php

include "../includes/components/footer.php";