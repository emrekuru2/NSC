
<?php
include_once "../../db/database.php";
include_once "../../db/dbFunctions.php";
$conn = OpenCon();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$title = "Edit Profile Page";
include "header.php";

if (isset($_GET['ProfileEdit']) && $_GET['ProfileEdit'] == "error"){
    echo "<p class='text-center text-danger'>Error updating profile. Please check your inputs and try again.</p>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12  col-md-10 col-lg-8 mx-auto">
            <div class="card  my-5 shadow-md">
                <div class="card-body">
                    <a href="../../index.php"><img src="../../img/logo.png" class="img-fluid mb-4" alt="Responsive image"></a>
                    <hr>

                    <!-- Default form login -->
                    <form class="text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                        <p class="h4 mb-4">Update Profile Information</p>

                        <div class="form-row">
                            <label for="RegisterFormEmail" class="col-sm-1 col-form-label"><i class="fas fa-envelope"></i></label>
                            <div class="form-group col-sm-5">
                            <input type="email" id="RegisterFormEmail" name="RegisterFormEmail" class="form-control" placeholder="E-mail" value="<?=$_SESSION["Email"]?>" >
                            </div>


                            <label for="RegisterFormPhone" class="col-sm-1 col-form-label"><i class="fas fa-phone"></i></label>
                            <div class="form-group col-sm-5">
                                <input type="number" id="RegisterFormPhone" name="RegisterFormPhone" class="form-control" placeholder="902555555" maxlength = "10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?=$_SESSION["phone"] ?>" >
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="RegisterFormStreetAddress" class="col-sm-1 col-form-label"><i class="fas fa-home"></i></label>
                            <div class="form-group col-sm-7">
                                <input type="text" id="RegisterFormStreetAddress" name="RegisterFormStreetAddress" class="form-control" placeholder="Street Address" value="<?=$_SESSION["StreetAddress"] ?>" >
                            </div>


                            <label for="RegisterFormCity" class="col-sm-1 col-form-label"><i class="fas fa-city"></i></label>
                            <div class="form-group col-sm-3">
                                <input type="text" id="RegisterFormCity" name="RegisterFormCity" class="form-control" placeholder="City" value="<?=$_SESSION["City"] ?>" >
                            </div>

                        </div>

                        <div class="form-row">
                            <label for="RegisterFormProvince" class="col-sm-1 col-form-label"><i class="fas fa-flag"></i></label>
                            <div class="form-group col-sm-4">
                                <select id="RegisterFormProvince" name="RegisterFormProvince" class="form-control" >
                            
                                    <option value="AB"<? echo ($_SESSION["Province"] == 'AB') ? "default" : "" ?>>Alberta</option>
                                    <option value="BC"<? echo ($_SESSION["Province"] == 'BC') ? "default" : "" ?>>British Columbia</option>
                                    <option value="MB"<? echo ($_SESSION["Province"] == 'MB') ? "default" : "" ?>>Manitoba</option>
                                    <option value="NB"<? echo ($_SESSION["Province"] == 'NB') ? "default" : "" ?>>New Brunswick</option>
                                    <option value="NL"<? echo ($_SESSION["Province"] == 'NL') ? "default" : "" ?>>Newfoundland and Labrador</option>
                                    <option value="NS"<? echo ($_SESSION["Province"] == 'NS') ? "default" : "" ?>>Nova Scotia</option>
                                    <option value="ON"<? echo ($_SESSION["Province"] == 'ON') ? "default" : "" ?>>Ontario</option>
                                    <option value="PE"<? echo ($_SESSION["Province"] == 'PE') ? "default" : "" ?>>Prince Edward Island</option>
                                    <option value="QC"<? echo ($_SESSION["Province"] == 'QC') ? "default" : "" ?>>Quebec</option>
                                    <option value="SK"<? echo ($_SESSION["Province"] == 'SK') ? "default" : "" ?>>Saskatchewan</option>
                                    <option value="NT"<? echo ($_SESSION["Province"] == 'NT') ? "default" : "" ?>>Northwest Territories</option>
                                    <option value="NU"<? echo ($_SESSION["Province"] == 'NU') ? "default" : "" ?>>Nunavut</option>
                                    <option value="YT"<? echo ($_SESSION["Province"] == 'YT') ? "default" : "" ?>>Yukon</option>
                                </select>
                            </div>

                            <label for="RegisterFormCountry" class="col-sm-1 col-form-label"><i class="fas fa-flag"></i></label>
                            <div class="form-group col-sm-2">
                                <input type="text" id="RegisterFormCountry" name="RegisterFormCountry" class="form-control" value="Canada"  readonly>
                            </div>

                            <label for="RegisterFormPostalCode" class="col-sm-1 col-form-label"><i class="fas fa-flag"></i></label>
                            <div class="form-group col-sm-3">
                                <input type="text" id="RegisterFormPostalCode" name="RegisterFormPostalCode" class="form-control" pattern="[0-9a-zA-Z]{6}" maxlength = "6" placeholder="Postal Code" value="<?=$_SESSION["PostalCode"] ?>" >
                            </div>
                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="col">
                            <h6 class="col-sm-4 ">Current Profile Picture</h6>
                                <div class="card-body col">
                                    <div class="card" style="width: 28rem; margin-left:auto; margin-right:auto;">
                                    <img class="card-img-top" src= "<?php echo $_SESSION['imgFolder']. "profilePicture.jpg"?>" alt="Card image cap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-11">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*"  id="file-upload" class="custom-file-input" name="profilePicture" aria-describedby="profilePictureAddon">
                                        <label class="custom-file-label mb-4" id="file-name" for="profilePicture">Change Profile Picture</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group green-border-focus">
                            <label for="RegisterFormDescription" >Description</label>
                            <textarea name="RegisterFormDescription" id="RegisterFormDescription" class="md-textarea form-control" placeholder="User Description" rows="3"><?= $_SESSION["userDescription"] ?></textarea>
                        </div>

                        <button class="btn light-blue text-white btn-block my-4" type="submit" id ="registerFormSubmit" name="registerFormSubmit">Update Information</button>




                    

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../js/fileNameChange.js"></script>