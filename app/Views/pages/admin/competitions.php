<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card h-100 shadow">
            <div class="card-header">Club List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Competition name</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                        <?php if ($competition) : ?>
                            <?php foreach ($competition as $row) : ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>
                                        <a style="margin-right:10px;" href="<?= base_url('admin/competitions/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/competitions/delete/' . $row['id']) ?>" class="btn btn-primary btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card h-100 shadow">
            <div class="card-header">Competition details: </div>
            <div class="card-body text-center">
                <form class="d-flex flex-column align-items-center" <?= base_url('add') ?> method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 20%;" id="name">Name</span>
                        <input type="text" class="form-control" name="name" placeholder="Name" aria-label="name" aria-describedby="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 20%;" id="Description">Description</span>
                        <input type="text" class="form-control" name="description" placeholder="Description" aria-label="Description" aria-describedby="phone">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 20%;" id="YearRunning">Year Running</span>
                        <input type="text" class="form-control" name="yearRunning" placeholder="Year Running" aria-label="yearRunning" aria-describedby="email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 24%;" id="cT">Competition Type</span>

                        <!-- php script for showing drop down menu of competition types -->
                        <?php

                        // Connecting to the database
                        $conn = mysqli_connect("localhost", "root", "", "cricket");
                        $result = mysqli_query($conn, "SELECT * FROM nsca_competition_types");

                        ?>

                        <!-- Fetching data from the database and displaying the data as a dropdown menu -->
                        <select class="form-control" name="competitionType" aria-label="competitionType" aria-describedby="fb" placeholder="Competition Type">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>

                                <option><?php echo $row['name']; ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>