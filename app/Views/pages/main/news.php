<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-3">
    <h2 class="text-center">News</h2>
    <hr>
    <?php if (! empty($news) && is_array($news)) : ?>
        <?php foreach ($news as $news_item) : ?>
            <div class="card my-3 text-center col-12 col-lg-8 m-auto" id="<?= esc($news_item->id) ?>">
                <div class="card-header">
                    <?= 'Posted by: ' . esc($news_item->first_name) . ' ' . esc($news_item->last_name) ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= esc($news_item->title) ?></h5>
                    <hr class="w-25 m-auto mb-3">
                    <a href="news/<?= esc($news_item->id) ?>" class="btn btn-primary">View details</a>
                </div>
                <div class="card-footer text-muted"><?= 'Posted on: ' . esc($news_item->created_at) ?></div>
            </div>
        <?php endforeach ?>
    <?php else : ?>
        <h3>No News</h3>
        <p>Unable to find any news for you.</p>
    <?php endif ?>
    <nav class="d-flex justify-content-center">
        <?= $pager->links() ?>
    </nav>
</div>

<?= $this->endSection() ?>