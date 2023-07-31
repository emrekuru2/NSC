<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
  <div class="col-lg-6">
    <div class="card shadow">
      <div class="card-header d-flex">
        <span class="flex-grow-1">Create News</span>
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
            <?= view_cell('EditorCell', ['content' => $currentNews->content ?? null]) ?>
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
      <div class="card-body overflow-auto" style="height: 500px;">
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

    <div class="card shadow">
    <div class>
            <div class="mt-1">
                <div class="card-body">
                    <form method="get" action="<?= current_url() ?>">
                        <div class="form-group">
                            <label for="order_by">Filter:</label>
                            <select class="form-control" name="order_by" id="order_by">
                                <option value="latest" <?= ($orderBy == 'latest') ? 'selected' : '' ?>>Latest News</option>
                                <option value="oldest" <?= ($orderBy == 'oldest') ? 'selected' : '' ?>>Oldest News</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="<?= isset($startDate) ? esc($startDate) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="<?= isset($endDate) ? esc($endDate) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="search_title">Search by Title:</label>
                            <input type="text" class="form-control" name="search_title" id="search_title" value="<?= isset($searchTitle) ? esc($searchTitle) : '' ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Apply Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

  

</div>

<?= $this->endSection() ?>