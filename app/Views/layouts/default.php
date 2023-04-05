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

</head>

<body>
    <?php if (session()->getFlashdata('alert') !== NULL) : ?>
        <?= view_cell('\App\Libraries\Alerts::toast', ['type' => session()->getFlashdata('alert')['type'], 'content' => session()->getFlashdata('alert')['content']]) ?>
    <?php endif; ?>
    <header>
        <div class="d-none width-100 d-lg-flex justify-content-center align-items-center p-2">
            <img src="/assets/images/General/logo1.png" alt="logo" width="60px">
            <h2>Nova Scotia Cricket Association</h2>
        </div>
        <?= view_cell('\App\Libraries\Navigations::navbar') ?>
    </header>
    <main>
        <?php if (session()->getFlashdata('alert') !== null) : ?>
            <?= view_cell('\App\Libraries\Alerts::toast', ['type' => session()->getFlashdata('alert')['type'], 'content' => session()->getFlashdata('alert')['content']]) ?>
        <?php endif; ?>
        <?= $this->renderSection('mainContent') ?>
    </main>
    <footer class="container-lg text-center my-3">
        <hr />
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-12">
                <img src="/assets/images/General/logo1.png" alt="logo" width="60px">
            </div>
            <div class="col-lg-4 col-sm-12 order-lg-last">
                <ul class="nav justify-content-lg-evenly justify-content-center">
                    <li class="nav-item"><a href="contact" class="nav-link px-2 text-muted">Contact</a></li>
                    <li class="nav-item"><a href="faqs" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="about" class="nav-link px-2 text-muted">About</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-12 order-lg-first">
                <p class="mb-0 text-muted">© 2023 Nova Scotia Cricket Association</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap v5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>