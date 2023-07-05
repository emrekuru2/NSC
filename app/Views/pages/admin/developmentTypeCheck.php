<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="col-lg-8">
    <div class="card shadow">
        <div class="card-header">Development Type Details:
            <button style="float:right;" type="button" class="btn btn-secondary btn-sm w-25" onclick="history.back();">Back</button>
        </div>
        <div class="card-body">
            <?php foreach ($devType as $devType): ?>
                <form class="d-flex flex-column align-items-center" action="<?= base_url('admin/developmentTypes/update'.$devType->id) ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-100 mb-3">      
                        <label for="content" class="form-label">Development Name</label>
                        <label for="title"></label><input type="text" name="name" value="<?= $devType->name ?>" class="form-control" id="title" readonly>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Description</label>
                        <label for="title"></label><input type="text" name="description" value="<?= $devType->description ?>" class="form-control" id="title" readonly>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
