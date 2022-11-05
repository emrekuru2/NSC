<?php
$title = "Manage Teams";
include 'includes/components/header.php';
?>


<link rel="stylesheet"  href="../../css/manageTeam.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<body>
    <div class="search-bar">
        <form class="form-inline my-2 my-lg-0 d-flex justify-content-center" id= "search-form">
            <input class="form-control" style="width: 75%" type="search" placeholder="Search Player" aria-label="Search">
            <button class="btn btn-md" type="submit" id="search-button">Search</button>
        </form>
    </div>

    <div class = "team list">
        <div class = "team">
            <div class = "buttons">
                    <button type="button" class="">Add</button>
                    <button type="button" class="">Exchange</button>
                    <button type="button" class="">Remove</button>
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