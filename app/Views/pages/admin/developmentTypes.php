<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="col-lg-12 mb-4">
    <div class="card shadow">
        <div class="card-header">Create Program Type</div>
        <div class="card-body">
            <form method="post" action="createProgType">
                <div class="w-100 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="min_age" class="form-label">Minimum Age</label>
                        <input type="number" class="form-control" id="min_age" name="min_age">
                    </div>
                    <div class="col-6">
                        <label for="max_age" class="form-label">Maximum Age</label>
                        <input type="number" class="form-control" id="max_age" name="max_age">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary w-100">Create</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>