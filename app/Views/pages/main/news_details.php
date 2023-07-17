<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-3">
    <!-- <h1 class="display-3 text-center font-weight-bold">News Details</h1> -->
    <div class="row gap-2 gap-lg-0">
        <div class="col-12">
            <div class="text-center">
                <?php if (!empty($news->image)) : ?>
                    <img src="<?= base_url(esc($news->image)) ?>" alt="profile" width="100px" height="100px" class="bg-dark rounded-circle mb-2">
                <?php endif; ?>
                <h5><?= "Posted By : ". esc($news->first_name) . ' ' . esc($news->last_name) ?></h5>
            </div>
        </div>
        <div class="col-12 col-lg-7 d-table-cell">
            <div class="card h-100 shadow">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold" style="margin-top: -5px;">News Details</span>
                        <span class="text-muted">Posted on: <?= esc($news->created_at) ?></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h5><?= esc($news->title) ?></h5>
                    </div>
                    <hr>
                    <div class="p-3 border rounded">
                        <?= $news->content ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 d-table-cell">
            <div class="card h-100 shadow">
                <div class="card-header"> Comments </div>
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
