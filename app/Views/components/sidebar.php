<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <button class="navbar-toggler m-2" type="button" data-bs-toggle="collapse" data-bs-target="#toggle" aria-controls="toggle" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
  <h3 class="navbar-toggler m-2"><?= $title ?></h3>
  <div class="collapse navbar-collapse" id="toggle" style="width: 280px;">
    <div class="w-100 d-flex flex-column p-3 bg-dark text-light vh-100 overflow-auto">
      <div class="d-flex flex-column align-items-center">
        <img src="<?= base_url(auth()->user()->image) ?>" alt="profile" width="100px" height="100px">
        <span class="fs-4"><?= auth()->user()->getFullName() ?></span>
      </div>
      <hr>
      <ul class="nav nav-pills flex-column  ">
        <li class="nav-item">
          <a href="<?= url_to('admin_dashboard') ?>" class="nav-link link-primary text-light <?= ($title === 'Dashboard') ? 'active' : '' ?>"><i class="fa-solid fa-gauge fa-lg me-3 fa-fw"></i>Dashboard</a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="<?= url_to('admin_alerts') ?>" class="nav-link link-primary text-light <?= ($title === 'Alerts') ? 'active' : '' ?>"><i class="fa-solid fa-bell fa-lg me-3 fa-fw"></i>Alerts</a>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_clubs') ?>" class="nav-link link-primary text-light <?= ($title === 'Clubs') ? 'active' : '' ?>"><i class="fa-solid fa-list fa-lg me-3 fa-fw"></i>Clubs</a>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_teams') ?>" class="nav-link link-primary text-light <?= ($title === 'Teams') ? 'active' : '' ?>"><i class="fa-solid fa-people-group fa-lg me-3 fa-fw"></i>Teams</a>
        </li>
        <li class="nav-item">
          <div class="accordion accordion-flush" id="competitionsDrop">
            <div class="accordion-item">
              <div class="accordion-header">
                <button class="accordion-button p-2 px-3 text-light rounded-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCompetitions" aria-expanded="true" aria-controls="collapsCompetitions">
                  <i class="fa-solid fa-chess-king fa-lg me-3 fa-fw"></i>Competitions
                </button>
              </div>
              <div id="collapseCompetitions" class="accordion-collapse <?= ($title === 'Competitions' || $title === 'Competition Types') ? null : 'collapse' ?> " data-bs-parent="#competitionsDrop">
                <div class="accordion-body p-2">
                  <a href="<?= url_to('admin_competitions') ?>" class="nav-link link-primary text-light <?= ($title === 'Competitions') ? 'active' : '' ?>"><i class="fa-solid fa-chess-king fa-lg me-3 fa-fw"></i>Competitions</a>
                  <a href="<?= url_to('admin_competition_types') ?>" class="nav-link link-primary text-light <?= ($title === 'Competition Types') ? 'active' : '' ?>"><i class="fa-solid fa-flask fa-lg me-3 fa-fw"></i>Competition Types</a>
                </div>
              </div>
            </div>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_committees') ?>" class="nav-link link-primary text-light <?= ($title === 'Committees') ? 'active' : '' ?>"><i class="fa-solid fa-users-between-lines fa-lg me-3 fa-fw"></i>Committees</a>
        </li>
        <li class="nav-item">
          <div class="accordion accordion-flush" id="developmentsDrop">
            <div class="accordion-item">
              <div class="accordion-header">
                <button class="accordion-button p-2 px-3 text-light rounded-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDevelopments" aria-expanded="true" aria-controls="collapseDevelopments">
                  <i class="fa-solid fa-book fa-lg me-3 fa-fw"></i>Developments
                </button>
              </div>
              <div id="collapseDevelopments" class="accordion-collapse <?= ($title === 'Developments' || $title === 'Development Types') ? null : 'collapse' ?> " data-bs-parent="#developmentsDrop">
                <div class="accordion-body p-2">
                  <a href="<?= url_to('admin_developments') ?>" class="nav-link link-primary text-light <?= ($title === 'Developments') ? 'active' : '' ?>"><i class="fa-solid fa-book fa-lg me-3 fa-fw"></i>Developments</a>
                  <a href="<?= url_to('admin_development_types') ?>" class="nav-link link-primary text-light <?= ($title === 'Development Types') ? 'active' : '' ?>"><i class="fa-solid fa-flask fa-lg me-3 fa-fw"></i>Development Types</a>
                </div>
              </div>
            </div>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_users') ?>" class="nav-link link-primary text-light <?= ($title === 'Users') ? 'active' : '' ?>"><i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>Users</a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="<?= url_to('admin_news') ?>" class="nav-link link-primary text-light <?= ($title === 'News') ? 'active' : '' ?>"><i class="fa-solid fa-bullhorn fa-lg me-3 fa-fw"></i>News</a>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_emails') ?>" class="nav-link link-primary text-light <?= ($title === 'Email') ? 'active' : '' ?>"><i class="fa-solid fa-envelope fa-lg me-3 fa-fw"></i>Emails</a>
        </li>
        <li class="nav-item">
          <a href="<?= url_to('admin_settings') ?>" class="nav-link link-primary text-light <?= ($title === 'Settings') ? 'active' : '' ?>"><i class="fa-solid fa-gear fa-lg me-3 fa-fw"></i>Settings</a>
        </li>
      </ul>
      <hr>
      <div class="nav nav-pills d-flex gap-1">
        <div class="nav-item flex-grow-1">
          <a href="<?= url_to('main_clubs') ?>" class="btn btn-outline-primary w-100" role="button"><i class="fa-solid fa-house fa-lg pe-3"></i>Home</a>
        </div>
        <div class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logout"><i class="fa-solid fa-right-from-bracket fa-lg"></i> </button>
        </div>
      </div>
      <?= view_cell('\App\Libraries\Alerts::modal', ['content' => 'Are you sure you want to log out?', 'id' => 'logout', "action" => url_to('logout')]) ?>
    </div>
  </div>
</nav>