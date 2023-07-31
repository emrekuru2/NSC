<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-3">
    <h1 class="display-3 text-center font-weight-bold">News</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                    <?php if (!empty($news) && is_array($news)) : ?>
                        <?php foreach ($news as $news_item) : ?>
                            <div class="card my-3">
                                <div class="card-header">
                                    <?= 'Posted by: ' . esc($news_item->first_name) . ' ' . esc($news_item->last_name) ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($news_item->title) ?></h5>
                                    <hr class="w-25 ml-0 mb-3">
                                    <a href="news/<?= esc($news_item->id) ?>" class="btn btn-primary">View details</a>
                                </div>
                                <div class="card-footer text-muted"><?= 'Posted on: ' . esc($news_item->created_at) ?></div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <h3>No News</h3>
                        <p>Unable to find any news for you.</p>
                    <?php endif ?>
                </div>
                <nav class="d-flex justify-content-center">
                    <?= $pager->links() ?>
                </nav>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
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
                            <label for="posted_by">Posted By:</label>
                            <select class="form-control" name="posted_by" id="posted_by">
                                <option value="">All</option>
                                <?php foreach ($userList as $user) : ?>
                                    <option value="<?= esc($user->id) ?>" <?= ($postedBy == $user->id) ? 'selected' : '' ?>>
                                        <?= esc($user->first_name . ' ' . $user->last_name) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
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

<?= $this->endSection() ?>
