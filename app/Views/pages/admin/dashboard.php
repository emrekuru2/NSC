<?= $this->extend("layouts\admin") ?>

<?= $this->section("adminContent") ?>

<div class="row text-center">
    <div class="col">
        <div class="card text-bg-success shadow">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h2 class="card-title">10</h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-primary shadow">
            <div class="card-header">Total Players</div>
            <div class="card-body">
                <h2 class="card-title">8</h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-secondary shadow">
            <div class="card-header">Total Clubs</div>
            <div class="card-body">
                <h2 class="card-title">2</h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-danger shadow">
            <div class="card-header">Total Teams</div>
            <div class="card-body">
                <h2 class="card-title">2</h2>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-6">
        <div class="card h-100 shadow">
            <div class="card-header">Recent Activity</div>
            <div class="card-body">
                <div class="timeline">
                    <div class="tl-item active">
                        <div class="tl-dot b-warning"></div>
                        <div class="tl-content">
                            <div class="">@twitter thanks for you appreciation and @google thanks for you appreciation</div>
                            <div class="tl-date text-muted mt-1">13 june 18</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-primary"></div>
                        <div class="tl-content">
                            <div class="">Do you know how Google search works.</div>
                            <div class="tl-date text-muted mt-1">45 minutes ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-danger"></div>
                        <div class="tl-content">
                            <div class="">Thanks to <a href="#" data-abc="true">@apple</a>, for iphone 7</div>
                            <div class="tl-date text-muted mt-1">1 day ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-danger"></div>
                        <div class="tl-content">
                            <div class="">Order placed <a href="#" data-abc="true">@eBay</a> you will get your products</div>
                            <div class="tl-date text-muted mt-1">1 Week ago</div>
                        </div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot b-warning"></div>
                        <div class="tl-content">
                            <div class="">Learn how to use <a href="#" data-abc="true">Google Analytics</a> to discover vital information about your readers.</div>
                            <div class="tl-date text-muted mt-1">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card h-100 shadow">
            <div class="card-header">Player Waitlist</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Team to join</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>yes/no</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>yes/no</td>

                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>Otto</td>
                            <td>yes/no</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>