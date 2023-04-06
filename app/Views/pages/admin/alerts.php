<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header">Alert Card: <b>2</b></div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center">
                    <div class="w-100 mb-3">
                        <label for="title" class="form-label">Alert title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Alert content</label>
                        <textarea class="form-control" id="content" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-50">Create new alert</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row-lg">
            <div class="col-lg-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">Current Alert</div>
                    <div class="card-body d-flex">
                        <h2 class="card-title flex-grow-1"><?= ($active !== null) ? esc($active->title) : 'No alert is active' ?></h2>
                        <a class="btn btn-outline-danger">Disable</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Alert List</div>
                    <div class="card-body">
                        <form method="post" action="setAlert" class="d-flex flex-column align-items-center gap-3 ">
                            <ul class="list-group w-100">
                                <?php if (isset($alerts)) : ?>
                                    <?php foreach ($alerts as $alert) : ?>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?= $alert->id ?>" id="<?= $alert->id ?>">
                                                <label class="form-check-label" for="<?= $alert->id ?>"><?= $alert->title ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <span>There are no alerts</span>
                                <?php endif ?>
                            </ul>
                            <button type="submit" class="btn btn-primary w-50">Set the current alert</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>