<?= $this->extend('layouts/admin') ?>
<?= $this->section('adminContent') ?>
<div class="row g-4">
    <div class="col-lg-5">
        <div class="row-lg">
            <!-- Current Alert -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow">
                    <div class="card-header"><i class="fa-solid fa-bell"></i> Current Alert</div>
                    <div class="card-body">
                        <?php
                        if (isset($active)) : ?>
                            <?= form_open(url_to('admin_disable_alert', $active->id ?? null), ['class' => 'd-flex']) ?>
                            <h4 class="card-title flex-grow-1"><?= $active->title ?></h4>
                            <button class="btn btn-outline-danger" type="submit" <?= isset($active) ?>>Disable</button>
                            <?= form_close() ?>
                        <?php else : ?>
                            <h4 class="card-title flex-grow-1 text-muted">No alert is active</h4>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <!-- All Alerts -->
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center">
                        <span class="flex-grow-1"><i class="fa-solid fa-list"></i> Alerts List</span>
                        <?= view_cell('\App\Libraries\Contents::search', ['array' => $alerts, 'fields' => ['title'], 'type' => 'alerts']) ?>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($alerts)) : ?>
                            <?= form_open(url_to('admin_enable_alert'), ['class' => 'd-flex flex-column align-items-center']) ?>
                            <table class="table table-hover table-striped align-middle m-0 ">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="px-3">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-end px-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alerts as $alert) : ?>
                                        <tr <?= isset($currentAlert) ? (($currentAlert->title === $alert->title) ? 'class="table-success"' : null) : null ?>>
                                            <th scope="row" class="px-3"><input class="form-check-input" type="radio" name="flexRadioDefault" value="<?= $alert->id ?>" id="<?= $alert->id ?>"></th>
                                            <td><a class="text-decoration-none" href="<?= url_to('admin_read_alert', $alert->title) ?>"><b><?= $alert->title ?></b></a></td>
                                            <td> <?= character_limiter($alert->content, 20); ?></td>
                                            <td class="text-end px-3">
                                                <div class="btn-group dropend">
                                                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete' . $alert->id ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?= view_cell('\App\Libraries\Alerts::modal',  ['content' => 'Are you sure you want to delete ' . $alert->title, 'id' => 'delete' . $alert->id, "action" => url_to('admin_delete_alert', $alert->id)]) ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary w-50 my-3">Set selected alert</button>
                            <?= form_close() ?>
                        <?php else : ?>
                            <h4 class="text-muted text-center">There are no alerts to show</h4>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Alert or Update Alert -->
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentAlert)) : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Alert Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit mode</label>
                    </div>
                    <a href="<?= url_to('admin_alerts') ?>" role="button" class="btn btn-primary"><i class="fa-solid fa-broom"></i> Clear</a>
                <?php else : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create Alert</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open(isset($currentAlert) ? url_to('admin_update_alert', $currentAlert->id) : url_to('admin_create_alert'), ['class' => 'd-flex flex-column align-items-center', 'id' => 'editForm']) ?>
                <div class="w-100 mb-3">
                    <label for="title" class="form-label">Title <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <?= form_input(['class' => 'form-control', 'name' => 'title', 'id' => 'title', 'required' => true], $currentAlert->title ?? '') ?>
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Content <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <?= form_textarea(['class' => 'form-control', 'name' => 'content', 'id' => 'content', 'rows' => 15, 'required' => true, 'style' => "resize:none"], $currentAlert->content ?? '') ?>
                </div>
                <button type="submit" class="btn btn-primary w-50"><?= isset($currentAlert) ? "Update" : "Create" ?> alert</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentAlert), 'parent' => 'editForm']) ?>
<?= $this->endSection() ?>