<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">Create news</div>
            <div class="card-body">
                <form method="post" action="createNews">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <?= view_cell('\App\Libraries\Contents::editor') ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
                <?=  auth()->user()->first_name ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>