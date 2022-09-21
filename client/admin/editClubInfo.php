<?php
include_once "../db/database.php";
include_once "../db/dbFunctions.php";
$conn = OpenCon();

$title = "Edit Club Information";
include "../includes/components/adminHeader.php";

$allClubs = getClubs($conn);

?>
<div class="col-7 offset-2">
    <br><br>
    <?php
    if (isset($_GET['id'])) {
        $clubInfo = getClub($conn, $_GET['id']);
    ?>
    <a class="btn btn-primary btn-sm" href="editClubInfo.php">Return</a>
    <br><br>
    <form action = "<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ClubName">Club Name</label>
            </div>
            <input type="text" class="form-control" name="ClubName" id="ClubName" value="<?=$clubInfo['Name']?>" placeholder="Club Name">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ClubPhone">Phone</label>
            </div>
            <input class="form-control" type="tel" id="ClubPhone" name="ClubPhone" value="<?=$clubInfo['Phone']?>" placeholder="9021234567">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ClubEmail">Email</label>
            </div>
            <input type="email" class="form-control" name="ClubEmail" id="ClubEmail" value="<?=$clubInfo['Email']?>" placeholder="username@email.com">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ClubFacebook">Facebook URL</label>
            </div>
            <input type="text" class="form-control" name="ClubFacebook" id="ClubFacebook" value="<?=$clubInfo['Facebook']?>" placeholder="www.facebook.com/team-page">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="ClubWebsite">Website URL</label>
            </div>
            <input type="text" class="form-control" name="ClubWebsite" id="ClubWebsite" value="<?=$clubInfo['Website']?>" placeholder="www.url.com">
        </div>
    </form>
    <?php } else { ?>
    <ul class="list-group list-group-flush">
        <?php
        while ($row = mysqli_fetch_assoc($allClubs)) {
        ?>
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <span class="align-middle">
                        <?= $row['Name'] ?>
                    </span>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $row['ClubID'] ?>" class="btn btn-primary btn-sm align-middle" role="button">Edit</a>
            </div>
            </li>
            <?php
            }
            ?>
        </ul>
    <?php } ?>
</div>




<?php

include "../includes/components/footer.php";