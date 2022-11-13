<?php
    $title = "Manage Teams";
    include_once 'includes/components/header.php';
    Include_once 'includes/functions/security.php';
?>

<link rel="stylesheet" type="text/css" href="../../css/manageTeam.css">
<!-- change css ad js to bootstrap5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<body>
    <div class="container my-5">
        <!-- Search bar  -->
        <div class="search-bar">
            <form class="form-inline d-flex  justify-content-center" id= "search-form">
                <div class="input-group w-75git">
                    <input class="form-control w-75 mt-1" type="search" placeholder="Search Player" aria-label="Search" id="bar-search-player">
                    <button class="btn btn-secondary mt-1">
                        <i class="fas fa-search"></i>
                    </button>  
                </div>

                <!-- <button type="button" class="btn btn-primary" id="btn-unassigned-player">Unassigned Players</button> -->
            </form>
        </div>

        <!-- 3 functional buttons:
                    1. Exchange
                    2. Add
                    3. Remove player -->
        <div class = "buttons d-flex justify-content-end mt-3">
            <button type="button" pButton class="btn btn-dark ml-3" data-toggle="modal" data-target="#pop-up" id="btn-exchange-player"><i class="fa fa-exchange-alt fa-lg"></i></button>
            <button type="button" class="btn btn-info ml-3" id="btn-add-player"><i class="fa fa-plus fa-lg"></i></button>
            <button class="btn btn-danger ml-3" id="btn-remove-player"><i class="fa fa-times fa-lg"></i></button>
        </div>

        <!-- Team Cards: 
            Each Team card has a scroll bar, team name, player list
        -->

        <div class="card mt-4" id="team-1">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-2">Team 1</h5>  
                <div class="card-text" id="player-list">
        
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>                  
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                </div>      
            </div>  
        </div>

        <div class="card mt-4" id="team-2">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Team 2</h5>  
                <div class="card-text" id="player-list">
                <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>                  
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                </div>      
            </div>  
        </div>

        <div class="card mt-4" id="team-3">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Team 3</h5>  
                <div class="card-text" id="player-list">
                <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>                  
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                </div>      
            </div>  
        </div>

        <div class="card mt-4" id="team-3">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Unassigned</h5>  
                <div class="card-text" id="player-list">
                <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>                  
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" value="" id="Player1" />
                        <label class="form-check-label fs-6" for="Player1"><strong>Player</strong></label>
                        <p>player info/team name if needed</p>
                    </div>
                </div>      
            </div>  
        </div>

        <!-- Pop-up window for player exchange-->
        <div class="modal fade" id="pop-up" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pop-upLabel">Exchange Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline my-2 my-lg-0 d-flex justify-content-center container" id= "search-form">
                        <!-- Player Name input-->
                        <div class="row mb-2">
                            <div class="col-5">
                                <label for="PlayerSearch">Player Name:</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" type="search" style="width: 100%" placeholder="Search Player" aria-label="Search" id="PlayerSearch">
                            </div>
                        </div>
                        <!-- New Team input -->
                        <div class="row">
                            <div class="col-5">
                                <label for="newTeam"> New Team: </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" list="select-team" id="newTeam" placeholder="Select Team">
                                <datalist id="select-team">
                                    <option value="Team 1"></option>
                                    <option value="Team 2"></option>
                                </datalist>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php
    include_once 'includes/components/footer.php';
?>