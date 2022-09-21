<?php

$title = "Admin Dashboard";

include "../includes/components/adminHeader.php";
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <div class="col-7 offset-4">



                    <?php
                    /* future functionality

                    $conn = OpenCon();

                    //Retrieves the current count
                    $count = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM NSCA_PageCounter"));
                    //Displays the count on your site
                    */
                    ?>


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


<?php

include "../includes/components/footer.php";
