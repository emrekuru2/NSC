<div class="d-flex flex-column flex-lg-row min-vh-100">
    <div>
        <?= view_cell('\App\Libraries\Navigations::sidebar') ?>
    </div>

    <div class="flex-lg-grow-1 p-4 bg-light">
        <div class="d-none d-lg-block">
            <h1><?= $title ?></h1>
            <hr>
        </div>
        <?= $this->renderSection('adminContent') ?>
    </div>
</div>