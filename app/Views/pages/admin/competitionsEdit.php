<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="col-lg-8">
    <div class="card shadow">
        <div class="card-header">Edit Competition:
            <button style="float:right;" type="button" class="btn btn-secondary btn-sm w-25" onclick="history.back();">Back</button>
        </div>
        <div class="card-body">
            <form class="d-flex flex-column align-items-center" action="<?= base_url('admin/competitions/update' . "/" . $competition->id) ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Competition Name</label>

                    <label for="title"></label><input type="text" name="name" value="<?= $competition->name ?>" class="form-control" id="title">
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Description</label>
                    <label for="title"></label><input type="text" name="description" value="<?= $competition->description ?>" class="form-control" id="title">
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Year Running</label>
                    <label for="title"></label><input type="text" name="yearRunning" value="<?= $competition->yearRunning ?>" class="form-control" id="title">
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Competition Type</label>
                    <label for="title"></label>

                    <!-- php script for showing drop down menu of competition types -->
                    <?php

                    // Connecting to the database
                    $conn = mysqli_connect("localhost", "root", "", "cricket");
                    $result = mysqli_query($conn, "SELECT * FROM nsca_competition_types");

                    ?>

                    <!-- Fetching data from the database and displaying the data as a dropdown menu -->
                    <select id="title" class="form-control" name="competitionType" aria-label="competitionType" aria-describedby="fb" placeholder="Competition Type" value="<?= $competition->competitionType ?>">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-25">Update</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>