<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
        <h3 class="navbar-toggler m-2 "><?= $title ?></h3>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Home') ? "active" : "" ?>" aria-current="page" href="/"><i class="fa-solid fa-house me-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Clubs') ? "active" : "" ?>" href="/clubs"><i class="fa-solid fa-list me-2"></i>Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Teams') ? "active" : "" ?>" href="/teams"><i class="fa-solid fa-people-group me-2"></i>Teams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Committees') ? "active" : "" ?>" href="/committees"><i class="fa-solid fa-chalkboard-user me-2"></i>Committees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Development') ? "active" : "" ?>" href="/development"><i class="fa-solid fa-book me-2"></i>Development Programs</a>
                </li>
            </ul>
            <hr class="text-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'News') ? "active" : "" ?>" href="/news"><i class="fa-solid fa-newspaper me-2"></i>News</a>
                </li>
                <?php if (auth()->loggedIn()) : ?>
                    <div class="vr text-light d-lg-block d-none"></div>
                    <hr class="text-light d-lg-none d-block">
                    <?php if (auth()->user()->inGroup('admin')) : ?>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?= auth()->user()->image ?>" width="20px" height="20px" class="bg-dark rounded-circle" alt="profile_img">
                                <span><?= auth()->user()->first_name ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="/settings">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php elseif (auth()->user()->inGroup('manager')) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == 'My Club') ? "active" : "" ?>" href="/development">My Club</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == 'Manage Team') ? "active" : "" ?>" href="/development">Manage Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?= auth()->user()->image ?>" width="20px" height="20px" class="bg-dark rounded-circle" alt="profile_img">
                                <span><?= auth()->user()->first_name ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/settings">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php elseif (auth()->user()->inGroup('player')) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == 'Player Profile') ? "active" : "" ?>" href="/development">Player Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == 'My Team') ? "active" : "" ?>" href="/development">My Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?= auth()->user()->image ?>" width="20px" height="20px" class="bg-dark rounded-circle" alt="profile_img">
                                <span><?= auth()->user()->first_name ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/settings">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php elseif (auth()->user()->inGroup('umpire')) : ?>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?= auth()->user()->image ?>" width="20px" height="20px" class="bg-dark rounded-circle" alt="profile_img">
                                <span><?= auth()->user()->first_name ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/settings">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php elseif (auth()->user()->inGroup('guest')) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == 'Join Club') ? "active" : "" ?>" href="/club_join">Join Club</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle d-flex flex-row align-items-center gap-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?= auth()->user()->image ?>" width="20px" height="20px" class="bg-dark rounded-circle" alt="profile_img">
                                <span><?= auth()->user()->first_name ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/settings">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>