<div class="card d-flex" id="<?= $id ?>">
    <div class="card-body d-flex flex-row gap-1 align-items-center">
        <?php if (!empty($img)) : ?>
            <img src="<?= base_url(esc($img)) ?>" width="25px" height="25px" class="bg-dark rounded-circle">
        <?php endif; ?>
        <p class="align-middle m-0">
            <b><?= esc($user) ?>:</b>
            <?= esc($content) ?>
        </p>
    </div>
</div>
