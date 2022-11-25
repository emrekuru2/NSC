<?php
    include_once '../includes/components/adminHeader.php';
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>


<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">


                <!-- Default form login -->
                <form class="text-center" method="post">

                    <p class="h4 mb-4">Create A New Sub Committees</p>
                    <br><br>
                    
                    <!-- Sub-Committee Name -->
                    <input type="text"  name="SubCommittee_Name" class="form-control mb-4" placeholder="Name of the Sub-Committee" required>

                    <!-- Discription -->
                    <textarea name="SubCommittee_Description"  placeholder="Description of the Sub-Committee" class="form-control mb-4" required></textarea>

                    <!-- Years -->
                    <input type="text"  name="Years" class="form-control mb-4" placeholder="Year it was created." required>    

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Submit</button>

                </form>
                <!-- Default form login -->
                <?php
                    createNewSubCommittees();
                ?>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </section>
    <!--Section: Content-->


</div>


<?php
    include_once '../includes/components/footer.php'
?>