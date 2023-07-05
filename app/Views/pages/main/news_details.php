<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-3">
    <h2 class="text-center"><?= esc($news->title) ?></h2>
    <hr>
    <div class="row gap-2 gap-lg-0">
        <div class="col-12 col-lg-7 d-table-cell">
            <div class="card h-100 shadow">
                <div class="card-header">News details</div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= esc($news->image) ?>" alt="profile" width="100px" height="100px" class="bg-dark rounded-circle mb-2">
                        <h5><?= esc($news->first_name) . ' ' . esc($news->last_name) ?></h5>
                    </div>
                    <hr>
                    <div class="p-3 border rounded">
                        <?= $news->content ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 d-table-cell">
            <div class="card h-100 shadow">
                <div class="card-header">Comments</div>
                <div class="card-body d-flex flex-column gap-2">
                    <?php foreach ($comments as $comment) : ?>
                        <?= view_cell(
                            '\App\Libraries\Contents::comment',
                            [
                                'id'      => esc($comment->id),
                                'img'     => esc($comment->image),
                                'user'    => esc($comment->first_name) . ' ' . esc($comment->last_name),
                                'content' => esc($comment->comment),
                            ]
                        )
                        ?>
                    <?php endforeach ?>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>