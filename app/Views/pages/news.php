<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

    <div class="container my-3">
        <h2 class="text-center">News</h2>
        <hr>
        <?php if (!empty($news) && is_array($news)) : ?>
            <?php foreach ($news as $news_item) : ?>
                <div class="card my-3">
                    <div class="card-header">
                        <?= esc($news_item['Title']) ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text"><?= esc($news_item['Content']) ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
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


