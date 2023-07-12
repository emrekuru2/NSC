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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/assets/css/mainStyles.css">
    <!-- Bootstrap v5.3 JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <?php if (session()->getFlashdata('toast') !== NULL) : ?>
        <?= view_cell('\App\Libraries\Alerts::toast', ['type' => session()->getFlashdata('toast')['type'], 'content' => session()->getFlashdata('toast')['content']]) ?>
    <?php endif; ?>
    <header>
        <div class="d-none width-100 d-lg-flex justify-content-center align-items-center p-2">
            <img src="/assets/images/General/logo1.png" alt="logo" width="60px">
            <h2>Nova Scotia Cricket Association</h2>
        </div>
        <?= view_cell('\App\Libraries\Navigations::navbar') ?>
    </header>
    <main>
        <?php if (session()->get('alert')) : ?>
            <div class="alert alert-warning m-2" role="alert">
                <strong><?= session()->get('alert')['title'] ?>:</strong>
                <?= session()->get('alert')['content'] ?>
            </div>
        <?php endif ?>
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
</body>

</html>