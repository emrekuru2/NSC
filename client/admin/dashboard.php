<?php

    $title = "Admin Dashboard";

    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));

    
    
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


<body class="mb-9">
    <div class="container p-0 mt-3">

        <!-- <h1 style="text-align: center;">COMPONENTS</h1> -->
        <h1 class="display-3 text-center font-weight-bold">Components</h1>

        <!-- Navigation Cards:
            Each card has an icon and text
         -->

        <div class="row mt-3 p-3">
            <!-- 
                This row has:
                1. Edit Alerts Banner
                2. Edit Clubs
                3. Edit Competition Types
                4.Edit Location
             -->
            <div class="col-3 w-20" id="edit-alerts">
                <a href="../admin/editAlertBanner.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-exclamation-triangle-fill bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit Alerts Banner</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="edit-clubs">
                <a href="../admin/editClubInfo.php" style="text-decoration:none">
                    <div class="card" style="height: 8vw;">
                        <i class="fa fa-users fa-2x  m-auto mt-2 mb-2" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit Clubs</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="edit-competition-type">
                <a href="../admin/editCompType.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-grid-fill bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit Competition Types</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="edit-devPrograms">
                <a href="../admin/editDevPrograms.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-mortarboard-fill m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit Development Program</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Second Row  -->
        <div class="row mt-3 p-3">
            <!-- 
                This row has:
                1. Edit Sub Committees
                2. Edit User Roles
                3. Post Announcements
                4. Send Email
             -->
            <div class="col-3 w-20" id="edit-sub-committees">
                <a href="../admin/editSubCommittees.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-boxes bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit Sub Committees</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="edit-user-roles">
                <a href="../admin/editUserRole.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-person-gear bi-2x  m-auto  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Edit User Roles</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="post-announcements">
                <a href="../singleNews.php?new=1" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-megaphone-fill bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Post Announcements</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20" id="send-email">
                <a href="../admin/sendEmail.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-envelope bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Send Email</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Third Row  -->
        <div class="row mt-3 mb-3 d-flex justify-content-center">
            <!-- 
                This row has:
                1. Manage Team Application
                2. Manage Team List
             -->
            <div class="col-3 w-20" id="manage-team-application">
                <a href="../admin/manageApplication.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-newspaper bi-2x  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Manage Team Application</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 w-20 mb-5" id="manage-team-list">
                <a href="../admin/manageTeamList.php" style="text-decoration:none">
                    <div class="card">
                        <i class="bi bi-list-ul bi-2x  m-auto  m-auto" style="font-size: 3vw;"></i>
                        <div class="card-body text-center">
                        <p class="card-text text-dark">Manage Team List</p>
                        </div>
                    </div>
                </a>
            </div>

    </div>
</body>

<?php include "../includes/components/footer.php";?>