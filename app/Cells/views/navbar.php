<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
        <h3 class="navbar-toggler m-2 "><?= $title ?></h3>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Home') ? 'active' : '' ?>" aria-current="page" href="<?= url_to('main_homepage') ?>"><i class="fa-solid fa-house me-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Clubs') ? 'active' : '' ?>" href="<?= url_to('main_clubs') ?>"><i class="fa-solid fa-list me-2"></i>Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Teams') ? 'active' : '' ?>" href="<?= url_to('main_teams') ?>"><i class="fa-solid fa-people-group me-2"></i>Teams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Committees') ? 'active' : '' ?>" href="<?= url_to('main_committees') ?>"><i class="fa-solid fa-chalkboard-user me-2"></i>Committees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Development') ? 'active' : '' ?>" href="<?= url_to('main_developments') ?>"><i class="fa-solid fa-book me-2"></i>Development Programs</a>
                </li>
            </ul>
            <hr class="text-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'News') ? 'active' : '' ?>" href="<?= url_to('main_news') ?>"><i class="fa-solid fa-newspaper me-2"></i>News</a>
                </li>
                <?php if ($isLoggedIn) : ?>
                    <div class="vr text-light d-lg-block d-none"></div>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === 'Join Club') ? 'active' : '' ?>" href="/join">Join Club</a>
                    </li>
                    <div class="vr text-light d-lg-block d-none"></div>
                    <?php foreach ($groups as $group) : ?>
                        <?php if ($user->inGroup($group)) : ?>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" role="button">
                                    <img src="<?= $user->image ?>" alt="Profile Image" class="bg-dark rounded-circle" width="20" height="20" /> 
                                    <span><?= $user->getFullName() ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <?php if ($group !== 'admin' && $group !== 'manager') : ?>
                                        <li><a class="dropdown-item" href="<?= url_to($group .'_profile') ?>">My Profile</a></li>
                                    <?php else : ?>
                                        <li><a class="dropdown-item" href="<?= url_to($group . '_dashboard') ?>">Dashboard</a></li>
                                    <?php endif ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= url_to('logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else : ?>
                    <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>