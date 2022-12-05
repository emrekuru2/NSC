<?php
    $title = "Manage Teams";
    include_once 'includes/components/newheader.php';
    Include_once 'includes/functions/security.php';
    CheckLoggedIn();
    $managerID = $_SESSION['User_ID'];
    AccessControlBasedOnLevel($_MANAGER_ACCESS_LST, $managerID);

    $managerClubID = getManagerClubID($managerID);
    if(isset($managerClubID)) {
?>

<link rel="stylesheet" type="text/css" href="../../css/manageTeam.css">
<!-- change css ad js to bootstrap5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<body>
    <div class="container my-5">
    <h1 class="text-center font-weight-bold dark-grey-text m-4 h1">Manage Team</h1>
        <?php

            /**
             * Returns an array of players [object]
             * Players obj: 
             * teamName,teamID, userID, isClubManager, isTeamCaptain, isViceCaptain, waitingToJoin, firstName, middleName, lastName, userDecription
             * Can access like: $obj_user->userID
             */
            $lstPlayers;
            if(isset($_POST['btn-search'])) {
                $lstPlayers = getPlayersInClub($managerClubID, $_POST['bar-search-player']);
            }
            else {
                $lstPlayers = getPlayersInClub($managerClubID);
            }
            $lstTeams = getTeamsInClub($managerClubID);
            $lstTeamOne = array();
            $lstTeamTwo = array();
            $lstTeamThree = array();
            $lstUnassigned = array();

            $arr_length = count($lstPlayers);
            if($arr_length>0)
                for($i=0;$i<$arr_length;$i++)
                {
                    $player = $lstPlayers[$i];
                    $playerTeamID = $player->teamID;

                    /* If the player is in waiting to join then add to unassigned team. Note givig a team is mandatory in the database,
                        every player in the club has a team, but the waitingToJoin field determines, if they are in a team or waiting.
                        */
                    if($player->waitingToJoin == 1) {
                        $lstUnassigned[] = $player;
                    }
                    else {
                        if($playerTeamID == $lstTeams[0]->teamID) {
                            $lstTeamOne[] = $player;
                        } elseif($playerTeamID == $lstTeams[1]->teamID) {
                            $lstTeamTwo[] = $player;
                        } elseif($playerTeamID == $lstTeams[2]->teamID) {
                            $lstTeamThree[] = $player;
                        }
                    }
                }
            else {
                echo "<div class='d-flex justify-content-center'>
                <p class='alert alert-warning w-75 text-center' id='search-warning'>Sorry no player found</p>
            </div>";
            }
        ?>
        <!-- Search bar  -->
        <div class="search-bar">
            <form class="form-inline d-flex  justify-content-center" id= "search-form" action="manageTeam.php" method="POST">
                <div class="input-group w-75">
                    <input class="form-control w-75 mt-1" type="search" placeholder="Search Player" aria-label="Search" id="bar-search-player" name="bar-search-player" required>
                    <button class="btn btn-blue-grey mt-1" type="search" id="btn-search" name="btn-search">
                        <i class="fas fa-search"></i>
                    </button>  
                </div>
            </form>
        </div>

        <!-- 3 functional buttons:
                    1. Exchange
                    2. Add
                    3. Remove player -->
        
        <div class = "d-flex justify-content-end mt-3">
            <?php if(isset($_POST['bar-search-player'])) echo '<a href="manageTeam.php" class="btn btn-primary active" role="button" aria-pressed="true">Show All Players</a>';?>
            <button type="button" pButton class="btn btn-dark ml-3" data-toggle="modal" data-target="#pop-up" id="btn-exchange-player"><i class="fa fa-exchange-alt fa-lg"></i></button>
            <button type="button" data-toggle="modal" data-target="#pop-delete" class="btn btn-danger ml-3" id="btn-remove-player"><i class="fa fa-times fa-lg"></i></button>
        </div>

        <!-- Team Cards: 
            Each Team card has a scroll bar, team name, player list
        -->
        <?php
            if(count($lstTeamOne) != 0) {
        ?>
        <div class="card mt-4" id="team-1">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-2"><?php echo "<a href=\"Team.php?id=".$lstTeams[0]->teamID."\" class=\"text-dark text-decoration-none\">".$lstTeams[0]->teamName."</a>"; ?></h5>  
                <hr> 
                <div class="card-text" id="player-list-1">
                    <?php
                        $arr_length_lstOne = count($lstTeamOne);
                        if ($arr_length_lstOne == 0) {
                            echo
                            '<div class="alert alert-warning" role="alert">
                                No players added to this team. You can add players from other teams or from the unassigned group.
                            </div>';
                        } else {
                            for($i=0;$i<$arr_length_lstOne;$i++)
                            {
                                $playerInTeam = $lstTeamOne[$i];
                                $playerName = "$playerInTeam->name";
                                echo '<div class="form-check pl-5">
                                    <input class="form-check-input" type="checkbox" value="'.$playerName.'" id="player-team'.$playerInTeam->userID.'" onClick="changeLstSelected('.$playerInTeam->userID.')"/>
                                    <label class="form-check-label fs-6" for="'.$playerInTeam->userID.'"><strong>'.$playerName.'</strong></label>
                                    <p>'.$playerInTeam->userDescription.'</p>
                                </div>';
                            }
                        }
                    ?>
                </div>      
            </div>  
        </div>
        <?php } 
        if(count($lstTeamTwo) != 0) {
        ?>
        <div class="card mt-4" id="team-2">
            <div class="card-body">
                <h5 class="card-title font-weight-bold"> <?php echo "<a href=\"Team.php?id=".$lstTeams[1]->teamID."\" class=\"text-dark text-decoration-none\">".$lstTeams[1]->teamName."</a>"; ?></h5>
                <hr>  
                <div class="card-text" id="player-list-2">
                <?php
                        $arr_length_lstTwo = count($lstTeamTwo);
                        if ($arr_length_lstTwo == 0) {
                            echo
                            '<div class="alert alert-warning" role="alert">
                                No players added to this team. You can add players from other teams or from the unassigned group.
                            </div>';
                        } else {
                            for($i=0;$i<$arr_length_lstTwo;$i++)
                            {
                                
                                $playerInTeam = $lstTeamTwo[$i];
                                $playerName = $playerInTeam->name;
                                echo '<div class="form-check pl-5">
                                    <input class="form-check-input" type="checkbox" value="'.$playerName.'" id="player-team'.$playerInTeam->userID.'"  onClick="changeLstSelected('.$playerInTeam->userID.')"/>
                                    <label class="form-check-label fs-6" for="'.$playerInTeam->userID.'"><strong>'.$playerName.'</strong></label>
                                    <p>'.$playerInTeam->userDescription.'</p>
                                </div>';
                            }
                        }
                    ?>
                </div>      
            </div>  
        </div>
        <?php 
            } 
            if(count($lstTeamThree) != 0) {
        ?>
        <div class="card mt-4" id="team-3">
            <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo "<a href=\"Team.php?id=".$lstTeams[2]->teamID."\" class=\"text-dark text-decoration-none\">".$lstTeams[2]->teamName."</a>"; ?></h5>  
                <hr>
                <div class="card-text" id="player-list-3">
                <?php
                        $arr_length_lstThree = count($lstTeamThree);
                        if ($arr_length_lstThree == 0) {
                            echo
                            '<div class="alert alert-warning" role="alert">
                                No players added to this team. You can add players from other teams or from the unassigned group.
                            </div>';
                        } else {
                            for($i=0;$i<$arr_length_lstThree;$i++)
                            {
                                
                                $playerInTeam = $lstTeamThree[$i];
                                $playerName = $playerInTeam->name;
                                echo '<div class="form-check pl-5">
                                    <input class="form-check-input" type="checkbox" value="'.$playerName.'" id="player-team'.$playerInTeam->userID.'" onClick="changeLstSelected('.$playerInTeam->userID.')"/>
                                    <label class="form-check-label fs-6" for="'.$playerInTeam->userID.'"><strong>'.$playerName.'</strong></label>
                                    <p>'.$playerInTeam->userDescription.'</p>
                                </div>';
                            }
                        }
                    ?>
                </div>      
            </div>  
        </div>
        <?php 
        } 
        if(count($lstUnassigned) != 0) {
        ?>
        <div class="card mt-4" id="team-3">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Unassigned</h5>  
                <hr>
                <div class="card-text text-dark" id="player-list">
                <?php
                        $arr_length_lstUnassigned = count($lstUnassigned);
                        if ($arr_length_lstUnassigned == 0) {
                            echo
                            '<div class="alert alert-warning" role="alert">
                                No players unassigned. You can unassign players from teams by clicking the X button.
                            </div>';
                        } else {
                            for($i=0;$i<$arr_length_lstUnassigned;$i++)
                            {
                                
                                $playerInTeam = $lstUnassigned[$i];
                                $playerName = $playerInTeam->name;
                                echo '<div class="form-check pl-5">
                                    <input class="form-check-input" type="checkbox" value="'.$playerName.'" id="player-team'.$playerInTeam->userID.'" onClick="changeLstSelected('.$playerInTeam->userID.')" />
                                    <label class="form-check-label fs-6" for="'.$playerInTeam->userID.'"><strong>'.$playerName.'</strong></label>
                                    <p>'.$playerInTeam->userDescription.'</p>
                                </div>';
                            }
                        }
                    ?>
                </div>      
            </div>  
        </div>
        <?php 
        } 
        ?>
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
                            <div class="col-7" id="player-team-input">
                                <input class="form-control mt-1" placeholder="No Player Selected" id="display" disabled>
                            </div>
                        </div>
                        <!-- New Team input -->
                        <div class="row mt-2">
                            <div class="col-5">
                                <label for="newTeam"> New Team: </label>
                            </div>
                            <div class="col-7">
                                <select id="newTeam" class="form-select mt-1 w-100" aria-label="Select team">
                                    <?php
                                        for($i=0; $i<count($lstTeams); $i++) {
                                            $team = $lstTeams[$i];
                                            echo "<option value='$team->teamName' id='$team->teamID'>$team->teamName</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="movePlayers(<?php echo $managerID?>)">Save</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade " id="pop-delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="pop-upLabel">Move to unasssigned</h5>
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
                            <div class="col-7" id="player-team-input-unassign">
                                <input class="form-control mt-1" placeholder="No Player Selected" id="display" disabled>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="unassignPlayers(<?php echo $managerID ?>)">Unassign</button>
                </div>
                </div>
            </div>
        </div>

    </div>
    
    <script src="../../js/manageTeam.js"></script>
</body>

<?php
    }
    else {
        echo
            '<div class="alert alert-warning" role="alert">
                No club assigned to you. Contact Admin to get a club to manage.
            </div>';
    }
    include "includes/components/footer.php";
?>