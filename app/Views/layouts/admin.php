<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Bootstrap v5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
    <main class="d-flex">
        <?php if (session()->getFlashdata('alert') !== null) : ?>
            <?= view_cell('\App\Libraries\Alerts::toast', ['type' => session()->getFlashdata('alert')['type'], 'content' => session()->getFlashdata('alert')['content']]) ?>
        <?php endif; ?>
        <aside class="col-12 col-lg-2 position-fixed nav-z">
            <?= view_cell('\App\Libraries\Navigations::sidebar') ?>
        </aside>
        <section class="col-12 col-lg-10 offset-lg-2 p-4 custom-margin">
            <div class="d-none d-lg-block">
                <h1><?= $title ?></h1>
                <hr>
            </div>
            <?= $this->renderSection('adminContent') ?>
        </section>
    </main>
    <!-- Bootstrap v5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>