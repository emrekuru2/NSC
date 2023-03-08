<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="card shadow">
            <div class="card-header">Create development program<b></b></div>
            <div class="card-body">
                <form method="post" action="createDev">
                    <div class="w-100 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                        <div>
                            <div class="w-100">
                                <label for="start_time" class="form-label">Start time:</label>
                                <input type="time" class="form-control" id="start_time" name="start_time">
                            </div>
                            <div class="w-100">
                                <label for="end_time" class="form-label">End time:</label>
                                <input type="time" class="form-control" id="end_time" name="end_time">
                            </div>
                        </div>
                        <div>
                            <div class="w-100">
                                <label for="start_date" class="form-label">Start date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="w-100">
                                <label for="end_date" class="form-label">End date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="w-50 mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="w-100">
                            <label for="days" class="form-label">Days running:</label>
                            <input type="text" class="form-control" id="days" name="days">
                        </div>
                    <div class="w-100">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="description" class="form-label">Program description</label>
                        <textarea class="form-control" id="description" rows="10" name="description""></textarea>
                    </div>
                    <div class="w-50 mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Publish</button>
                </form>
            </div>
        </div>



<?= $this->endSection() ?>