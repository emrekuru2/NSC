<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex">
                <span class="flex-grow-1">Alert Details</span>
                <?php if ($editMode) : ?>
                    <a href=<?= base_url('admin/alerts') ?> role="button">Return back</a>
                <?php endif ?>
            </div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center" method="post" action="<?= $editMode ? base_url('admin/updateAlert/' . $currentAlert->id) : base_url('admin/createAlert') ?>">
                    <div class="w-100 mb-3">
                        <label for="title" class="form-label">Alert title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $editMode ? $currentAlert->title : null ?>">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Alert content</label>
                        <textarea class="form-control" id="content" name="content" rows="10"><?= $editMode ? $currentAlert->content : null ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-50"><?= $editMode ? "Update" : "Create" ?> the alert</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row-lg">
            <div class="col-lg-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">Current Alert</div>
                    <div class="card-body">
                        <form class="d-flex" method="post" action="disable/<?= $active->id ?? null ?>">
                            <h2 class="card-title flex-grow-1"><?= $active->title ?? 'No alert is active' ?></h2>
                            <button class="btn btn-outline-danger" type="submit" <?= isset($active) ? '' : "disabled='disabled'" ?>>Disable</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Alert List</div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/setAlert') ?>" class="d-flex flex-column align-items-center gap-3 ">
                            <ul class="list-group w-100">
                                <?php if (isset($alerts)) : ?>
                                    <?php foreach ($alerts as $alert) : ?>
                                        <li class="list-group-item">
                                            <div class="form-check d-flex">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?= $alert->id ?>" id="<?= $alert->id ?>">
                                                <label class="form-check-label mx-1 flex-grow-1" for="<?= $alert->id ?>"><?= $alert->title ?></label>
                                                <div class="">
                                                    <a class="btn btn-primary" href=<?= base_url('admin/editAlert/' . $alert->id) ?> role="button">Edit</a>
                                                    <a class="btn btn-danger" href=<?= base_url('admin/deleteAlert/' . $alert->id) ?>>Delete</a>
                                                </div>
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