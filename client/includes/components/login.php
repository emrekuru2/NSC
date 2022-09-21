<?php


session_start();

include_once "../../db/database.php";
include_once "../../db/dbFunctions.php";

$conn = OpenCon();


if ( isset($_POST['submitLogin']) ) { //login script
    if (($_SESSION['session_token'] == $_POST['LoginFormToken'])) { //checks to see if session token matches the one in the hidden field from the form

        $LoginFormEmail = sanitize($conn, $_POST['LoginFormEmail']); //gets the un and ps from the input box
        $LoginFormPassword = sanitize($conn, $_POST['LoginFormPassword']);

        // Create Prepared Statement. Gets email and password
        $stmt = $conn->prepare("select * from NSCA_Login where email= ?");
        $stmt->bind_param("s", $LoginFormEmail);

        // Execute And Get Results
        $stmt->execute();
        $result = mysqli_fetch_assoc($stmt->get_result());
        $stmt->close();

        if ((password_verify($LoginFormPassword, $result['password']))) {
            // Create Prepared Statement. gets user information
            $stmt = $conn->prepare("SELECT * FROM nsca_user WHERE UserID = ?");
            $stmt->bind_param("i", $result['UserID']);

            // Execute And Get Results
            $stmt->execute();
            $userresult = $stmt->get_result();
            $stmt->close();

            setcookie('login_access', date('d-M-Y') . ", at " . date('H:i:s A'), time() + (86400 * 30), "/");
            while ($row = mysqli_fetch_assoc($userresult)) { //retrieves the data and puts it into an array

                $User_ID = $row['UserID'];
                $UserRole = $row['UserRole'];
                $UserEmail = $row['email'];
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];
                $StreetAddress = $row['StreetAddress'];
                $City = $row['City'];
                $Province = $row['Province'];
                $Country = $row['Country'];
                $PostalCode = $row['PostalCode'];
                $Phone = $row['Phone'];
                $userDescription = $row['UserDescription'];
                $imgFolder = $row['imgFolder'];

                $_SESSION['User_ID'] = $User_ID;
                $_SESSION['UserRole'] = $UserRole;
                $_SESSION['Email'] = $UserEmail;
                $_SESSION['FirstName'] = $FirstName;
                $_SESSION['LastName'] = $LastName;
                $_SESSION['StreetAddress'] = $StreetAddress;
                $_SESSION['City'] = $City;
                $_SESSION['Province'] = $Province;
                $_SESSION['Country'] = $Country;
                $_SESSION['PostalCode'] = $PostalCode;
                $_SESSION['UserDescription'] = $userDescription;
                $_SESSION['phone'] = $Phone;
                $_SESSION['imgFolder'] = $imgFolder;
                $_SESSION['LoggedIn'] = true;
            }
            header("location:../../index"); //redirects user
        } else {
            header("location:../components/loginform?LoginError=true"); //redirects user with login error
        }
    } else {
        header("location:../components/loginform?sessionMismatch=true"); //redirects user with login error
    }

}

echo "test";
// Close connection
mysqli_close($conn);

