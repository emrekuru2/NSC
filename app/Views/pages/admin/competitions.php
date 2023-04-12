<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<!-- Style for the deletion success alert -->
<style>
    .alert {
        padding: 10px;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        width: 400px;

    }

    .alert.success {
        background-color: #4CAF50;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0" style="width:50%">
        <div class="card h-100 shadow">
            <div class="card-header">Competition List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Competition Name</th>
                            <th scope="col">Competition Type</th>
                            <th scope="col">Year Running</th>
                        </tr>
                    </thead>
                    <?php
                    if (session()->getFlashdata('status')) {
                    ?>
                        <div style="width:90%" id="alertMessage" class=" alert success">
                            <span class="closebtn" onclick="closeAlert()">×</span>
                            <strong>Success!</strong> Your Request Processed successfully.
                        </div>
                    <?php
                    }
                    ?>
                    <tbody class="table-group-divider">
                        <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                        <?php if ($competition) : ?>
                            <?php foreach ($competition as $row) :
                                $id = $row->typeID;
                                
                                if ($competitionType) :
                                    foreach ($competitionType as $innerRow) :
                                        $competitionTypeID = $innerRow['id'];
                                        if ($competitionTypeID == $id) :
                                            $competitionTypeName = $innerRow['name'];
                                        endif;
                                    endforeach;
                                endif;
                            ?>
                                <tr>
                                    <td><a href="<?= base_url('admin/competitions/check/' . $row->id) ?>"><?php echo $row->name ?></a></td>
                                    <td><?php echo $competitionTypeName ?></td>
                                    <td><?php echo $row->yearRunning ?></td>
                                    <td style=" display:flex;">
                                        <a style="margin-right:10px;" href="<?= base_url('admin/competitions/edit/' . $row->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/competitions/delete/' . $row->id) ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Competition?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=" col-lg-8" style="width:50%">
        <div class="card h-100 shadow">
            <div class="card-header">Create Competition:</div>
            <div class="card-body text-center">
                <form class="d-flex flex-column align-items-center" <?= base_url('add') ?> method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 20%;" id="name">Name</span>
                        <input type="text" class="form-control" name="name" placeholder="Name" aria-label="name" aria-describedby="name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 25%;" id="Description">Description</span>
                        <input type="text" class="form-control" name="description" placeholder="Description" aria-label="Description" aria-describedby="phone">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 25%;" id="YearRunning">Year Running</span>
                        <input type="text" class="form-control" name="yearRunning" placeholder="Year Running" aria-label="yearRunning" aria-describedby="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 32%;" id="cT">Competition Type</span>

                        <!-- Fetching data from the database and displaying the data as a dropdown menu -->
                        <select class="form-control" name="competitionType" aria-label="competitionType" aria-describedby="fb" placeholder="Competition Type">
                            <?php
                                if ($competitionType) :
                                    foreach ($competitionType as $innerRow) :
                            ?>

                                <option value="<?php echo $innerRow['id']; ?>"><?php echo $innerRow['name']; ?></option>

                            <?php
                                    endforeach;
                                endif;
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to close the deletion successful message -->
<script>
    function closeAlert() {
        document.getElementById("alertMessage").style.display = 'none';
    }
</script>

<?= $this->endSection() ?>