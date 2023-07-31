<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container my-5">
    <section class="dark-grey-text text-center">
        <h1 class="display-3 text-center font-weight-bold">Teams</h1>
        <br>

        <!-- Grid row -->
        <div class="row">

            <?php if (!empty($teams) && is_array($teams)): ?>

                <?php foreach ($teams as $team): ?>

                    <!-- Grid column -->
                    <div class="col-md-6 mb-4">
                        <div class="view overlay rounded">
                            <a href="#" class="view-team" data-team="<?= $team->id ?>">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <img src="<?= base_url($team->image) ?>" class="img-thumbnail rounded"
                            style="width: 235px; height: 235px;">

                        <div class="card-body p-4">
                            <input type="hidden" name="team-id" value="<?= $team->id ?>">
                            <button type="button" name="team-button" id="<?= $team->id ?>" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#teamsModal" data-tname="<?= $team->name ?>"
                                data-description="<?= $team->description == null || $team->description == '' ? 'N/A' : $team->description ?>">
                                <?= $team->name ?></button>
                        </div>
                    </div>
                    <!-- Grid column -->

                <?php endforeach; ?>

            <?php endif; ?>

        </div>
        <!-- Grid row -->

    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="teamsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-header"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-newspaper" title="Details"></i>
                        </div>
                        <div class="col-11">
                            <h5>Details</h5>
                            <p id="modal-description"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-solid fa-users" title="Players"></i>
                        </div>
                        <div class="col-11">
                            <h5>Players</h5>
                            <ul id="modal-players" class="list-unstyled"></ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // JavaScript code to update the modal content when a team button is clicked
    document.addEventListener('DOMContentLoaded', function () {
        const teamButtons = document.querySelectorAll('button[name="team-button"]');
        const modalTitle = document.getElementById('modal-header');
        const modalDescription = document.getElementById('modal-description');
        const modalPlayers = document.getElementById('modal-players');

        teamButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const teamID = this.getAttribute('id');
                const teamName = this.getAttribute('data-tname');
                const teamDescription = this.getAttribute('data-description');

                modalTitle.textContent = teamName;
                modalDescription.textContent = teamDescription;
                modalPlayers.innerHTML = '';

                // Fetch team players data from the backend and populate the modal
                fetchPlayers(teamID);
            });
        });

        function fetchPlayers(teamID) {
            $.ajax({
                url: '<?= site_url('teams/players') ?>/' + teamID,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Clear the player list
                    modalPlayers.innerHTML = '';

                    // Check if there are players
                    if (response.length === 0) {
                        const noPlayersListItem = document.createElement('li');
                        noPlayersListItem.textContent = 'No players found for this team.';
                        modalPlayers.appendChild(noPlayersListItem);
                        return;
                    }

                    // Iterate through the players data and add them to the list
                    response.forEach(function (player) {
                        const listItem = document.createElement('li');
                        listItem.textContent = player.first_name + ' ' + player.last_name;
                        modalPlayers.appendChild(listItem);
                    });
                },
                error: function () {
                    alert('Failed to fetch team players.');
                }
            });
        }

    });
</script>

<?= $this->endSection() ?>