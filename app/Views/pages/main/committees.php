<?= $this->extend('layouts/default') ?>
<?= $this->section('mainContent') ?>

<div class="container my-5">

    <!-- Section: Block Content -->

    <section class="dark-grey-text text-center">

        <h1 class="display-3 text-center font-weight-bold">Committees</h1>

        <!-- Grid row -->

        <div class="row">

            <?php if (!empty($committees) && is_array($committees)) : ?>

                <?php foreach ($committees as $committee) : ?>

                    <!-- Grid column -->

                    <div class="col-md-6 mb-4">

                        <div class="view overlay rounded">

                            <a href="#" class="view-committee" data-committee="<?= $committee->id ?>">

                                <div class="mask rgba-white-slight"></div>

                            </a>

                        </div>

                        <img src="<?= esc($committee->image) ?>" class="img-thumbnail rounded w-15% h-15%">

                        <div class="px-3 pt-3 mx-1 mt-1 pb-0">

                            <h4 class="font-weight-bold mb-3"><?= esc($committee->name) ?>(<?= esc($committee->years) ?>)</h4>

                            <p><?= esc($committee->description) ?></p>

                            <button type="button" class="btn btn-primary view-committee" data-committee="<?= $committee->id ?>">View</button>

                        </div>

                    </div>

                    <!-- Grid column -->

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </section>

    <!-- Section: Block Content -->

</div>

<!-- Committee Details Modal -->

<div class="modal fade" id="committeeDetailsModal" tabindex="-1" role="dialog" aria-labelledby="committeeDetailsModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="committeeDetailsModalLabel">Committee Details</h5>

            </div>

            <div class="modal-body">

                <div id="committeeDetailsContent"></div>

                <h4>Members:</h4>

                <ul id="membersList"></ul>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" id="closeButton">Close</button>

                <button type="button" class="btn btn-primary" id="goToHomeButton">Go To Home</button>

            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

   $(document).ready(function() {

    $('.view-committee').on('click', function(e) {

        e.preventDefault();

        var committeeId = $(this).data('committee');


        // Ajax request to fetch committee details

        $.ajax({

            url: '<?= site_url('committees/view') ?>/' + committeeId,

            type: 'GET',

            dataType: 'json',

            success: function(response) {

                var committee = response.committee;

                var members = response.members;

                // Update the modal content with committee details

                $('#committeeDetailsModalLabel').text(committee.name);

                $('#committeeDetailsContent').html('<p>' + committee.description + '</p>');

                // Clear and populate the members list

                var membersList = $('#membersList');

                membersList.empty();

                members.forEach(function(member) {

                    var listItem = $('<li>' + member.first_name + '</li>');

                    membersList.append(listItem);

                });


                // Show the modal

                $('#committeeDetailsModal').modal('show');

            },

            error: function() {

                alert('Failed to fetch committee details.');

            }

        });

    });

    // Attach click event listener to "Close" button

    $('#closeButton').on('click', function() {

        $('#committeeDetailsModal').modal('hide');

    });

    // Attach click event listener to "Go To Home" button

    $('#goToHomeButton').on('click', function() {

        window.location.href = '/';

    });

    // Handle modal close event

    $('#committeeDetailsModal').on('hidden.bs.modal', function () {

        // Clear modal content when the modal is closed

        $('#committeeDetailsModalLabel').text('');

        $('#committeeDetailsContent').html('');

        $('#membersList').empty();

    });

});

</script>

<?= $this->endSection() ?>