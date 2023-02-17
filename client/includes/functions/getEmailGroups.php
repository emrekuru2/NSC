<?php
    // ~~~ Getting Groups ~~~

    // Returns an array with emails of all users
    function getAllUserEmails(): array {
        $allUserEmails = array();

        $conn = OpenCon();
        $allUsers = getAllUsers($conn);

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($allUsers)) {
            array_push($allUserEmails, $row['email']);
        }

        return $allUserEmails;
    }

    // Returns an array with emails of all users in a club/team
    function getAllClubTeamUserEmails(): array {
        $allClubTeamEmails = array();

        $conn = OpenCon();
        $allClubTeamUsers = getAllClubTeamUsers($conn);

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($allClubTeamUsers)) {
            $userID = array($row['UserID']);
            $allClubTeamEmails = array_merge($allClubTeamEmails, getUserEmails($userID));

        }

        return $allClubTeamEmails;
    }

    // Returns an array with emails of all users in a club/team
    function getAllProgramUserEmails(): array {
        $allProgramUserEmails = array();

        $conn = OpenCon();
        $allProgramUsers = getAllProgramUsers($conn);

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($allProgramUsers)) {
            $userID = array($row['UserID']);
            $allProgramUserEmails = array_merge($allProgramUserEmails, getUserEmails($userID));

        }

        return $allProgramUserEmails;
    }

    // Receives a ClubID and returns an array with emails of all users associated with the club
    function getClubUserEmails($clubID): array {
        $clubUserEmails = array();

        $conn = OpenCon();
        $clubTeams = getAllClubTeams($conn, $clubID); // Getting all associated teams of the club

        // Adding all club users IDs to array
        while ($row = mysqli_fetch_assoc($clubTeams)) {
            $teamUserEmails = getTeamUserEmails($row['TeamID']); // Getting team users emails
            $clubUserEmails = array_merge($clubUserEmails, $teamUserEmails); // Merging club teams users
        }

        return getUserEmails($clubUserEmails); // Returning array of club user emails
    }

    // Receives a TeamID and returns an array with emails of all users associated with the team
    function getTeamUserEmails($teamID): array {
        $teamUserEmails = array();

        $conn = OpenCon();
        $teamUsers = getTeamUsers($conn, $teamID); // Getting users associated with team

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($teamUsers)) {
            array_push($teamUserEmails, $row['UserID']);
        }

        return getUserEmails($teamUserEmails); // Returning array of team user emails
    }

    // Receives a RegionID and returns an array with emails of all users associated with the region/location
    function getRegionUserEmails($locationID): array {
        $regionUserEmails = array();

        $conn = OpenCon();
        $regionUsers = getAllRegionUsers($conn, $locationID); // Getting users associated with region

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($regionUsers)) {
            array_push($regionUserEmails, $row['UserID']);
        }

        return getUserEmails($regionUserEmails); // Returning array of region user emails
    }

    // Receives a DevID/ProgramID and returns an array with emails of all users associated with the program
    function getProgramUserEmails($programID): array {
        $programUserEmails = array();

        $conn = OpenCon();
        $programUsers = getProgramUsers($conn, $programID); // Getting users associated with program

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($programUsers)) {
            array_push($programUserEmails, $row['UserID']);
        }

        return getUserEmails($programUserEmails); // Returning array of region user emails
    }

    // Receives a CommitteeID and returns an array with emails of all users associated with the committee
    function getCommitteeUserEmails($committeeID): array {
        $committeeUserEmails = array();

        $conn = OpenCon();
        $committeeUsers = getAllSubCommitteeUsers($conn, $committeeID); // Getting users associated with program

        // Adding user IDs to array
        while ($row = mysqli_fetch_assoc($committeeUsers)) {
            array_push($committeeUserEmails, $row['UserID']);
        }

        return getUserEmails($committeeUserEmails); // Returning array of region user emails
    }


    // ~~~ Getting Individual Users ~~~

    // Receives an array of UserIDs, and returns an array with their associated emails.
    function getUserEmails($userIdArray) {
        $userEmailArray = array();

        //Getting each user's email
        for ($i = 0; $i < count($userIdArray); $i++) {
            $conn = OpenCon();
            $user = getUser($conn, $userIdArray[$i]);

            // Adding user email to array
            $row = mysqli_fetch_assoc($user);
            array_push($userEmailArray, $row['email']); // Adding user email to list
        }

        return $userEmailArray;
    }
