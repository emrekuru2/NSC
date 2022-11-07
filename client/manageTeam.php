<?php
$title = "Manage Teams";
include 'includes/components/header.php';
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
            <div class = "team">
                <!-- 3 functional buttons:
                    1. Exchange
                    2. Add
                    3. Remove player -->
                <div class = "buttons d-flex justify-content-end mt-3" style="width: 95%">
                        <button type="button" pButton class="fa fa-exchange-alt ml-3" ></button>
                        <button class="ml-3">&#43;</button>
                        <button class="ml-3">&#10005;</button>
                </div>
                <div class = "dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                </div>
                
                    
                    <div class="check-box">
                        <input type="checkbox" id="player1" name="player1" >
                        <label for="player1">Player1</label>
                        <p>This is the information for the first player</p>
                    </div>
                    <div class="check-box">
                        <input type="checkbox" id="player2" name="player2" >
                        <label for="player2">Player2</label>
                        <p>This is the information for the second player</p>
                    </div>
                    <div class="check-box">
                        <input type="checkbox" id="player3" name="player3" >
                        <label for="player3">Player3</label>
                        <p>This is the information for the third player</p>
                    </div>
            
            

                
            </div>
            <!-- some other teams -->

        

        </div>
    </div>






</body>

<?php
        include 'includes/components/footer.php';
?>