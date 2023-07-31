<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<?php if (session()->getFlashdata('toast')) : 
        $toast = session()->getFlashdata('toast'); ?>
        <div id="emailToast" class="toast bottom-0 end-0 m-2 position-fixed text-bg-<?= $toast['type'] ?> " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= $toast['content'] ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        <script type='text/javascript' src="/assets/js/toast.js"></script>
    <?php endif ?>
<div class="card shadow">
  <div class="card-header p-0">
    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="true">Profile</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab"
          aria-controls="email" aria-selected="false">Email</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="database-tab" data-bs-toggle="tab" data-bs-target="#database" type="button"
          role="tab" aria-controls="database" aria-selected="false">Database</button>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="settingsTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <?= view_cell("SettingsCell", ['tab' => 'profile'])?></div>
      <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab" tabindex="0">...</div>
      <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab" tabindex="0">
        <table class="table table-hover table-striped align-middle table-bordered display">
          <thead>
            <tr>
              <th scope="col">File Name</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($fileData)): ?>
            <?php foreach ($fileData as $file): ?>
            <tr>
              <td><?= $file['filename']; ?></td>
              <td><?= $file['date']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="2">No backup files found</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
        <a type="button" class="btn btn-primary" href="<?= url_to("admin_settings_db_backup")?>">Database Backup</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>