<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">Create Competition Type: </div>
            <div class="card-body">
                <a type="button" href="<?php  redirect()->back() ?>" class="btn btn-primary w-25">Back</a>

                <form class="d-flex flex-column align-items-center" action="<?= base_url('admin/competitions/update'."/".$competition['id'])?>" method="POST">
                    <input type="hidden" name="_method" value = "PUT">
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Competition Name</label>

                        <label for="title"></label><input type="text" name="name" value="<?= $competition['name']?>" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Description</label>
                        <label for="title"></label><input type="text" name="description" value="<?= $competition['description']?>" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Year Running</label>
                        <label for="title"></label><input type="text" name="yearRunning" value="<?= $competition['yearRunning']?>" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Competition Type</label>
                        <label for="title"></label><input type="text" name="competitionType" value="<?= $competition['competitionType']?>" class="form-control" id="title">
                    </div>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>