<?php
    $title = "Manage User Role";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>


    <div class="container-fluid">

        <form action="" method="GET">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search Name">
                    <button type="submit-search" class="btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <form action="" method="GET">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <select name="sort-method" class="form-control">
                            <option value="">Select Options</option>
                            <option value="A-Z" <?php if(isset($_GET['sort-method']) && $_GET['sort-method'] == "A-Z") {echo "selected";}?> >A-Z (Ascending Order)</option>
                            <option value="Z-A" <?php if(isset($_GET['sort-method']) && $_GET['sort-method'] == "Z-A") {echo "selected";} ?> >Z-A (Descending Order)</option>
                            <option value="unassign" <?php if(isset($_GET['sort-method']) && $_GET['sort-method'] == "unassign") {echo "selected";} ?> >Unassigned Users</option>
                        </select>
                        <button type= "submit" class="input-group-text btn-primary" id="basic-addon2">
                            Sort
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-7 offset-2">
                <div class="text-center">
                    <table class="table">
                        <thead class="black white-text">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">In Team</th>
                            <th scope="col">In Club</th>
                            <th scope="col">User Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <?php
                        $sort_option = "";
                        if (isset($_GET['sort-method'])){
                            if($_GET['sort-method'] == "A-Z")
                            {
                                $sort_option = "ASC";
                                displaySortedUserInformation($sort_option);
                                
                            }
                            else if ($_GET['sort-method'] == "Z-A")
                            {
                                $sort_option = "DESC";
                                displaySortedUserInformation($sort_option);
                                
                            }
                            elseif ($_GET['sort-method'] == "unassign")
                            {
                                displayunassignUserInformation();
                            }
                        }
                        else if (isset($_GET['search'])){
                            $searchValue = htmlspecialchars($_GET['search']);
                            displaySearchedUserInformation($searchValue);
                        }
                        else {
                            displayUserInformation();
                        }

                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>



<?php include "../includes/components/footer.php"; ?>