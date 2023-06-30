<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="card shadow">
    <div class="card-header p-0">
        <ul class="nav nav-tabs" id="settingsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">Email</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="database-tab" data-bs-toggle="tab" data-bs-target="#database" type="button" role="tab" aria-controls="database" aria-selected="false">Database</button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="settingsTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><?= view_cell("App\Libraries\Settings::profileSettings", ['user' => $user])?></div>
            <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab" tabindex="0">...</div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>