<?php
$title = "Manage Teams";
include 'includes/components/header.php';
?>

<!-- change css ad js to bootstrap5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<body>
    <div class = "container my-5">
    <!-- Search bar -->
        <div class="search-bar">
            <form class="form-inline my-2 my-lg-0 d-flex justify-content-center" id= "search-form">
                <input class="form-control" style="width: 70%" type="search" placeholder="Search Player" aria-label="Search">
                <button class="submit-icon border-0.5 border-info">
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </button>

                <button class="ml-3 border-0.5 border-info">Unassigned <br>Players</button>
            </form>
        </div>

        <div class = "team-list">
            <div class = "team1">
                <!-- 3 functional buttons:
                    1. Exchange
                    2. Add
                    3. Remove player -->
                <div class = "buttons d-flex justify-content-end mt-3" style="width: 95%">
                        <button type="button" pButton class="fa fa-exchange-alt ml-3" ></button>
                        <button class="ml-3">&#43;</button>
                        <button class="ml-3">&#10005;</button>
                </div>

                <!-- Codes from https://mdbootstrap.com/docs/standard/extended/dropdown-checkbox/ -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="teamDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Team1
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="teamDropdown">
                        <li>
                            <a class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Player1" />
                                    <label class="form-check-label" for="Player1">Player1</label>
                                    <p>This is the information for the first player</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Player2" />
                                    <label class="form-check-label" for="Player2">Player2</label>
                                    <p>This is the information for the second player</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Player3" />
                                    <label class="form-check-label" for="Player3">Player3</label>
                                    <p>This is the information for the third player</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Player4" />
                                    <label class="form-check-label" for="Player4">Player4</label>
                                    <p>This is the information for the fourth player</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>             
            </div>
            <!-- some other teams -->

        

        </div>
    </div>





</body>

<?php
        include 'includes/components/footer.php';
?>