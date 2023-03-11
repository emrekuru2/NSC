<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

    <?php if (!empty($clubs) && is_array($clubs)) : ?>

        <?php foreach ($clubs as $clubs_item) : ?>

            <h3><?= esc($clubs_item['Name']) ?></h3>

            <div class="main">
                <a><?= esc($clubs_item['Website']) ?></a>
                <img src="<?= esc($clubs_item['TeamImage']) ?>">
            </div>
            <p>View article</p>

        <?php endforeach ?>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any clubs for you.</p>

    <?php endif ?>

<?= $this->endSection() ?>