<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>


<div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <?= view_cell('\App\Libraries\Contents::list', ['title' => $title, 'rows' => $teams, 'users' => $users]); ?>
    </div>

    <div class="col-sm-8">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>