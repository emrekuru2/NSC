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
                    <div class="form-group row">
                        <label for="programName" class="col-form-label">Program Name</label>
                        <input type="text"  name="programName" class="form-control mb-4" placeholder="Ex.Youth Summer Camp" required>
                    </div>

                    <!-- Duration -->
                    <div class="form-group row">
                        <label for="duration" class="col-form-label">Program Duration</label>
                        <input type="text"  name="duration" class="form-control mb-4" placeholder="Ex. 16 weeks" required>
                    </div>

                    <!-- Discription -->
                    <div class="form-group row">
                        <label for="programDescription" class="col-form-label">Program Discription</label>
                        <textarea name="programDescription"  placeholder="Ex. Fun summer camp aiming to teach cricket to youth" class="form-control mb-4" required></textarea>
                    </div>
                    <!-- Time -->
                    <div class="form-group row">
                        <label for="time" class="col-form-label">Program Timing</label>
                        <input type="text"  name="time" class="form-control mb-4" placeholder="Ex. 0915-1515" required>    
                    </div>
                    <!-- Charges -->
                    <div class="form-group row">
                        <label for="charge" class="col-form-label">Charge for the Program</label>
                        <input type="text"  name="charges" class="form-control mb-4" placeholder="Ex. $50 monthly" required>
                    </div>

                    <!-- Type -->
                    <div class="form-group row">
                        <label for="type" class="col-form-label">Program Type</label>
                        <input type="text"  name="type" class="form-control mb-4" placeholder="Ex. youth" required>
                    </div>

                    <!-- Days run -->
                    <div class="form-group row">
                        <label for="days" class="col-form-label">Days of the week Program is run</label>
                        <input type="text"  name="days" class="form-control mb-4" placeholder="Ex. Saturdays and Sundays" required>
                    </div>

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