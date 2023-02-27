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
                    <a class="nav-link <?= ($title == 'Teams') ? "active" : "" ?>"  href="/teams"><i class="fa-solid fa-people-group me-2"></i>Teams</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>