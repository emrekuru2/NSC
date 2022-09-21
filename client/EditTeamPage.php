<?php
include 'includes/components/header.php';
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

                    <p class="h4 mb-4">Create A New Team</p>
                    <br><br>
                    <!-- Email -->
                    <input type="text"  name="teamName" class="form-control mb-4" placeholder="Team Name">

                    <!-- Password -->
                    <input type="text"  name="profilePictureName" class="form-control mb-4" placeholder="Profile Picture Name">

                    <!-- Profile picture -->
                    <textarea name="description"  placeholder="Description" class="form-control mb-4" ></textarea>
                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Submit</button>

                </form>
                <!-- Default form login -->
                <?php
                    createNewTeam();
                ?>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </section>
    <!--Section: Content-->


</div>


<?php
include 'includes/components/footer.php'
?>


