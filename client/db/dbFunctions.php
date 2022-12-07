<?php
// Function To Place To Create DB Functions
// Created By Nicholas Deschenes 13/10/2019
include_once "database.php";
defined('_DEFVAR') or exit(header('Location: ../index.php'));
function sanitize($conn, $str){
    mysqli_real_escape_string($conn, trim($str));
    return $str;
}

function check_input($conn, $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    $data = sanitize($conn, $data);
    return $data;
}

/* Announcement Functions */
function postAnnouncement($conn, $postFormUserID, $announcementTitle, $announcementFirstName, $announcementLastName,
                          $announcementEmail, $announcementDate, $announcementContent) {
    // Check Input
    $announcementTitle = check_input($conn, $announcementTitle);
    $announcementFirstName = check_input($conn, $announcementFirstName);
    $announcementLastName = check_input($conn, $announcementLastName);
    $announcementEmail = check_input($conn, $announcementEmail);
    $announcementDate = check_input($conn, $announcementDate);
    $announcementContent = check_input($conn, $announcementContent);

    // Create Prepared Statement
    $stmt = $conn->prepare("INSERT INTO NSCA_News (UserID, Title, FirstName, LastName, Email, Date, Content) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind Parameters
    $stmt->bind_param("sssssss", $postFormUserID, $announcementTitle, $announcementFirstName, $announcementLastName, $announcementEmail,
        $announcementDate, $announcementContent);

    // Execute Statement And Check If Completed
    $insertAnnouncement = $stmt->execute();

    // Close Prepared Statement
    $stmt->close();

    return $insertAnnouncement;
}

function getAnnouncements($conn){
    $stmt = $conn->prepare("SELECT * FROM NSCA_News ORDER BY Date DESC");
    $stmt->execute();
    $allAnnouncements = $stmt->get_result();
    $stmt->close();

    return $allAnnouncements;
}

function searchAnnouncements($conn, $searchString){
    $searchString = check_input($conn, $searchString);
    $searchString = "%{$searchString}%";

    $stmt = $conn->prepare("SELECT * FROM NSCA_News
        WHERE Title LIKE ?
        OR FirstName LIKE ?
        OR LastName LIKE ?
        OR Date LIKE ?
        OR Content LIKE ?
        ORDER BY NewsID DESC");

    $stmt->bind_param("sssss", $searchString, $searchString, $searchString, $searchString, $searchString);

    $stmt->execute();

    $searchAnnouncements = $stmt->get_result();

    $stmt->close();

    return $searchAnnouncements;
}
/* End Announcement Functions */

function getUserInfo($conn, $userID){
    $stmt = $conn->prepare("SELECT * FROM nsca_user WHERE UserID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $userInfo = $stmt->get_result();
    $stmt->close();

    return $userInfo;
}

/* Club Functions */
function getClubs($conn){
    $stmt = $conn->prepare("SELECT * FROM nsca_clubs");
    $stmt->execute();
    $allClubs = $stmt->get_result();
    $stmt->close();

    return $allClubs;
}

function getClub($conn, $id) {
    $id = check_input($conn, $id);

    $stmt = $conn->prepare("SELECT * FROM nsca_clubs WHERE ClubID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $club = $stmt->get_result();
    $stmt->close();
    $club = mysqli_fetch_assoc($club);
    return $club;
}

function updateClub($conn, $id, $name, $website, $description, $email, $phone, $facebook) {
    $name = check_input($conn, $name);
    $website = check_input($conn, $website);
    $description = check_input($conn, $description);
    $email = check_input($conn, $email);
    $phone = check_input($conn, $phone);
    $facebook = check_input($conn, $facebook);
    $id = check_input($conn, $id);

    $stmt = $conn->prepare("UPDATE nsca_clubs SET Name=?, Website=?, Description=?, Email=?, Phone=?, FaceBook=? WHERE ClubID = ?");
    $stmt->bind_param("ssssssi", $name, $website, $description, $email, $phone, $facebook, $id);
    $stmt->execute();
    $stmt->close();
}

/* End Club Functions */

/* Alert Functions */
function getAlerts($conn) {
    $stmt = $conn->prepare("SELECT * FROM NSCA_Alerts");
    $stmt->execute();
    $getAlerts = $stmt->get_result();
    $stmt->close();
    return mysqli_fetch_assoc($getAlerts);
}

function setAlerts($conn, $alertTitle, $alertContent){
    $stmt = $conn->prepare("UPDATE NSCA_Alerts
                 SET Alert_Title = ?, Alert_Content = ?, Alert_Status = 'active'
                 WHERE Alert_ID = '1'");
    $stmt->bind_param("ss", $alertTitle, $alertContent);
    $setAlert = $stmt->execute();
    $stmt->close();
    return $setAlert;
}

function setAlertStatus($conn, $status){
    $stmt = $conn->prepare("UPDATE NSCA_Alerts SET Alert_Status = ?");
    $stmt->bind_param("s", $status);
    $setAlertStatus = $stmt->execute();

    return $setAlertStatus;
}

function getAlertStatus($conn){
    $stmt = $conn->prepare("SELECT * FROM NSCA_Alerts WHERE Alert_ID = '1'");
    $stmt->execute();
    $getAlertStatus = $stmt->get_result();
    $stmt->close();
    $row = mysqli_fetch_array($getAlertStatus);
    if ($row['Alert_Status'] == "active"){
        return "active";
    } else {
        return "inactive";
    }
}
/* End Alert Functions */

/* Role Functions */
function getRoles($conn) {
    $stmt = $conn->prepare("SELECT RoleID, Name FROM nsca_roletype");
    $stmt->execute();
    $roleResults = $stmt->get_result();
    $stmt->close();
    return $roleResults;
}

/* End Role Functions */


/*Generate single announcement with singleNews.php*/
function getSingleNewscontent($id, $userID){
    $conn = OpenCon();
    //sql statement
    $stmt = $conn->prepare( "SELECT Title,Pictures,Date,content,FirstName,LastName FROM nsca_news
                    WHERE NewsID = $id");
    //execute
    $stmt->execute();
    //save the data
    $stmt->store_result();
    //bind the data
    $stmt->bind_result($title,$image,$date,$post,$firstName,$lastName);


    if($stmt->num_rows >0){
        while ($stmt->fetch()) {

            $editBtn = "";
            if(CheckRole($userID) == 'Admin') {
                $editBtn =  "<a href=\"singleNews.php?id=$id&e=1\" class=\"btn btn-primary\">Edit</a>";
            }
            echo "
                <!-- Title -->
                <div class=\"flex-d row justify-content-between mx-1\">
                    <div class=\"float-left mt-4\">
                        <input type=\"test\" readonly class=\"h1 form-control-plaintext\" placeholder=\"$title\">
                    </div>
                    <div class=\"float-right mt-4\">
                        <a href=\"news.php\" class=\"btn btn-secondary\">All News</a>
                    ".$editBtn."
                    </div>
                </div>

                <!-- Author -->
                <div class=\"flex-d row justify-content-between mx-1 border-bottom\">
                    <p>
                        by " . $firstName ." ". $lastName . "
                    </p>

                    <!-- Date/Time -->
                    <p>Posted on " . date("F j, Y", strtotime($date)) . " at ". date("g:i A", strtotime($date)) . "</p>
                </div>
                

                <!-- Preview Image -->
                <div class=\"flex-d row my-3 mx-1\">
                    <div class=\"float-left\" style=\"width:40%\">
                        <img class=\"card-img-top rounded  mr-2 my-1\" src=\"$image/newsImage.jpg\" alt=\"Image\" >
                    </div>

                    <div>
                        <textarea type\"text\" readonly class=\"form-control-plaintext\" rows=\"20\" cols=\"69\">$post</textarea>
                    </div>
                </div>  
                    ";
        }
    }
    else {
        echo "<p class=\"alert alert-warning w-75mx-auto my-5 p-5 text-lg-center\" style=\"font-size:4rem\"> Sorry, could not find the requested news. Please check another news.</p>";
    }

    $stmt->close();
}

/*Generate single announcement with singleNews.php END*/

/*Generate comments in singleNews.php*/
//display the comments
function generateAllComments($id){
    $conn = OpenCon();

    //sql statement
    $stmt = $conn->prepare("SELECT Comment,Date,FirstName,LastName FROM nsca_news_comments INNER JOIN nsca_user ON
                                   nsca_news_comments.UserID = nsca_user.UserID WHERE NewsID = $id ORDER BY Date DESC ");
    //execute
    $stmt->execute();
    //store
    $stmt->store_result();
    //bind result
    $stmt->bind_result($content,$date,$FirstName,$LastName);




    while ($stmt->fetch()) {
        echo "<div class=\"media mb-4\">
                <img class=\"d-flex mr-3 rounded-circle\" src=\"http://placehold.it/50x50\" alt=\"\">
                <div class=\"media-body\">
                    <h6 class=\"mt-0\">$FirstName $LastName <br> " . date("F j, Y", strtotime($date)) . " at ". date("g:i A", strtotime($date)) . "</h6>
                   $content
                </div>
            </div>";

    }
    $stmt->close();
    $conn->close();
}

//add the comments
function writeComment($id,$comment){
    $conn = OpenCon();
    if(isset($_SESSION["User_ID"])){
        $userID = $_SESSION["User_ID"];

        //sql statement
        $statement = $conn->prepare("INSERT INTO nsca_news_comments (Comment, NewsID, UserID) VALUES (?,?,?)");
        //bind
        $statement->bind_param("sii",$content,$newsid,$uid);
        $content = $comment;
        $newsid = $id;
        $uid = $userID;
        //execute
        $statement->execute();
        $statement->close();
        $conn->close();
    }
}
/*Generate comments in singleNews.php* END/

/*Check if user has a team or not(AND SET SESSIONS)*/
function checkHasATeam(){
    if(isset($_SESSION["UserRole"])){
        if((isset($_SESSION["User_ID"])) && $_SESSION['UserRole'] != "1"){
            $conn = OpenCon();
            $userID = $_SESSION["User_ID"];

            //sql statement
            $statement = $conn->prepare("SELECT TeamID FROM nsca_teamuser WHERE UserID = '$userID'");

            // Execute
            $statement->execute();
            //Store
            $statement->store_result();
            //bind result
            $statement->bind_result($teamID);
            $teamId = $teamID;
            echo "<p>$teamID</p>";
            if($statement->num_rows == 0){
                echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"../../TeamsList.php\">Join A Team</a>
            </li>";
            }

            if($statement->num_rows > 0){
                $statement->fetch();
                echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"../../Team.php?id=$teamID\">My Team</a>
            </li>";
            }
            $statement->close();
            $conn->close();
        }
    }
}
/*Check if user has a team or not(AND SET SESSIONS) END*/

/* Display all the teams */
function displayTeams(){
    $conn = OpenCon();
    //sql statement
    $statement = $conn->prepare("SELECT TeamID,teamName,teamProfilePicture FROM nsca_team");
    // Execute
    $statement->execute();
    //Store
    $statement->store_result();

    //bind result
    $statement->bind_result($teamID,$teamName,$teamProfilePicture);

    //display
    if($statement->num_rows >0){
        while ($statement->fetch()){
            echo "<!-- Grid row2 -->

            <div class=\"row\">
                <!-- Grid column -->
                <div class=\"col-lg-3 col-md-6 mb-lg-0 mb-5\">
                    <div class=\"avatar mx-auto\">
                   
                        <a href=\"Team.php?id=$teamID\">
                        <img height=\"120\" width=\"120\" src=\"img/teamProfilePictures/$teamProfilePicture\" class=\"rounded-circle z-depth-1\"
                             alt=\"Sample avatar\">
                             </a>
                    </div>
                    <a href=\"Team.php?id=$teamID\"><h6 class=\"font-weight-bold mt-4 mb-3\">$teamName</h6></a>
                </div>";

                for($count= 0;$count<3;$count++){
                    if($statement->fetch()){
                        echo "<!-- Grid column -->
                <div class=\"col-lg-3 col-md-6 mb-lg-0 mb-5\">
                    <div class=\"avatar mx-auto\">
                        <a href=\"Team.php?id=$teamID\">
                            <img height=\"120\" width=\"120\" src=\"img/teamProfilePictures/$teamProfilePicture\" class=\"rounded-circle z-depth-1\"
                                 alt=\"Sample avatar\" </img>
                        </a>
                    </div>
                    <h6 class=\"font-weight-bold mt-4 mb-3\"><a href=\"Team.php?id=$teamID\">$teamName</a></h6>
                </div>
                
                ";
                    }
                }
            echo "</div>
            <hr class=\"w-25 my-5\">";
        }
    }
    $statement->close();
    $conn->close();

}
/* Display all the teams END */


/* Display team Home page */
function displayTeamHomePage(){
    if(isset($_GET["id"])){
        $teamID = $_GET["id"];
        $conn = OpenCon();

        //sql statement
        $statement = $conn->prepare("SELECT teamName, nsca_team.description, teamProfilePicture FROM nsca_team WHERE TeamID = '$teamID' LIMIT 1");
        // Execute
        $statement->execute();
        //Store
        $statement->store_result();

        //bind result
        $statement->bind_result($teamName,$description, $teamProfilePicture);

        if($statement->num_rows>0){
            while ($statement->fetch()){
                echo "<!-- Proflie Photo -->
                <div class=\"card card-image\" style=\"background-image: url(img/teamProfilePictures/teamBackground.jpg);\">
                    <div class=\"text-white rgba-black-strong py-4 px-3 rounded\">
                        <br><br>
                        <div class=\"text-center\">
                            <img height=\"150\" width=\"150\" src=\"img/teamProfilePictures/$teamProfilePicture\" class=\"rounded-circle z-depth-1\"
                                 alt=\"Sample avatar\" </img>
                            <br>
                            <h3 class=\"py-3 font-weight-bold\">
                                <strong>$teamName</strong>
                            </h3>
                            <h4>$description</h4>
                        </div>
                    </div>
                </div>
                <!-- Proflie Photo -->
                ";
            }
        }
        $statement->close();
        $conn->close();
        return $teamID;
    }

}


/* Display all the teams */
function displayTeamsForApply(){
    $conn = OpenCon();
    //sql statement
    $statement = $conn->prepare("SELECT TeamID,teamName,teamProfilePicture FROM nsca_team");
    // Execute
    $statement->execute();
    //Store
    $statement->store_result();

    //bind result
    $statement->bind_result($teamID,$teamName,$teamProfilePicture);

    if(isset($_SESSION['User_ID'])){
        $userID = $_SESSION['User_ID'];
        if(isset($_GET["applyTeamId"])){
            $applyId = $_GET["applyTeamId"];
            if($applyId!=null){
                echo "<h2>The application has been send!</h2><br><br><br><br>";
                $statement = $conn->prepare("INSERT INTO nsca_TeamJoinList(UserID,TeamID) VALUES(?,?)");
                $statement->bind_param("ii",$userID,$applyId);
                $statement->execute();
            }
        }


            //display
            if($statement->num_rows >0){
                while ($statement->fetch()){
                    echo "<!-- Grid row2 -->
            <div class=\"row\">
                <!-- Grid column -->
                <div class=\"col-lg-3 col-md-6 mb-lg-0 mb-5\">
                    <div class=\"avatar mx-auto\">
                   
                        <a href=\"Team.php?id=$teamID\">
                        <img height=\"60\" width=\"60\" src=\"img/teamProfilePictures/$teamProfilePicture\" class=\"rounded-circle z-depth-1\"
                             alt=\"Sample avatar\">
                             </a>
                    </div>
                    <a href=\"Team.php?id=$teamID\"><h6 class=\"font-weight-bold mt-4 mb-3\">$teamName</h6></a>
                    <a href=\"TeamsList.php?applyTeamId=$teamID\"><button class=\"btn light-blue text-white btn-md mx-0 btn-rounded\" type='button'>Join In</button></a>
                </div>";

                    for($count= 0;$count<3;$count++){
                        if($statement->fetch()){
                            echo "<!-- Grid column -->
                <div class=\"col-lg-3 col-md-6 mb-lg-0 mb-5\">
                    <div class=\"avatar mx-auto\">
                        <a href=\"Team.php?id=$teamID\">
                            <img height=\"60\" width=\"60\" src=\"img/teamProfilePictures/$teamProfilePicture\" class=\"rounded-circle z-depth-1\"
                                 alt=\"Sample avatar\" </img>
                        </a>
                    </div>
                    <h6 class=\"font-weight-bold mt-4 mb-3\"><a href=\"Team.php?id=$teamID\">$teamName</a></h6>
                    <a href=\"TeamsList.php?applyTeamId=$teamID\"><button class=\"btn light-blue text-white btn-md mx-0 btn-rounded\" type='button'>Join In</button></a>
                </div>";
                        }
                    }
                    echo "</div>
            <hr class=\"w-25 my-5\">";
                }
            }
            $statement->close();
            $conn->close();

    }

}
/* Display all the teams for apply END */

/* Manage the team application*/
function manageApplyToTeam(){
    $conn = OpenCon();

    //display
    $statement = $conn->prepare( "SELECT nsca_user.UserID, nsca_user.FirstName,nsca_user.MiddleName,nsca_user.LastName,
       nsca_team.teamName, nsca_TeamJoinList.JoinListID, nsca_team.TeamID FROM nsca_user 
    INNER JOIN nsca_TeamJoinList ON (nsca_user.UserID = nsca_TeamJoinList.UserID)
    INNER JOIN nsca_team ON (nsca_TeamJoinList.TeamID = nsca_team.TeamID)");


    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userID,$firstName,$middleName,$lastName,$teamName,$listID,$teamID);

    $count = 1;

    //display
    while($statement->fetch())
    {
        echo "<th>$count</th>
                            <td>$firstName $middleName $lastName</td>
                            <td>$teamName</td>
                            <td>
                            <a href=../admin/manageApplication.php?userId=$userID&teamId=$teamID&listID=$listID&type=1>
                                <button type='button'>Accept</button>
                            </a>
                            <a href=../admin/manageApplication.php?userId=$userID&teamId=$teamID&listID=$listID&type=2>
                                <button type='button'>Decline</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }
    $statement->close();



    if(isset($_GET["type"])){
        if(isset($_GET["userId"])){
            if(isset($_GET["teamId"])){
                if(isset($_GET["listID"])){
                    //Accept
                    $type = $_GET["type"];

                    if($type==1){
                        $id = $_GET["userId"];
                        $teamId=$_GET["teamId"];
                        $statement= $conn->prepare("SELECT TeamUserID FROM nsca_teamuser WHERE UserID = $id");
                        $statement->execute();
                        $statement->store_result();
                        $statement->bind_result($teamUserID);

                        if($statement->num_rows>0){
                            //if exist
                            $statement->fetch();
                            $teamUserID = $teamUserID;
                            $statement->close();
                            $statement = $conn->prepare("UPDATE nsca_teamuser
                            SET TeamID = ? WHERE TeamUserID = '$teamUserID'");
                            $statement->bind_param("i", $teamId);
                            $statement->execute();
                            $statement->close();

                            $listId = $_GET["listID"];
                            $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE JoinListID = '$listId'");
                            $statement->execute();
                            echo "<meta http-equiv='refresh' content='0; url=../admin/manageApplication.php'>";
                        }else{
                            //if not exist
                            $statement = $conn->prepare("INSERT INTO nsca_teamuser(UserID,TeamID) VALUES (?,?)");
                            $statement->bind_param("ii", $id,$teamId);
                            $statement->execute();
                            $statement->close();

                            $listId = $_GET["listID"];
                            $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE JoinListID = '$listId'");
                            $statement->execute();
                            echo "<meta http-equiv='refresh' content='0; url=../admin/manageApplication.php'>";
                        }
                    }else if($type==2){
                        $listId = $_GET["listID"];
                        $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE JoinListID = '$listId'");
                        $statement->execute();
                        echo "<meta http-equiv='refresh' content='0; url=../admin/manageApplication.php'>";
                    }
                    $statement->close();
                    $conn->close();


                }

            }
        }
    }



}
/* Manage the team application End*/


/*Display all the name of team*/
function displayAllTheTeam(){
    $conn = OpenCon();


    $statement = $conn->prepare("SELECT nsca_team.TeamID,teamName,nsca_clubs.Name FROM nsca_team 
    LEFT JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID 
    LEFT JOIN  nsca_clubs ON nsca_teams.ClubID = nsca_clubs.ClubID");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($teamID,$teamName,$clubName);

    $count = 1;


    //display
    while($statement->fetch())
    {
        echo "<th>$count</th>
                            
                            <td>$teamName</td>";

        if($clubName == null){
                                 echo "<td><a href=AddTeamToClub.php?teamId=$teamID&type=2&teamName=$teamName>
                                <button type='button' >Set A Club</button>
                            </a></td>";
        }else{
                                echo "<td>$clubName<a href=AddTeamToClub.php?teamId=$teamID&type=3&teamName=$teamName>
                                <button type='button' >Edit</button>
                            </a></td>";
        }
                            echo"
                           <td>
                            <a href=../admin/manageTeamList.php?teamId=$teamID&type=2>
                                <button type='button' >Delete</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }


    if(isset($_GET["type"]) && isset($_GET["teamId"])){
        if($_GET["type"] == 2){
            $statement->close();
            $teamId = $_GET["teamId"];
            $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE TeamID = '$teamId'");
            $statement->execute();
            $statement->close();
            $statement = $conn->prepare("DELETE FROM nsca_teams WHERE TeamID = '$teamId'");
            $statement->execute();
            $statement->close();
            $statement = $conn->prepare("DELETE FROM nsca_team WHERE TeamID = '$teamId'");
            $statement->execute();

            echo "<meta http-equiv='refresh' content='0; url=../admin/manageTeamList.php'>";
        }

    }

    $statement->close();
    $conn->close();
}
/*Display all the name of team End*/


/* method to create a new team*/
function createNewTeam(){

    $conn = OpenCon();
    if(isset($_POST["teamName"]) && isset($_POST["description"]) && isset($_POST["profilePictureName"])){
        $teamName = $_POST["teamName"];
        $description = $_POST["description"];
        $profilePic = $_POST["profilePictureName"];
        $statement = $conn->prepare("SELECT * FROM nsca_team WHERE teamName ='$teamName'");
        $statement->execute();
        $statement->store_result();
        if($statement->num_rows>0){
            echo "<p class='red-text text-center'>The team name is already existed!<br>Please make a new one.</p>";
        }else{

            if(isset($teamName)){
                $statement->close();
                $statement = $conn->prepare("INSERT INTO nsca_team(teamName,Description,teamProfilePicture) VALUES (?,?,?)");
                $statement->bind_param("sss",$teamName,$description,$profilePic);
                $statement->execute();
                echo "<p class='red-text text-center'>The team $teamName created successful!</p>";
                echo "<meta http-equiv='refresh' content='0; url=../admin/manageTeamList.php'>";
            }

        }
        $statement->close();
    }

    $conn->close();
}
/* method to create a new team END*/

/* Method to displayAllTheClub */
function displayAllTheClub(){
    $conn = OpenCon();

    $statement = $conn->prepare("SELECT ClubID,Name FROM nsca_clubs" );
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($id,$clubName);

    if(isset($_GET["teamName"])){
        $teamName = $_GET["teamName"];
        echo " <p class=\"h4 mb-4\">Set A Club For <br>$teamName</p>

                    <select name='selectClub' class=\"browser-default custom-select\">
                    <option selected >Select A Club</option>
                    ";

        while ($statement->fetch()){

            echo "<option value='$id'>$clubName</option>";
        }
        echo"</select>";
    }
}
/* Method to displayAllTheClub End*/


/* Method to set a club to a team End*/
function setClubToTeam(){
    $conn = OpenCon();
    if(isset($_GET["type"])){
        //insert
        if($_GET["type"]==2){
            if(isset($_GET["teamId"]) && isset($_POST["selectClub"])){
                $teamId = $_GET["teamId"];
                $clubID = $_POST["selectClub"];
                if(isset($clubID)){
                    $statement = $conn->prepare("INSERT INTO nsca_teams(TeamID,ClubID) VALUES (?,?)");
                    $statement->bind_param("ii",$teamId,$clubID);
                    $statement->execute();
                    $statement->close();
                    $conn->close();
                    echo "<meta http-equiv='refresh' content='0; url=../admin/manageTeamList.php'>";
                }
            }
        }

        //update
        if($_GET["type"]==3){
            if(isset($_GET["teamId"]) && isset($_POST["selectClub"])){
                $teamId = $_GET["teamId"];
                $clubID = $_POST["selectClub"];
                if(isset($clubID)){
                    $statement = $conn->prepare("UPDATE nsca_teams SET ClubID = ? WHERE TeamID = '$teamId'");
                    $statement->bind_param("i",$clubID);
                    $statement->execute();
                    $statement->close();
                    $conn->close();
                    echo "<meta http-equiv='refresh' content='0; url=../admin/manageTeamList.php'>";
                }
            }
        }

    }

}
/*  Method to set a club to a team End*/


/* Method to Display User Information */
function displayUserInformation(){
    $conn = OpenCon();

    //display user account information
    $statement = $conn->prepare("SELECT nsca_roletype.Name,nsca_user.UserID,FirstName,MiddleName,LastName,teamName,nsca_clubs.Name FROM nsca_user 
    LEFT JOIN nsca_teamuser ON nsca_user.UserID = nsca_teamuser.UserID 
    LEFT JOIN nsca_team ON nsca_team.TeamID = nsca_teamuser.TeamID
    LEFT JOIN nsca_roletype ON nsca_roletype.RoleID = nsca_user.UserRole
    LEFT JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID
    LEFT JOIN nsca_clubs ON nsca_teams.ClubID = nsca_clubs.ClubID");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userRole,$UserID,$firstName,$middleName,$lastName,$teamName,$clubName);

    //display
    $count = 1;
    while ($statement->fetch()){
        $fullName = $firstName." ".$middleName." ".$lastName;
        echo "<th>$count</th>
                            
                            <td>$fullName</td>";

        if($teamName == null){
            echo "<td class='red-text'>No Team</td>";
            echo "<td class='red-text'>No Club</td>";

        }else{
            echo "<td>$teamName</td>";
            echo "<td>$clubName</td>";
        }
        if($userRole == "Admin"){
            echo "<td class='red-text'>$userRole</td>";
        }else{
            echo "<td>$userRole</td>";
        }
        echo"
                            <td>
                            <a href=../admin/editUserRoleForm.php?userID=$UserID&userName=$fullName>
                                <button type='button' >Edit</button>
                            </a>
                            </td>
                           <td>
                            <a href=../admin/editUserRole.php?userID=$UserID&type=2>
                                <button type='button' >Delete</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }
    //delete function
    if(isset($_GET["type"])&& isset($_GET["userID"])){
        if ($_GET["type"] == 2){
            $statement->close();
            $id = $_GET["userID"];
            // $statement = $conn->prepare("DELETE FROM nsca_login WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_news_comments WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_news WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_userroles WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_subuser WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_locationuser WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            // $statement = $conn->prepare("DELETE FROM nsca_devroleuser WHERE UserID = '$id'" );
            // $statement->execute();
            // $statement->close();
            $statement = $conn->prepare("DELETE FROM nsca_user WHERE UserID = '$id'" );
            $statement->execute();
            echo "<meta http-equiv='refresh' content='0; url=../admin/editUserRole.php'>";
        }
    }

    $statement->close();
    $conn->close();
}
/* Method to Display User Information End */

/*Method to Display sorted User Information Start */
function displaySortedUserInformation($sort_option){

    $conn = OpenCon();

    //display user account information
    $statement = $conn->prepare("SELECT nsca_roletype.Name,nsca_user.UserID,FirstName,MiddleName,LastName,teamName,nsca_clubs.Name FROM nsca_user 
    LEFT JOIN nsca_teamuser ON nsca_user.UserID = nsca_teamuser.UserID 
    LEFT JOIN nsca_team ON nsca_team.TeamID = nsca_teamuser.TeamID
    LEFT JOIN nsca_roletype ON nsca_roletype.RoleID = nsca_user.UserRole
    LEFT JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID
    LEFT JOIN nsca_clubs ON nsca_teams.ClubID = nsca_clubs.ClubID ORDER BY FirstName $sort_option" );

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userRole,$UserID,$firstName,$middleName,$lastName,$teamName,$clubName);

    //display
    $count = 1;
    while ($statement->fetch()){
        $fullName = $firstName." ".$middleName." ".$lastName;
        echo "<th>$count</th>
                            
                            <td>$fullName</td>";

        if($teamName == null){
            echo "<td class='red-text'>No Team</td>";
            echo "<td class='red-text'>No Club</td>";

        }else{
            echo "<td>$teamName</td>";
            echo "<td>$clubName</td>";
        }
        if($userRole == "Admin"){
            echo "<td class='red-text'>$userRole</td>";
        }else{
            echo "<td>$userRole</td>";
        }
        echo"
                            <td>
                            <a href=../admin/editUserRoleForm.php?userID=$UserID&userName=$fullName>
                                <button type='button' >Edit</button>
                            </a>
                            </td>
                           <td>
                            <a href=../admin/editUserRole.php?userID=$UserID&type=2>
                                <button type='button' >Delete</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }
    //delete function
    if(isset($_GET["type"])){
        if ($_GET["type"] == 2){
            if(isset($_GET["userID"])){
                $id = $_GET["userID"];
                $statement = $conn->prepare("DELETE FROM nsca_login WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_news_comments WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_user WHERE UserID = $id" );
                $statement->execute();
            }
            echo "<meta http-equiv='refresh' content='0; url=../admin/editUserRole.php'>";
        }
    }

    $statement->close();
    $conn->close();
}
/* Method to Display sorted User Information End */


/*Method to Display Unasign User Information Start */
function displayunassignUserInformation(){

    $conn = OpenCon();

    //display user account information
    $statement = $conn->prepare("SELECT nsca_roletype.Name,nsca_user.UserID,FirstName,MiddleName,LastName,teamName,nsca_clubs.Name FROM nsca_user 
    LEFT JOIN nsca_teamuser ON nsca_user.UserID = nsca_teamuser.UserID 
    LEFT JOIN nsca_team ON nsca_team.TeamID = nsca_teamuser.TeamID
    LEFT JOIN nsca_roletype ON nsca_roletype.RoleID = nsca_user.UserRole
    LEFT JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID
    LEFT JOIN nsca_clubs ON nsca_teams.ClubID = nsca_clubs.ClubID WHERE nsca_user.UserRole = 1" );

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userRole,$UserID,$firstName,$middleName,$lastName,$teamName,$clubName);

    //display
    $count = 1;
    while ($statement->fetch()){
        $fullName = $firstName." ".$middleName." ".$lastName;
        echo "<th>$count</th>
                            
                            <td>$fullName</td>";

        if($teamName == null){
            echo "<td class='red-text'>No Team</td>";
            echo "<td class='red-text'>No Club</td>";

        }else{
            echo "<td>$teamName</td>";
            echo "<td>$clubName</td>";
        }
        if($userRole == "Admin"){
            echo "<td class='red-text'>$userRole</td>";
        }else{
            echo "<td>$userRole</td>";
        }
        echo"
                            <td>
                            <a href=../admin/editUserRoleForm.php?userID=$UserID&userName=$fullName>
                                <button type='button' >Edit</button>
                            </a>
                            </td>
                           <td>
                            <a href=../admin/editUserRole.php?userID=$UserID&type=2>
                                <button type='button' >Delete</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }
    //delete function
    if(isset($_GET["type"])){
        if ($_GET["type"] == 2){
            if(isset($_GET["userID"])){
                $id = $_GET["userID"];
                $statement = $conn->prepare("DELETE FROM nsca_login WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_news_comments WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_user WHERE UserID = $id" );
                $statement->execute();
            }
            echo "<meta http-equiv='refresh' content='0; url=../admin/editUserRole.php'>";
        }
    }

    $statement->close();
    $conn->close();
}
/* Method to Display Unasign User Information End */

/* Method to Display Searched User Information */
function displaySearchedUserInformation($searchValue){
    $conn = OpenCon();

    //display user account information
    $statement = $conn->prepare("SELECT nsca_roletype.Name,nsca_user.UserID,FirstName,MiddleName,LastName,teamName,nsca_clubs.Name FROM nsca_user 
    LEFT JOIN nsca_teamuser ON nsca_user.UserID = nsca_teamuser.UserID 
    LEFT JOIN nsca_team ON nsca_team.TeamID = nsca_teamuser.TeamID
    LEFT JOIN nsca_roletype ON nsca_roletype.RoleID = nsca_user.UserRole
    LEFT JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID
    LEFT JOIN nsca_clubs ON nsca_teams.ClubID = nsca_clubs.ClubID WHERE CONCAT(FirstName, MiddleName, LastName) LIKE '%$searchValue%'");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userRole,$UserID,$firstName,$middleName,$lastName,$teamName,$clubName);

    //display
    $count = 1;
    while ($statement->fetch()){
        $fullName = $firstName." ".$middleName." ".$lastName;
        echo "<th>$count</th>
                            
                            <td>$fullName</td>";

        if($teamName == null){
            echo "<td class='red-text'>No Team</td>";
            echo "<td class='red-text'>No Club</td>";

        }else{
            echo "<td>$teamName</td>";
            echo "<td>$clubName</td>";
        }
        if($userRole == "Admin"){
            echo "<td class='red-text'>$userRole</td>";
        }else{
            echo "<td>$userRole</td>";
        }
        echo"
                            <td>
                            <a href=../admin/editUserRoleForm.php?userID=$UserID&userName=$fullName>
                                <button type='button' >Edit</button>
                            </a>
                            </td>
                           <td>
                            <a href=../admin/editUserRole.php?userID=$UserID&type=2>
                                <button type='button' >Delete</button>
                            </a>
                            </td>
                        </tr>
              </tbody>";
        $count++;
    }
    //delete function
    if(isset($_GET["type"])){
        if ($_GET["type"] == 2){
            if(isset($_GET["userID"])){
                $id = $_GET["userID"];
                $statement = $conn->prepare("DELETE FROM nsca_login WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_news_comments WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_TeamJoinList WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE UserID = $id" );
                $statement->execute();
                $statement = $conn->prepare("DELETE FROM nsca_user WHERE UserID = $id" );
                $statement->execute();
            }
            echo "<meta http-equiv='refresh' content='0; url=../admin/editUserRole.php'>";
        }
    }

    $statement->close();
    $conn->close();
}
/* Method to Display User Information End */

/* Method to display the user role*/
function displayUserTeamAndRole(){
    $conn = OpenCon();
    if(isset($_GET["userID"])){
        if(isset($_GET["userName"])){
            $userName = $_GET["userName"];
            $userId = $_GET["userID"];
            //display team information
            $statement = $conn->prepare("SELECT TeamID,teamName FROM nsca_team");
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($teamID,$teamName);
            echo " <p class=\"h4 mb-4\">Set Information For <br>$userName</p>

                    <select name='selectTeam' class=\"browser-default custom-select\">
                    <option value='?' selected >Select A Team</option>
                    <option value='0'>Set No Team</option>
                    ";

            while ($statement->fetch()){

                echo "<option value='$teamID'>$teamName</option>";
            }
            echo"</select>";

            //display User Role information
            $statement = $conn->prepare("SELECT RoleID,Name FROM nsca_roletype");
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($roleID,$roleName);
            echo " 
                    <br><br>
                    <select name='selectRole' class=\"browser-default custom-select\">
                    <option value='?' selected >Select A User Role</option>
                    ";

            while ($statement->fetch()){

                echo "<option value='$roleID'>$roleName</option>";
            }
            echo"</select>";
        }
    }

    $statement->close();
    $conn->close();
}
/* Method to display the user role End*/

/* Method to change the user role*/
function changeUserInformation($userID){
    $conn = OpenCon();
    if(isset($_POST["selectTeam"])){
        $teamID = $_POST["selectTeam"];
        if($teamID!='?'){
            $statement = $conn->prepare("SELECT TeamID FROM nsca_teamuser WHERE UserID = '$userID'");
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($teamid);
            if($statement->num_rows>0){
                while ($statement->fetch()){
                    if($teamID!=0){
                        $statement = $conn->prepare("UPDATE nsca_teamuser SET TeamID = ? WHERE UserID = '$userID'");
                        $statement->bind_param("i",$teamID);
                        $statement->execute();
                    }else{
                        $statement = $conn->prepare("DELETE FROM nsca_teamuser WHERE UserID = '$userID'");
                        $statement->execute();
                    }

                }
            }else{
                $statement = $conn->prepare("INSERT INTO nsca_teamuser(TeamUserID,UserID,TeamID) VALUES (?,?,?)");
                $statement->bind_param("iii",$userID,$userID,$teamID);
                $statement->execute();
            }
        }
    }

    if(isset($_POST["selectRole"])){
        $userRole = $_POST["selectRole"];
        if($userRole!='?'){
            $statement = $conn->prepare("SELECT UserRole FROM nsca_user WHERE UserID = '$userID'");
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($UserRole);
            if($statement->num_rows>0){
                while ($statement->fetch()){
                    $statement = $conn->prepare("UPDATE nsca_user SET UserRole = ? WHERE UserID = '$userID'");
                    $statement->bind_param("i",$userRole);
                    $statement->execute();
                }
            }
            $statement->close();
            $statement = $conn->prepare("SELECT UserRoleID FROM nsca_userroles WHERE UserID = '$userID'");
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($UserRoleID);
            if($statement->num_rows>0){
                $statement->close();
                $statement = $conn->prepare("UPDATE nsca_userroles SET RoleID = ? WHERE UserID = '$userID'");
                $statement->bind_param("i",$userRole);
                $statement->execute();
            }
            else{
                $statement = $conn->prepare("INSERT INTO `nsca_userroles` (`RoleID`, `UserID`) VALUES (?, ?)");
                $statement->bind_param("ii",$userRole,$userID);
                $statement->execute();
            }
        }
    }
    $statement->close();
    $conn->close();
    echo "<meta http-equiv='refresh' content='0; url=../admin/editUserRole.php'>";

}

//function to sendEmail to user
function displayUserEmail($conn){
   $sql = $conn->prepare("SELECT UserID, email from nsca_user");
   $sql = $sql->execute();
   $allEmails = $sql->get_result();
   $sql->close();

   return $allEmails;


}

/*Display all the name of development prorgam*/
function displayAllTheProgram(){
    $conn = OpenCon();


    $statement = $conn->prepare("SELECT DevID, Name FROM nsca_devprograms");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($DevID,$Name);

    $count = 1;


    //display
    while($statement->fetch())
    {
        echo "<th>$count</th>";
            echo"
                <td>$Name</td>
                <td>
                    <a href=../admin/changeDevProgram.php?programID=$DevID&task=1>
                        <button type='button'>Edit</button>
                    </a>
                </td>
                <td>
                    <a href=../admin/editDevPrograms.php?programID=$DevID&task=2>
                        <button type='button'>Delete</button>
                    </a>
                </td>
            </tr>
        </tbody>";
        $count++;
    }


if(isset($_GET["programID"])&& $_GET["task"]==2){
    $statement->close();
    $programID = $_GET["programID"];
    $statement = $conn->prepare("DELETE FROM nsca_devprograms WHERE DevID = '$programID'");
    $statement->execute();
    $statement->close();

    echo "<meta http-equiv='refresh' content='0; url=../admin/editDevPrograms.php'>";
}

    $statement->close();
    $conn->close();
}
/*Display all the development of team End*/

/* method to create a new development prorgam*/
function createNewProgram($img){

    $conn = OpenCon();
    if(isset($_POST["programName"]) && isset($_POST["duration"]) && isset($_POST["programDescription"]) && isset($_POST["time"]) && isset($_POST["charges"]) && isset($_POST["type"]) && isset($_POST["days"])){
        $programName = $_POST["programName"];
        $duration = $_POST["duration"];
        $prorgamDescription = $_POST["programDescription"];
        $time = $_POST["time"];
        $charges = $_POST["charges"];
        $type = $_POST["type"];
        $days = $_POST["days"];
        $statement = $conn->prepare("SELECT * FROM nsca_devprograms WHERE Name ='$programName'");
        $statement->execute();
        $statement->store_result();
        if($statement->num_rows>0){
            echo "<p class='red-text text-center'>The program already exists!<br>Please make a new one.</p>";
        }else{

            if(isset($programName)){
                $statement->close();
                $statement = $conn->prepare("INSERT INTO `nsca_devprograms` (`Name`, `Duration`, `Description`, `Time`, `Charges`, `Type`, `DaysRun`, `imgFolder`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $statement->bind_param("ssssssss",$programName,$duration,$prorgamDescription,$time,$charges,$type, $days, $img);
                $statement->execute();
                echo "<p class='red-text text-center'>The Program '$programName' created successful!</p>";
                echo "<meta http-equiv='refresh' content='0; url=../admin/editDevPrograms.php'>";
            }

        }
        $statement->close();
    }

    $conn->close();
}
/* method to create a new development program END*/

/*method to display all the visitor of the day during each hour*/
function displayVisitors(){
    $conn = OpenCon();


    $statement = $conn->prepare("SELECT CONCAT(HOUR(Time),' ',ampm), count FROM nsca_viewcount WHERE count>0");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($time,$viewCount);
    while($statement->fetch())
    {
            echo"
                <td>$time</td>
                <td>$viewCount</td>
            </tr>
        </tbody>";
    }
}
/*Display all the name of sub committees*/
function displayAllTheSubCommitees(){
    $conn = OpenCon();


    $statement = $conn->prepare("SELECT SubID, Name FROM nsca_subcommittees");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($SubID,$Name);

    $count = 1;


    
    while($statement->fetch())
    {
        echo "<th>$count</th>";
        echo"
            <td>$Name</td>
            <td>
                <a href=../admin/changeSubCommittees.php?SubID=$SubID>
                    <button type='button'>Edit</button>
                </a>
            </td>
            <td>
            <a href=../admin/editSubCommittees.php?SubID=$SubID&task=1>
                <button type='button' >Delete</button>
            </a>
            </td>
        </tr>
    </tbody>";
    $count++;
    }

    //Delete Sub-committees function
    if(isset($_GET["SubID"])&& $_GET["task"]==1){
        $statement->close();
        $SubID = $_GET["SubID"];
        $statement = $conn->prepare("DELETE FROM nsca_subuser WHERE SubID = '$SubID'");
        $statement->execute();
        $statement->close();
        $statement = $conn->prepare("DELETE FROM nsca_subcommittees WHERE SubID = '$SubID'");
        $statement->execute();
    
        echo "<meta http-equiv='refresh' content='0; url=../admin/editSubCommittees.php'>";
    }
    

    $statement->close();
    $conn->close();
}

/*method to count/increment the view */
function countView()
{   date_default_timezone_set('America/Halifax');
    $conn = OpenCon();
    $hourNow = date("H");
    $stmt = $conn->prepare("UPDATE nsca_viewcount SET count = count+1 WHERE count_ID = $hourNow");
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

/* method to create a new subcommittees*/
function createNewSubCommittees(){

    $conn = OpenCon();
    if(isset($_POST["SubCommittee_Name"]) && isset($_POST["SubCommittee_Description"]) && isset($_POST["Years"])){
        $name = $_POST["SubCommittee_Name"];
        $SubCommitteeDescription = $_POST["SubCommittee_Description"];
        $Years = $_POST["Years"];
        $statement = $conn->prepare("SELECT * FROM nsca_subcommittees WHERE Name ='$name'" );
        $statement->execute();
        $statement->store_result();
        if($statement->num_rows>0){
            echo "<p class='red-text text-center'>The Sub_Committee already exists!<br>Please make a new one.</p>";
        }else{

            if(isset($name)){
                $statement->close();
                $statement = $conn->prepare("INSERT INTO `nsca_subcommittees` ( `Name`, `Description`, `Years`) VALUES (?, ?, ?)");
                $statement->bind_param("sss",$name,$SubCommitteeDescription,$Years);
                $statement->execute();
                echo "<p class='red-text text-center'>The Sub-Committee '$name' created successful!</p>";
                echo "<meta http-equiv='refresh' content='0; url=../admin/editSubCommittees.php'>";
            }

        }
        $statement->close();
    }

    $conn->close();
}

function getSubCommittees($SubID) {
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT * FROM nsca_subcommittees where SubID = ?");
    $stmt->bind_param("i", $SubID);
    $stmt->execute();
    $getSubCommittees = $stmt->get_result();
    $stmt->close();
    return mysqli_fetch_assoc($getSubCommittees);
    $conn->close();
}

/*change/edit existing sub-committees */
function setSubCommittee( $Name, $Description, $Years,$SubID){
    
    $conn = OpenCon();
    $stmt = $conn->prepare("UPDATE nsca_subcommittees
                 SET Name = ?, Description = ?, Years = ?
                 WHERE SubID = ? ");
    $stmt->bind_param("sssi", $Name, $Description,$Years,$SubID);
    $subCommitteeSet = $stmt->execute();
    $stmt->close();
    return $subCommitteeSet;
    $conn->close();
}


/* Get get program details */
function getProgram($devID) {
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT * FROM nsca_devprograms where DevID = ?");
    $stmt->bind_param("i", $devID);
    $stmt->execute();
    $getprogram = $stmt->get_result();
    $stmt->close();
    return mysqli_fetch_assoc($getprogram);
    $conn->close();
}

/*change/edit current program */
function setProrgam($id, $Name, $Duration, $Description, $Time, $Charges, $Type, $DaysRun, $img){
    $conn = OpenCon();
    $stmt = $conn->prepare("UPDATE nsca_devprograms
                 SET Name = ?, Duration = ?, Description = ?, Time = ?, Charges = ?, Type = ?, DaysRun = ?, imgFolder = ?
                 WHERE DevID = ? ");
    $stmt->bind_param("ssssssssi", $Name, $Duration, $Description, $Time, $Charges, $Type, $DaysRun, $img, $id);
    $programSet = $stmt->execute();
    $stmt->close();
    return $programSet;
    $conn->close();
}

// Returns all players in a club
function getPlayersInClub($clubIDGiven, $searchStr="") {
    $conn = OpenCon();

    $statement = $conn->prepare("SELECT nsca_team.TeamName, nsca_teamuser.*, concat(nsca_user.FirstName, ' ',nsca_user.MiddleName,' ', nsca_user.LastName) as name, nsca_user.UserDescription FROM nsca_team 
    INNER JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID AND nsca_teams.ClubID = $clubIDGiven
    INNER JOIN nsca_teamuser ON nsca_teamuser.TeamID = nsca_teams.TeamID
    INNER JOIN nsca_user ON nsca_teamuser.UserID = nsca_user.UserID
    WHERE nsca_user.FirstName LIKE '%$searchStr%' OR nsca_user.MiddleName LIKE '%$searchStr%' OR nsca_user.LastName LIKE '%$searchStr%';
    ");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($teamName,$teamUserID, $userID, $teamID, $isClubManager, $isTeamCaptain, $isViceCaptain, $waitingToJoin, $name, $userDescription);
    $lstAllPlayers = array();

    while ($statement->fetch()){
        $obj_user = new stdClass;
        $obj_user->teamName = $teamName;
        $obj_user->teamID = $teamID;
        $obj_user->userID = $userID;
        $obj_user->isClubManager = $isClubManager;
        $obj_user->isTeamCaptain = $isTeamCaptain;
        $obj_user->isViceCaptain = $isViceCaptain;
        $obj_user->waitingToJoin = $waitingToJoin;
        $obj_user->name = $name;
        $obj_user->userDescription = $userDescription;
        
        $lstAllPlayers[] = $obj_user;
    }
    return $lstAllPlayers;
}

function getPlayersInTeam($teamIDGiven, $searchStr="") {
    $conn = OpenCon();

    $statement = $conn->prepare("SELECT nsca_team.TeamName, nsca_teamuser.*, concat(nsca_user.FirstName, ' ',nsca_user.MiddleName,' ', nsca_user.LastName) as name, nsca_user.UserDescription, nsca_user.imgFolder FROM nsca_team 
    INNER JOIN nsca_teams ON nsca_team.TeamID = nsca_teams.TeamID AND nsca_teams.TeamID = $teamIDGiven
    INNER JOIN nsca_teamuser ON nsca_teamuser.TeamID = nsca_teams.TeamID
    INNER JOIN nsca_user ON nsca_teamuser.UserID = nsca_user.UserID
    WHERE nsca_user.FirstName LIKE '%$searchStr%' OR nsca_user.MiddleName LIKE '%$searchStr%' OR nsca_user.LastName LIKE '%$searchStr%';
    ");

    $statement->execute();
    $statement->store_result();
    $statement->bind_result($teamName,$teamUserID, $userID, $teamID, $isClubManager, $isTeamCaptain, $isViceCaptain, $waitingToJoin, $name, $userDescription, $img);
    $lstAllTeamPlayers = array();

    while ($statement->fetch()){
        $obj_user = new stdClass;
        $obj_user->teamName = $teamName;
        $obj_user->teamID = $teamID;
        $obj_user->userID = $userID;
        $obj_user->isClubManager = $isClubManager;
        $obj_user->isTeamCaptain = $isTeamCaptain;
        $obj_user->isViceCaptain = $isViceCaptain;
        $obj_user->waitingToJoin = $waitingToJoin;
        $obj_user->name = $name;
        $obj_user->userDescription = $userDescription;
        $obj_user->img = $img;
        $lstAllTeamPlayers[] = $obj_user;
    }
    return $lstAllTeamPlayers;
}

function getManagerClubID($managerIDGiven) {
    $conn = OpenCon();

    $statement = $conn->prepare("SELECT nsca_teams.ClubID FROM nsca_teams 
        LEFT JOIN nsca_teamuser ON nsca_teamuser.TeamID = nsca_teams.TeamID 
        WHERE nsca_teamuser.UserID = $managerIDGiven");
    
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($clubID);

    $statement->fetch();
    return $clubID;
}

function getTeamsInClub($clubIDGiven) {
    $conn = OpenCon();

    $statement = $conn->prepare("SELECT nsca_teams.TeamID, nsca_team.TeamName FROM nsca_teams 
        LEFT JOIN nsca_team ON nsca_team.TeamID = nsca_teams.TeamID 
        WHERE nsca_teams.ClubID = $clubIDGiven");
    
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($teamID, $teamName);

    $lstTeams = array();
    while($statement->fetch()) {
        $obj_team = new stdClass;
        $obj_team->teamID = $teamID;
        $obj_team->teamName = $teamName;
        $lstTeams[] = $obj_team;
    }
    return $lstTeams;
}
?>
