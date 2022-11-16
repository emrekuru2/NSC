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

                    <p class="h4 mb-4">Create A New Program</p>
                    <br><br>
                    <!-- Name -->
                    <input type="text"  name="programName" class="form-control mb-4" placeholder="Name of the program">

                    <!-- Duration -->
                    <input type="text"  name="duration" class="form-control mb-4" placeholder="Duration of the program. Ex. 16 weeks">

                    <!-- Discription -->
                    <textarea name="programDescription"  placeholder="Description of the prorgam" class="form-control mb-4" ></textarea>

                    <!-- Time -->
                    <input type="text"  name="time" class="form-control mb-4" placeholder="Time of the program. Ex. 0915-1515">    
                    
                    <!-- Charges -->
                    <input type="text"  name="charges" class="form-control mb-4" placeholder="Charges. Ex. $50 monthly">

                    <!-- Type -->
                    <input type="text"  name="type" class="form-control mb-4" placeholder="Type of the program. Ex. youth">

                    <!-- Days run -->
                    <input type="text"  name="days" class="form-control mb-4" placeholder="Days of the week the program is run. Ex. Saturdays and Sundays">

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Submit</button>

                </form>
                <!-- Default form login -->
                <?php
                    createNewProgram();
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