<?php
$title = "Manage Teams";
include 'includes/components/header.php';
?>


<link rel="stylesheet"  href="../../css/manageTeam.css">

<body>

    <div class = "search-bar">
    <form class="" role="search">
        <input class="" type="search" placeholder="Search">
        <button class="" type="submit">Search</button>
      </form>
    </div>

    <div class = "team lsit">
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






    <?php
        include 'includes/components/footer.php';
    ?>
</body>