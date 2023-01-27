-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql8001.site4now.net
-- Generation Time: Dec 11, 2022 at 04:34 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a8ec98_nsca`
--

-- --------------------------------------------------------

--
-- Table structure for table `nsca_alerts`
--

CREATE TABLE `nsca_alerts` (
  `Alert_ID` int NOT NULL,
  `Alert_Title` varchar(100) DEFAULT NULL,
  `Alert_Content` text,
  `Alert_Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_alerts`
--

INSERT INTO `nsca_alerts` (`Alert_ID`, `Alert_Title`, `Alert_Content`, `Alert_Status`) VALUES
(1, 'No Games today!', 'No games will be played today due to the weather!', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_clubs`
--

CREATE TABLE `nsca_clubs` (
  `ClubID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `abbreviation` varchar(64) DEFAULT NULL,
  `Website` varchar(128) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Facebook` varchar(256) DEFAULT NULL,
  `TeamImage` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_clubs`
--

INSERT INTO `nsca_clubs` (`ClubID`, `Name`, `abbreviation`, `Website`, `Description`, `Email`, `Phone`, `Facebook`, `TeamImage`) VALUES
(1, 'Halifax Cricket Club', 'HCC', NULL, NULL, 'halifaxcricketclub@gmail.com', '403-702-1916', 'https://www.facebook.com/halifaxcricketclub/', 'img/clubs/HalifaxCricketClub.jpg'),
(2, 'East Coast Cricket Club', 'ECCC', 'https://eastcoastcricketclub.ca/', NULL, 'eastcoastcricketclub@gmail.com', '902-789-6335', 'https://www.facebook.com/cricketclubofeastcoast/', 'img/clubs/EastCoastCricketClub.jpg'),
(3, 'Nova Scotia Avengers Cricket Club', 'Avengers', NULL, NULL, 'novascotiaavengers@gmail.com', '709-699-8717', 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/', 'img/clubs/NovaScotiaAvengersCricketClub.jpg'),
(4, 'Halifax Titans Cricket Club', 'Titans', 'https://halifaxtitanscricketclub.com/', NULL, 'halifaxtitanscricketclub@gmail.com', '902-414-5502', 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/', 'img/clubs/HfxTitansCricketClub.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_competition`
--

CREATE TABLE `nsca_competition` (
  `CompetitionID` int NOT NULL,
  `CompetitionName` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `CompTypeID` int DEFAULT NULL,
  `YearRunning` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_competition`
--

INSERT INTO `nsca_competition` (`CompetitionID`, `CompetitionName`, `Description`, `CompTypeID`, `YearRunning`) VALUES
(1, 'LionsAgaistSnakes', 'Lions against snake', 1, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_competitiontype`
--

CREATE TABLE `nsca_competitiontype` (
  `CompTypeID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_competitiontype`
--

INSERT INTO `nsca_competitiontype` (`CompTypeID`, `Name`, `Description`) VALUES
(1, 'Competition Type A', 'Competition Type A');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_devprograms`
--

CREATE TABLE `nsca_devprograms` (
  `DevID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Duration` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Time` varchar(64) DEFAULT NULL,
  `Charges` varchar(64) DEFAULT NULL,
  `Type` varchar(64) DEFAULT NULL,
  `DaysRun` varchar(64) DEFAULT NULL,
  `imgFolder` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT './img/DevProgram/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_devprograms`
--

INSERT INTO `nsca_devprograms` (`DevID`, `Name`, `Duration`, `Description`, `Time`, `Charges`, `Type`, `DaysRun`, `imgFolder`) VALUES
(1, 'Youth Summer Camp', '16 weeks', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus ', '0915-1515', '$50 monthly', 'youth', 'Saturdays and Sundays', './img/DevProgram/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_devroleuser`
--

CREATE TABLE `nsca_devroleuser` (
  `DevRoleUserID` int NOT NULL,
  `DevID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `IsLead` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nsca_location`
--

CREATE TABLE `nsca_location` (
  `LocationID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Address` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nsca_locationuser`
--

CREATE TABLE `nsca_locationuser` (
  `LocUserID` int NOT NULL,
  `LocationID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nsca_login`
--

CREATE TABLE `nsca_login` (
  `LoginID` int NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `UserID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_login`
--

INSERT INTO `nsca_login` (`LoginID`, `email`, `password`, `UserID`) VALUES
(1, 'Guest@gmail.com', '$2y$10$xu5G5zLj/1TKuPeEcwNgYu3D8ULSJWBGxVCyvbZUDZUvIvN4Iqer2', 1),
(2, 'Umpire@gmail.com', '$2y$10$xu5G5zLj/1TKuPeEcwNgYu3D8ULSJWBGxVCyvbZUDZUvIvN4Iqer2', 2),
(3, 'Player@gmail.com', '$2y$10$xu5G5zLj/1TKuPeEcwNgYu3D8ULSJWBGxVCyvbZUDZUvIvN4Iqer2', 3),
(4, 'Admin@gmail.com', '$2y$10$xu5G5zLj/1TKuPeEcwNgYu3D8ULSJWBGxVCyvbZUDZUvIvN4Iqer2', 4),
(5, 'Manager@gmail.com', '$2y$10$xu5G5zLj/1TKuPeEcwNgYu3D8ULSJWBGxVCyvbZUDZUvIvN4Iqer2', 5),
(12, 'test@dal.ca', '$2y$10$.Ta4Rg6vFTNp6RYYSYQzreeYAoAOJQqrXhWjqJ0ck4dDZcxLfabuG', 12),
(13, 'test@test.ca', '$2y$10$OZx.vcDcm1msBtiwvinoWOu8L9Us3jQtzweOSANX.mvf/t.RehJke', 13),
(14, 'mahmud@dal.ca', '$2y$10$XULTgwBo2/8k55l.vOt0tOT3uFqSaIMlDhlZDfU5BmPXU0D26F9rm', 14),
(15, 'mahmud@test.ca', '$2y$10$TuKZTa5csLFI9VhzeHxMDurixAoONDq5SvpGR7Pslk38E0cSDAUBi', 15),
(16, 'admin@cricketnovascotia.ca', '$2y$10$LoPrgG6yXD.5vL7cRkvv0O49B8MsenyUzKZVtL36.ysjSDOIlfg2m', 17);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_news`
--

CREATE TABLE `nsca_news` (
  `NewsID` int NOT NULL,
  `UserID` int NOT NULL,
  `Title` varchar(128) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Content` text,
  `Pictures` text,
  `Videos` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_news`
--

INSERT INTO `nsca_news` (`NewsID`, `UserID`, `Title`, `FirstName`, `LastName`, `Email`, `Date`, `Content`, `Pictures`, `Videos`) VALUES
(104, 4, 'Tropical Storm Coming!', 'Admin', 'User', 'Admin@gmail.com', '2022-12-03 01:06:06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac lorem non odio imperdiet tincidunt. Pellentesque ligula justo, sagittis eget turpis ac, tincidunt ultrices lectus. Aliquam vehicula felis eu mollis vestibulum. Sed fringilla nulla fermentum ante ultricies, sed sodales ex vehicula. Etiam id massa porttitor, feugiat odio vitae, rhoncus erat. Integer convallis leo ac lectus porttitor interdum. Suspendisse mattis risus vel purus pharetra, eget feugiat nibh gravida. Maecenas ac pharetra nisi. Mauris sagittis, nibh sollicitudin iaculis laoreet, enim nunc placerat tortor, at mattis tellus massa eget nulla. Proin luctus malesuada arcu vitae tincidunt. Aliquam sed felis malesuada, fermentum erat ultricies, suscipit elit. Phasellus nec aliquet enim. Ut sed purus elit. Sed quis dolor non leo malesuada lobortis eget et ipsum.\r\n\r\nMauris suscipit accumsan felis, id finibus elit commodo in. Quisque sed justo mollis, facilisis risus nec, condimentum leo. Sed sem eros, laoreet at consequat at, condimentum non lorem. Suspendisse nec odio quis dui scelerisque rhoncus. Morbi sapien metus, lacinia id eleifend sed, accumsan eu justo. In et libero at nunc consectetur tincidunt. Maecenas fermentum mauris felis, ut accumsan nunc hendrerit in. Duis non euismod augue. Quisque porttitor rhoncus orci, fringilla aliquam lectus pulvinar quis. Etiam venenatis enim orci, vitae fermentum mauris dapibus ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent at odio vehicula, dapibus mi luctus, interdum urna. Donec eu euismod lectus, consectetur volutpat turpis. Curabitur sem tortor, sodales vitae lorem ut, aliquam auctor libero. Phasellus augue lorem, ornare et vestibulum vitae, consequat at eros.\r\n\r\nVivamus fermentum nibh mi, vitae bibendum dui convallis eget. Phasellus ante sapien, lobortis a libero sit amet, faucibus aliquam libero. Nulla mattis bibendum quam, sit amet eleifend erat convallis ut. Nunc porta bibendum felis in dapibus. Aliquam id est euismod, auctor est eget, vehicula neque. Quisque porttitor nec nunc id accumsan. Sed mattis, lorem lacinia bibendum semper, mauris eros sodales felis, eget accumsan neque mi eget metus. Phasellus in sapien sodales lacus bibendum sollicitudin.\r\n\r\nSed sit amet libero quis lectus scelerisque eleifend. Nam sodales feugiat aliquet. Curabitur id arcu tellus. Pellentesque velit tortor, fringilla in tincidunt in, ornare a nunc. Duis congue turpis id ligula commodo hendrerit. Phasellus in lorem eu tellus tempus lobortis. Praesent ultrices sapien quis faucibus interdum. Aliquam erat volutpat. Praesent quis finibus turpis. Vestibulum luctus consectetur sodales. Mauris congue faucibus dui, non porta ipsum efficitur et. Sed odio lectus, aliquet vitae tristique eu, pharetra in velit.\r\n\r\nInteger fermentum odio id purus condimentum imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In posuere cursus quam nec sodales. Proin ornare placerat accumsan. Praesent bibendum dolor vitae felis eleifend, nec rhoncus nisi mattis. Donec vitae dictum ipsum. Donec elementum enim eget massa vehicula porttitor. Fusce aliquet tristique massa nec ultrices. Phasellus dignissim nibh nec magna ultricies tincidunt. Etiam rutrum vestibulum neque, sit amet auctor tellus finibus sit amet. Vestibulum hendrerit quis mi vitae tristique. Fusce gravida purus diam, a vehicula ligula laoreet non. Pellentesque dignissim viverra suscipit. Etiam viverra scelerisque metus vel vulputate. Pellentesque sed pharetra risus, aliquet elementum quam.', 'img/newsImages/Admin_User_638aa0fe4eaa6/', NULL),
(106, 4, 'Lions vs Snakes Playing tomorrow!', 'Admin', 'User', 'Admin@gmail.com', '2022-12-03 01:10:37', 'Come tomorrow at 11am!', 'img/newsImages/Admin_User_638aa20de40c7/', NULL),
(107, 4, 'Testing News', 'Admin', 'User', 'Admin@gmail.com', '2022-12-03 01:11:44', 'Working!', 'img/newsImages/Admin_User_638aa25076b35/', NULL),
(108, 4, 'Tropical Storm Coming2!', 'Admin', 'User', 'Admin@gmail.com', '2022-12-03 01:06:06', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac lorem non odio imperdiet tincidunt. Pellentesque ligula justo, sagittis eget turpis ac, tincidunt ultrices lectus. Aliquam vehicula felis eu mollis vestibulum. Sed fringilla nulla fermentum ante ultricies, sed sodales ex vehicula. Etiam id massa porttitor, feugiat odio vitae, rhoncus erat. Integer convallis leo ac lectus porttitor interdum. Suspendisse mattis risus vel purus pharetra, eget feugiat nibh gravida. Maecenas ac pharetra nisi. Mauris sagittis, nibh sollicitudin iaculis laoreet, enim nunc placerat tortor, at mattis tellus massa eget nulla. Proin luctus malesuada arcu vitae tincidunt. Aliquam sed felis malesuada, fermentum erat ultricies, suscipit elit. Phasellus nec aliquet enim. Ut sed purus elit. Sed quis dolor non leo malesuada lobortis eget et ipsum.\r\n\r\nMauris suscipit accumsan felis, id finibus elit commodo in. Quisque sed justo mollis, facilisis risus nec, condimentum leo. Sed sem eros, laoreet at consequat at, condimentum non lorem. Suspendisse nec odio quis dui scelerisque rhoncus. Morbi sapien metus, lacinia id eleifend sed, accumsan eu justo. In et libero at nunc consectetur tincidunt. Maecenas fermentum mauris felis, ut accumsan nunc hendrerit in. Duis non euismod augue. Quisque porttitor rhoncus orci, fringilla aliquam lectus pulvinar quis. Etiam venenatis enim orci, vitae fermentum mauris dapibus ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent at odio vehicula, dapibus mi luctus, interdum urna. Donec eu euismod lectus, consectetur volutpat turpis. Curabitur sem tortor, sodales vitae lorem ut, aliquam auctor libero. Phasellus augue lorem, ornare et vestibulum vitae, consequat at eros.\r\n\r\nVivamus fermentum nibh mi, vitae bibendum dui convallis eget. Phasellus ante sapien, lobortis a libero sit amet, faucibus aliquam libero. Nulla mattis bibendum quam, sit amet eleifend erat convallis ut. Nunc porta bibendum felis in dapibus. Aliquam id est euismod, auctor est eget, vehicula neque. Quisque porttitor nec nunc id accumsan. Sed mattis, lorem lacinia bibendum semper, mauris eros sodales felis, eget accumsan neque mi eget metus. Phasellus in sapien sodales lacus bibendum sollicitudin.\r\n\r\nSed sit amet libero quis lectus scelerisque eleifend. Nam sodales feugiat aliquet. Curabitur id arcu tellus. Pellentesque velit tortor, fringilla in tincidunt in, ornare a nunc. Duis congue turpis id ligula commodo hendrerit. Phasellus in lorem eu tellus tempus lobortis. Praesent ultrices sapien quis faucibus interdum. Aliquam erat volutpat. Praesent quis finibus turpis. Vestibulum luctus consectetur sodales. Mauris congue faucibus dui, non porta ipsum efficitur et. Sed odio lectus, aliquet vitae tristique eu, pharetra in velit.\r\n\r\nInteger fermentum odio id purus condimentum imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In posuere cursus quam nec sodales. Proin ornare placerat accumsan. Praesent bibendum dolor vitae felis eleifend, nec rhoncus nisi mattis. Donec vitae dictum ipsum. Donec elementum enim eget massa vehicula porttitor. Fusce aliquet tristique massa nec ultrices. Phasellus dignissim nibh nec magna ultricies tincidunt. Etiam rutrum vestibulum neque, sit amet auctor tellus finibus sit amet. Vestibulum hendrerit quis mi vitae tristique. Fusce gravida purus diam, a vehicula ligula laoreet non. Pellentesque dignissim viverra suscipit. Etiam viverra scelerisque metus vel vulputate. Pellentesque sed pharetra risus, aliquet elementum quam.', 'img/newsImages/Admin_User_638aa0fe4eaa6/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_news_comments`
--

CREATE TABLE `nsca_news_comments` (
  `CommentID` int NOT NULL,
  `NewsID` int NOT NULL,
  `UserID` int NOT NULL,
  `Comment` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nsca_roletype`
--

CREATE TABLE `nsca_roletype` (
  `RoleID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_roletype`
--

INSERT INTO `nsca_roletype` (`RoleID`, `Name`, `Description`) VALUES
(1, 'Guest User', 'Guest User'),
(2, 'Umpire', 'Umpire'),
(3, 'Player', 'Player'),
(4, 'Admin', 'Admin'),
(5, 'Manager', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_subcommittees`
--

CREATE TABLE `nsca_subcommittees` (
  `SubID` int NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Years` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_subcommittees`
--

INSERT INTO `nsca_subcommittees` (`SubID`, `Name`, `Description`, `Years`) VALUES
(10, 'trial', ' common try', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_subuser`
--

CREATE TABLE `nsca_subuser` (
  `SubUserID` int NOT NULL,
  `SubID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `IsLead` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nsca_team`
--

CREATE TABLE `nsca_team` (
  `TeamID` int NOT NULL,
  `TeamName` varchar(64) NOT NULL,
  `Description` varchar(64) NOT NULL,
  `TeamProfilePicture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_team`
--

INSERT INTO `nsca_team` (`TeamID`, `TeamName`, `Description`, `TeamProfilePicture`) VALUES
(1, 'Lions', 'Lions of Halifax', 'NovaScotiaWarriors.jpg'),
(2, 'Falcons', 'Falcons of Dartmouth', 'predators.jpg'),
(3, 'Tigers', 'Tigers of Bedford', 'NSAvengers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_teamjoinlist`
--

CREATE TABLE `nsca_teamjoinlist` (
  `JoinListID` int NOT NULL,
  `UserID` int NOT NULL,
  `TeamID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_teamjoinlist`
--

INSERT INTO `nsca_teamjoinlist` (`JoinListID`, `UserID`, `TeamID`) VALUES
(1, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_teams`
--

CREATE TABLE `nsca_teams` (
  `TeamID` int NOT NULL,
  `ClubID` int DEFAULT NULL,
  `CompID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_teams`
--

INSERT INTO `nsca_teams` (`TeamID`, `ClubID`, `CompID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_teamuser`
--

CREATE TABLE `nsca_teamuser` (
  `TeamUserID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `TeamID` int DEFAULT NULL,
  `isClubManager` int DEFAULT '0',
  `isTeamCaptain` int DEFAULT '0',
  `isViceCaptain` int DEFAULT '0',
  `waitingToJoin` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_teamuser`
--

INSERT INTO `nsca_teamuser` (`TeamUserID`, `UserID`, `TeamID`, `isClubManager`, `isTeamCaptain`, `isViceCaptain`, `waitingToJoin`) VALUES
(5, 5, 1, 1, 0, 0, 0),
(6, 6, 1, 0, 0, 0, 0),
(7, 7, 2, 0, 0, 0, 0),
(8, 8, 2, 0, 0, 0, 0),
(9, 9, 3, 0, 1, 0, 0),
(10, 10, 1, 0, 1, 0, 1),
(11, 11, 1, 0, 0, 0, 1),
(17, 17, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_user`
--

CREATE TABLE `nsca_user` (
  `UserID` int NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `UserRole` varchar(64) DEFAULT NULL,
  `FirstName` varchar(32) DEFAULT NULL,
  `MiddleName` varchar(64) DEFAULT NULL,
  `LastName` varchar(32) DEFAULT NULL,
  `StreetAddress` varchar(64) DEFAULT NULL,
  `City` varchar(64) DEFAULT NULL,
  `Province` varchar(64) DEFAULT NULL,
  `Country` varchar(64) DEFAULT NULL,
  `PostalCode` varchar(6) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `UserDate` varchar(64) DEFAULT NULL,
  `imgFolder` varchar(128) DEFAULT NULL,
  `UserDescription` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_user`
--

INSERT INTO `nsca_user` (`UserID`, `email`, `UserRole`, `FirstName`, `MiddleName`, `LastName`, `StreetAddress`, `City`, `Province`, `Country`, `PostalCode`, `Phone`, `UserDate`, `imgFolder`, `UserDescription`) VALUES
(1, 'Guest@gmail.com', '1', 'Guest', '', 'User', 'street', 'city', 'province', 'Canada', 'B3H0C7', '1111111111', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Guest user!'),
(2, 'Umpire@gmail.com', '2', 'Umpire', '', 'User', 'street', 'city', 'province', 'Canada', 'B3H0C7', '1111111111', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Umpire!'),
(3, 'Player@gmail.com', '3', 'Player', '', 'User', 'street', 'city', 'province', 'Canada', 'B3H0C7', '1111111111', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Player!'),
(4, 'admin@gmail.com', '4', 'Admin', '', 'User', 'street', 'city', 'province', 'Canada', 'B3H0C7', '1111111111', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Admin!'),
(5, 'Manager@gmail.com', '5', 'Manager', '', 'User', 'street', 'city', 'province', 'Canada', 'B3H0C7', '1111111111', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Manager!'),
(6, 'rohit@india.com', '3', 'Rohit', '', 'Sharma', '12 avenue', 'New Delhi', 'Delhi', 'India', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Captain of team Lions'),
(7, 'kohli@gmail.com', '3', 'Virat', '', 'Kohli', '15 avenue', 'Halifax', 'Nova Scotia', 'Canada', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Sigma_Jahan_634977c51a6f5/', 'Batter of team Lions'),
(8, 'nawaz@gmail.com', '3', 'Mohammed', '', 'Nawaz', '15 avenue', 'Halifax', 'Nova Scotia', 'Canada', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Sigma_Jahan_634977c51a6f5/', 'All Rounder of team Falcons'),
(9, 'rohit@india.com', '3', 'Sarfaraz', '', 'Ahmed', '15 avenue', 'Dartmouth', 'NovaScotia', 'Canada', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Sigma_Jahan_634977c51a6f5/', 'Captain of team Falcons'),
(10, 'iqbal@gmail.com', '3', 'Tamim', '', 'Iqbal', '12 avenue', 'Bedford', 'Nova Scotia', 'Canada', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5e03fbb26ad53/', 'Captain of team Tigers'),
(11, 'hasan@gmail.com', '3', 'Shakib', 'Al', 'Hasan', '12 avanue', 'Bedford', 'Nova Scotia', 'Canada', 'B2W0E8', '9024455991', '2019-11-22 05:16:46', '../../img/userPictures/Khurram_Aziz_5e03fbb26ad53/', 'Batter of team Tigers'),
(12, 'test@dal.ca', '1', 'test', '', 'test', 'test', 'halifax', 'AB', 'Canada', 'X2X2X2', '9024030576', '2022-11-22 14:23:34', 'img/userPictures/test_test_637ccd565fa04/', 'Hello! My name is test test!'),
(13, 'test@test.ca', '1', 'test', '', 'test', 'test', 'halifax', 'AB', 'Canada', 'X2X2X2', '9024030576', '2022-11-22 14:26:53', 'img/userPictures/test_test_637cce1d12d9c/', 'Hello! My name is test test!'),
(14, 'mahmud@dal.ca', '1', 'Mahmood', '', 'Monjur', '45678', 'Halifax', 'NS', 'Canada', 'B3H4J6', '9024030576', '2022-12-06 00:12:02', 'img/userPictures/Mahmood_Monjur_638e7ac230834/', 'Hello! My name is Mahmood Monjur!'),
(15, 'mahmud@test.ca', '1', 'Mahmood', '', 'Monjur', '579', 'Halifax', 'AB', 'Canada', 'X2X2X2', '9024030576', '2022-12-06 00:14:25', 'img/userPictures/Mahmood_Monjur_638e7b51c9a59/', 'Hello! My name is Mahmood Monjur!'),
(17, 'admin@cricketnovascotia.ca', '4', 'Admin', '', 'Main', '18 South Streeet', 'Halifax', 'NS', 'Canada', 'B2W0E8', '9023332286', '2022-12-07 16:22:48', '../../img/userPictures/Khurram_Aziz_5df7e4b1ceccc/', 'Hello! My name is Admin Main!');

-- --------------------------------------------------------

--
-- Table structure for table `nsca_userroles`
--

CREATE TABLE `nsca_userroles` (
  `UserRoleID` int NOT NULL,
  `RoleID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nsca_userroles`
--

INSERT INTO `nsca_userroles` (`UserRoleID`, `RoleID`, `UserID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `nsca_viewcount`
--

CREATE TABLE `nsca_viewcount` (
  `count_ID` int NOT NULL,
  `Time` time NOT NULL,
  `ampm` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nsca_viewcount`
--

INSERT INTO `nsca_viewcount` (`count_ID`, `Time`, `ampm`, `count`) VALUES
(0, '12:00:00', 'am', 0),
(1, '01:00:00', 'am', 0),
(2, '02:00:00', 'am', 0),
(3, '03:00:00', 'am', 0),
(4, '04:00:00', 'am', 0),
(5, '05:00:00', 'am', 0),
(6, '06:00:00', 'am', 0),
(7, '07:00:00', 'am', 0),
(8, '08:00:00', 'am', 0),
(9, '09:00:00', 'am', 0),
(10, '10:00:00', 'am', 0),
(11, '11:00:00', 'am', 0),
(12, '12:00:00', 'pm', 0),
(13, '01:00:00', 'pm', 0),
(14, '02:00:00', 'pm', 0),
(15, '03:00:00', 'pm', 2),
(16, '04:00:00', 'pm', 16),
(17, '05:00:00', 'pm', 0),
(18, '06:00:00', 'pm', 0),
(19, '07:00:00', 'pm', 0),
(20, '08:00:00', 'pm', 0),
(21, '09:00:00', 'pm', 0),
(22, '10:00:00', 'pm', 0),
(23, '11:00:00', 'pm', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nsca_alerts`
--
ALTER TABLE `nsca_alerts`
  ADD PRIMARY KEY (`Alert_ID`);

--
-- Indexes for table `nsca_clubs`
--
ALTER TABLE `nsca_clubs`
  ADD PRIMARY KEY (`ClubID`);

--
-- Indexes for table `nsca_competition`
--
ALTER TABLE `nsca_competition`
  ADD PRIMARY KEY (`CompetitionID`),
  ADD KEY `nsca_competition_nsca_competitiontype_CompTypeID_fk` (`CompTypeID`);

--
-- Indexes for table `nsca_competitiontype`
--
ALTER TABLE `nsca_competitiontype`
  ADD PRIMARY KEY (`CompTypeID`);

--
-- Indexes for table `nsca_devprograms`
--
ALTER TABLE `nsca_devprograms`
  ADD PRIMARY KEY (`DevID`);

--
-- Indexes for table `nsca_devroleuser`
--
ALTER TABLE `nsca_devroleuser`
  ADD PRIMARY KEY (`DevRoleUserID`),
  ADD KEY `DevRoleUser_nsca_devprograms_DevID_fk` (`DevID`),
  ADD KEY `nsca_devroleuser_nsca_userroles_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_location`
--
ALTER TABLE `nsca_location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `nsca_locationuser`
--
ALTER TABLE `nsca_locationuser`
  ADD PRIMARY KEY (`LocUserID`),
  ADD KEY `nsca_LocationUser_nsca_location_LocationID_fk` (`LocationID`),
  ADD KEY `nsca_LocationUser_nsca_user_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_login`
--
ALTER TABLE `nsca_login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `nsca_login_nsca_user_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_news`
--
ALTER TABLE `nsca_news`
  ADD PRIMARY KEY (`NewsID`),
  ADD KEY `NewsID_to_UserID` (`UserID`);

--
-- Indexes for table `nsca_roletype`
--
ALTER TABLE `nsca_roletype`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `nsca_subcommittees`
--
ALTER TABLE `nsca_subcommittees`
  ADD PRIMARY KEY (`SubID`);

--
-- Indexes for table `nsca_subuser`
--
ALTER TABLE `nsca_subuser`
  ADD PRIMARY KEY (`SubUserID`),
  ADD KEY `nsca_subuser_nsca_subcommittees_SubID_fk` (`SubID`),
  ADD KEY `nsca_subuser_nsca_user_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_team`
--
ALTER TABLE `nsca_team`
  ADD PRIMARY KEY (`TeamID`);

--
-- Indexes for table `nsca_teamjoinlist`
--
ALTER TABLE `nsca_teamjoinlist`
  ADD PRIMARY KEY (`JoinListID`);

--
-- Indexes for table `nsca_teams`
--
ALTER TABLE `nsca_teams`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `ncsa_teams_nsca_clubs_ClubID_fk` (`ClubID`),
  ADD KEY `ncsa_teams_nsca_competition_CompetitionID_fk` (`CompID`);

--
-- Indexes for table `nsca_teamuser`
--
ALTER TABLE `nsca_teamuser`
  ADD PRIMARY KEY (`TeamUserID`),
  ADD KEY `nsca_teamUser_ncsa_teams_TeamID_fk` (`TeamID`),
  ADD KEY `nsca_teamUser_nsca_user_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_user`
--
ALTER TABLE `nsca_user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `nsca_userroles`
--
ALTER TABLE `nsca_userroles`
  ADD PRIMARY KEY (`UserRoleID`),
  ADD KEY `nsca_userroles_nsca_roletype_RoleID_fk` (`RoleID`),
  ADD KEY `nsca_userroles_nsca_user_UserID_fk` (`UserID`);

--
-- Indexes for table `nsca_viewcount`
--
ALTER TABLE `nsca_viewcount`
  ADD PRIMARY KEY (`count_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nsca_alerts`
--
ALTER TABLE `nsca_alerts`
  MODIFY `Alert_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nsca_clubs`
--
ALTER TABLE `nsca_clubs`
  MODIFY `ClubID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nsca_competition`
--
ALTER TABLE `nsca_competition`
  MODIFY `CompetitionID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nsca_competitiontype`
--
ALTER TABLE `nsca_competitiontype`
  MODIFY `CompTypeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nsca_devprograms`
--
ALTER TABLE `nsca_devprograms`
  MODIFY `DevID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nsca_devroleuser`
--
ALTER TABLE `nsca_devroleuser`
  MODIFY `DevRoleUserID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nsca_location`
--
ALTER TABLE `nsca_location`
  MODIFY `LocationID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nsca_locationuser`
--
ALTER TABLE `nsca_locationuser`
  MODIFY `LocUserID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nsca_login`
--
ALTER TABLE `nsca_login`
  MODIFY `LoginID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nsca_news`
--
ALTER TABLE `nsca_news`
  MODIFY `NewsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `nsca_roletype`
--
ALTER TABLE `nsca_roletype`
  MODIFY `RoleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nsca_subcommittees`
--
ALTER TABLE `nsca_subcommittees`
  MODIFY `SubID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nsca_subuser`
--
ALTER TABLE `nsca_subuser`
  MODIFY `SubUserID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nsca_team`
--
ALTER TABLE `nsca_team`
  MODIFY `TeamID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nsca_teamjoinlist`
--
ALTER TABLE `nsca_teamjoinlist`
  MODIFY `JoinListID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nsca_teams`
--
ALTER TABLE `nsca_teams`
  MODIFY `TeamID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nsca_teamuser`
--
ALTER TABLE `nsca_teamuser`
  MODIFY `TeamUserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nsca_user`
--
ALTER TABLE `nsca_user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nsca_userroles`
--
ALTER TABLE `nsca_userroles`
  MODIFY `UserRoleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nsca_competition`
--
ALTER TABLE `nsca_competition`
  ADD CONSTRAINT `nsca_competition_nsca_competitiontype_CompTypeID_fk` FOREIGN KEY (`CompTypeID`) REFERENCES `nsca_competitiontype` (`CompTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_devroleuser`
--
ALTER TABLE `nsca_devroleuser`
  ADD CONSTRAINT `DevRoleUser_nsca_devprograms_DevID_fk` FOREIGN KEY (`DevID`) REFERENCES `nsca_devprograms` (`DevID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_devroleuser_nsca_userroles_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_userroles` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_locationuser`
--
ALTER TABLE `nsca_locationuser`
  ADD CONSTRAINT `nsca_LocationUser_nsca_location_LocationID_fk` FOREIGN KEY (`LocationID`) REFERENCES `nsca_location` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_LocationUser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_login`
--
ALTER TABLE `nsca_login`
  ADD CONSTRAINT `nsca_login_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_news`
--
ALTER TABLE `nsca_news`
  ADD CONSTRAINT `NewsID_to_UserID` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`);

--
-- Constraints for table `nsca_subuser`
--
ALTER TABLE `nsca_subuser`
  ADD CONSTRAINT `nsca_subuser_nsca_subcommittees_SubID_fk` FOREIGN KEY (`SubID`) REFERENCES `nsca_subcommittees` (`SubID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_subuser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_teams`
--
ALTER TABLE `nsca_teams`
  ADD CONSTRAINT `ncsa_teams_nsca_clubs_ClubID_fk` FOREIGN KEY (`ClubID`) REFERENCES `nsca_clubs` (`ClubID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ncsa_teams_nsca_competition_CompetitionID_fk` FOREIGN KEY (`CompID`) REFERENCES `nsca_competition` (`CompetitionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_teamuser`
--
ALTER TABLE `nsca_teamuser`
  ADD CONSTRAINT `nsca_teamUser_ncsa_teams_TeamID_fk` FOREIGN KEY (`TeamID`) REFERENCES `nsca_teams` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_teamUser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nsca_userroles`
--
ALTER TABLE `nsca_userroles`
  ADD CONSTRAINT `nsca_userroles_nsca_roletype_RoleID_fk` FOREIGN KEY (`RoleID`) REFERENCES `nsca_roletype` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_userroles_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
