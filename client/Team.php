<?php
    $title = "My Team";
    include_once 'includes/components/newheader.php';
    // Coach can edit, player can view (future implementation)
    include_once 'includes/functions/security.php';
    CheckLoggedIn();
    AccessControlBasedOnLevel(PLAYER_ACCESS_LVL, $_SESSION['User_ID']);
?>

    <?php
        $teamID = displayTeamHomePage();
    ?>


    <!-- container -->
    <div class="container my-5">

            <!-- Modal -->
            <!--First row-->
            <div class="row">

                <!--First column-->
                <div class="col-12">

                    <!-- Nav tabs -->
                    <ul class="nav md-pills flex-center flex-wrap mx-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold text-uppercase" data-toggle="tab" href="#panelPlayer" role="tab">Players</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-uppercase" data-toggle="tab" href="#panelResult" role="tab">Result</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-uppercase" data-toggle="tab" href="#panelSchedule" role="tab">Schedule</a>
                        </li>
                    </ul>

                </div>
                <!--First column-->

            </div>

            <br><br><br>

            <!--First row-->

            <!--Tab panels-->
            <div class="tab-content mb-5">

                <!--Player Profile-->
                <div class="tab-pane fade show in active" id="panelPlayer" role="tabpanel">
                    <!--Section: Content-->
                    <section class="text-center dark-grey-text">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- one row-->
                            <!-- Grid column -->
                            <?php
                            if(isset($teamID)) {
                                $lstTeamPlayers = getPlayersInTeam($teamID);
                                $arr_length = count($lstTeamPlayers);
                                if($arr_length>0) {

                                    for($i = 0; $i < $arr_length; $i++ ) {
                                        $player = $lstTeamPlayers[$i];
                                        if($player->waitingToJoin) continue; // Waiting to join means that are not in team
                                        $name = $player->name;
                            ?> 
                            <div class="col-md-3 mb-4">
                                <div class="view z-depth-1 mb-4">
                                <?php
                                    $target_dir = substr($player->img, 6) . "\profilePicture.jpg";
                                    
                                    echo "<img width=100% height=250 src=\"$target_dir\" class=\"mx-auto rounded hover-overlay\"
                                        alt=\"Sample avatar\">"; 
                                ?>
                                </div>
                                <h6 class="font-weight-bold"><?php echo $name; ?></h6>

                            </div>
                            <?php }}} ?>                                    
                            <!-- Grid column -->

                            

                        </div>
                            <!-- Grid column -->

                        <br><br>
                        <!-- one row -->

                    </section>
                    <!--Section: Content-->
                </div>
                <!-- Player Profile -->

                <!-- Result -->
                <div class="tab-pane fade" id="panelResult" role="tabpanel">
                    <!-- Grid row -->
                    <div class="row">
                        <div class="container my-5">
                                <!-- Grid row -->
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card z-depth-0 bordered border-light">
                                            <div class="card-body p-0">
                                                <div class="row mx-0">
                                                    <table class="table table-striped text-center align-middle font-size">
                                                        <thead class="black white-text">
                                                        <tr>
                                                            <th  scope="col">TIME</th>
                                                            <th scope="col">TEAM  VS  TEAM</th>
                                                            <th scope="col">SCORE  :  SCORE</th>
                                                            <th scope="col">MATCH</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>09/25/2019</td>
                                                            <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>
                                                            <td>170&nbsp;&nbsp;:&nbsp;&nbsp;151</td>
                                                            <td>HCL 2019 - Division 1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>08/25/2019</td>
                                                            <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>
                                                            <td>168&nbsp;&nbsp;:&nbsp;&nbsp;121</td>
                                                            <td>HCL 7 Over Shootout</td>
                                                        </tr>
                                                        <tr>
                                                            <td>07/10/2019</td>
                                                            <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Halifax CC</td>
                                                            <td>144&nbsp;&nbsp;:&nbsp;&nbsp;120</td>
                                                            <td>Central T20 2018</td>
                                                        </tr>
                                                        <tr>
                                                            <td>06/25/2019</td>
                                                            <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>
                                                            <td>168&nbsp;&nbsp;:&nbsp;&nbsp;121</td>
                                                            <td>HCL 7 Over Shootout</td>
                                                        </tr>
                                                        <tr>
                                                            <td>05/10/2019</td>
                                                            <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Halifax CC</td>
                                                            <td>144&nbsp;&nbsp;:&nbsp;&nbsp;120</td>
                                                            <td>Central T20 2018</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->
                        </div>
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Result -->



                <!-- Schedule -->
                <div class="tab-pane fade" id="panelSchedule" role="tabpanel">

                    <!-- Grid row -->
                    <div class="row">
                        <div class="container my-5">
                            <!-- Grid row -->
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card z-depth-0 bordered border-light">
                                        <div class="card-body p-0">
                                            <div class="row mx-0">
                                                <table class="table table-striped text-center align-middle font-size">
                                                    <thead class="black white-text">
                                                    <tr>
                                                        <th  scope="col">TIME</th>
                                                        <th scope="col">MATCH</th>
                                                        <th scope="col">TEAM  VS  TEAM</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>09/25/2020</td>
                                                        <td>HCL 2020 - Division 1</td>
                                                        <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>
                                                    </tr>
                                                    <tr>
                                                        <td>08/25/2020</td>
                                                        <td>HCL 7 Over Shootout</td>
                                                        <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>

                                                    </tr>
                                                    <tr>
                                                        <td>07/10/2020</td>
                                                        <td>Central T20 2020</td>
                                                        <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Halifax CC</td>
                                                    </tr>
                                                    <tr>
                                                        <td>06/25/2020</td>
                                                        <td>HCL 7 Over Shootout</td>
                                                        <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Hfx-Titans CC</td>
                                                    </tr>
                                                    <tr>
                                                        <td>05/10/2020</td>
                                                        <td>Central T20 2020</td>
                                                        <td>East Coast CC&nbsp;&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp;&nbsp;Halifax CC</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Schedule -->
            </div>
    <!--Tab panels-->
    </div>
    <!-- container>





<?php
include 'includes/components/footer.php'
?>