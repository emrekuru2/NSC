<?php
    // ~~~ Getting Groups ~~~

    // Receives an array TeamIDs and returns an array with emails of all users associated with the club
    function getClubUserEmails($clubID): array {
        $clubUserEmails = array();

        $conn = OpenCon();
        $clubTeams = getAllClubTeams($conn, $clubID); // Getting all associated teams of the club

        // Getting all user IDs of each team
        for ($i = 0; $i < count($clubTeams); $i++) {
            $teamUserEmails = getTeamUserEmails($clubTeams[$i]); // Getting team users emails
            $clubUserEmails = array_merge($clubUserEmails, $teamUserEmails);
        }

        return getUserEmails($clubUserEmails); // Returning array of club user emails
    }

    // Receives a TeamID and returns an array with emails of all users associated with the team
    function getTeamUserEmails($teamID): array {
        $teamUserEmails = array();

        $conn = OpenCon();
        $teamUsers = getAllTeamUsers($conn, $teamID); // Getting users associated with team

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
        $programUsers = getAllProgramUsers($conn, $programID); // Getting users associated with program

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


    // ~~~ Getting Users ~~~

    // Receives an array of UserIDs, and returns an array with their associated emails.
    function getUserEmails($userIdArray): array {
        $userEmailArray = array();

        // Getting each user's email
        for ($i = 0; $i < count($userIdArray); $i++) {
            $conn = OpenCon();
            $user = getUserInfo($conn, $userIdArray[$i]);

            array_push($userEmailArray, $user['UserID']); // Adding user email to final list
        }

        return $userEmailArray;
    }
