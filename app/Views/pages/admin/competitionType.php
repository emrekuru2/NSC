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
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">

            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Competition Type List</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Competiton Type Name</th>
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
                                <?php if ($competitionType) : ?>
                                    <?php foreach ($competitionType as $row) : ?>
                                        <tr>
                                            <td><a href="<?= base_url('admin/CompetitionType/check/' . $row['id']) ?>"><?php echo $row['name'] ?></a></td>
                                            <td style=" display:flex;">
                                                <a style="margin-right:10px;" href="<?= base_url('admin/CompetitionType/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="<?= base_url('admin/CompetitionType/delete/' . $row['id']) ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Competition Type?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">Create Competition Type: </div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center" <?= base_url('add') ?> method="POST">
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Competition Type Name</label>
                        <label for="title"></label><input type="text" name="name" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="content" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Create</button>
                </form>
            </div>
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