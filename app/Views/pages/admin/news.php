<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow h-100">
        <div class="card-header d-flex">
          <span class="flex-grow-1">Alert Details</span>
          <?php if ($editMode) : ?>
            <a href="<?= base_url(url_to('admin_news')) ?>" role="button">Return back</a>
          <?php endif ?>
        </div>
        <div class="card-body">
          <form method="post" action="<?= $editMode ?  url_to('admin_update_news', $currentNews->id) : url_to('admin_create_news') ?>">
            <div class="form-group mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" value="<?= $editMode ? $currentNews->title : null ?>">
            </div>
            <div class="form-group mb-3">
              <?= view_cell('\App\Libraries\Contents::editor', [$editMode ? $currentNews->content : null]) ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"><?= $editMode ? "Update" : "Submit" ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow">
        <div class="card-header">News List</div>
        <div class="card-body overflow-auto" style="max-height: 570px;">
          <div class="list-group">
            <?php if (!empty($news) && is_array($news)) : ?>
              <?php foreach ($news as $news_item) : ?>
                <a class="list-group-item">
                  <h5 class="card-title"><?= esc($news_item->title) ?></h5>
                  <div class="card-footer text-muted"><?= 'Posted on: ' . esc($news_item->created_at) ?></div>
                  <div class="text-center">
                    <a class="btn btn-secondary m-2" href="<?= url_to('admin_edit_news', $news_item->id) ?>" role="button">Edit</a>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="text-center">
                <h3>No News</h3>
                <p>Unable to find any news for you.</p>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>