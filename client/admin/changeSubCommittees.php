<?php
    $title = "Change Development Program";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    $conn = OpenCon();

    if(isset($_GET["SubID"])){
        $SubID = $_GET["SubID"];
    }
    $row = getSubCommittees($SubID);
?>

<div class="row">
    <div class="col-7 offset-2">
        <div class="text-center">
            <h1 class="h1 mb-0 text-gray-800">Edit Sub-Committees</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7 offset-2">


        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                    <!-- Sub-Committee Name -->
                    <div class="form-group row">
                    <label for="SubCommittee_Name" class="col-form-label">Sub-Committee Name</label>
                    <input type="text"  name="SubCommittee_Name" class="form-control mb-4" placeholder="Name of the Sub-Committee"  value="<?php echo $row['Name']; ?>" required>
                    </div>
                    
                    <!-- Discription -->
                    <div class="form-group row">
                    <label for="SubCommittee_Description" class="col-form-label">Sub-Committee Description</label>
                    <textarea name="SubCommittee_Description"  placeholder="Description of the Sub-Committee" class="form-control mb-4" required> <?php echo $row['Description']; ?></textarea>
                    </div>

                    <!-- Years -->
                    <div class="form-group row">
                    <label for="Years" class="col-form-label">Sub-Committee Year</label>
                    <input type="text"  name="Years" class="form-control mb-4" placeholder="Year it was created."  value="<?php echo $row['Years']; ?>" required>    
                    </div>
                    <!-- Submit button -->
                    <button class="btn light-blue text-white btn-block my-4" type="submit" name="changeCommittees">Submit</button>
        
        </form>
        <?php
        if(isset($_POST["changeCommittees"])){
            if(setSubCommittee($_POST["SubCommittee_Name"] , $_POST["SubCommittee_Description"] , $_POST["Years"],$SubID))
            {
            header("Location: editSubCommittees.php");
            }
        }
        
        ?>
    </div>
</div>