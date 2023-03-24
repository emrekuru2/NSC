<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="col-lg-8">
    <div class="card shadow">
        <div class="card-header">Create Competition Type:
            <button style="float:right;" type="button" class="btn btn-secondary btn-sm w-25" onclick="history.back();">Back</button>
        </div>
        <div class="card-body">
            <!-- <a type="button" href="<?php redirect()->back() ?>" class="btn btn-primary w-25">Back</a> -->

            <form class="d-flex flex-column align-items-center" action="<?= base_url('admin/CompetitionType/update' . "/" . $competitionType['id']) ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Competition Type Name</label>

                    <label for="title"></label><input type="text" name="name" value="<?= $competitionType['name'] ?>" class="form-control" id="title">
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="content" rows="10"><?= $competitionType['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-25">Update</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>