<?php
$title = "Manage Teams";
include 'includes/components/header.php';
?>


<link rel="stylesheet"  href="../../css/manageTeam.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<body>
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
            <h1>Team #</h1>
            <div class = "players">
                <div class="check-box">
                    <input class="" type="checkbox" value="" >
                </div>
                <div class = "context">
                    <div class = "palyer-info">
                        <!-- team players -->
                    </div>
                    <dic class = "team-info">
                        <!-- the team belongs to -->

                    </dic>
                </div>
                <!-- some other players -->
            
        
               


            </div>

            
        </div>
        <!-- some other teams -->

       

    </div>






</body>

<?php
        include 'includes/components/footer.php';
?>