SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `projectnsca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projectnsca`;

CREATE TABLE `nsca_alerts` (
  `Alert_ID` int(11) NOT NULL,
  `Alert_Title` varchar(100) DEFAULT NULL,
  `Alert_Content` text DEFAULT NULL,
  `Alert_Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_clubs` (
  `ClubID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Abbreviation` varchar(20) DEFAULT NULL,
  `Website` varchar(128) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Facebook` varchar(256) DEFAULT NULL,
  `TeamImage` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nsca_clubs` (`ClubID`, `Name`, `Abbreviation`, `Website`, `Description`, `Email`, `Phone`, `Facebook`, `TeamImage`) VALUES
(1, 'Halifax Cricket Club', 'HCC', NULL, NULL, 'halifaxcricketclub@gmail.com', '403-702-1916', 'https://www.facebook.com/halifaxcricketclub/', 'HalifaxCricketClub.jpg'),
(2, 'East Coast Cricket Club', 'ECCC', 'https://eastcoastcricketclub.ca/', NULL, 'eastcoastcricketclub@gmail.com', '902-789-6335', 'https://www.facebook.com/cricketclubofeastcoast/', 'EastCoastCricketClub.jpg'),
(3, 'Nova Scotia Avengers Cricket Club', 'Avengers', NULL, NULL, 'novascotiaavengers@gmail.com', '709-699-8717', 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/', 'NovaScotiaAvengersCricketClub.jpg'),
(4, 'Hfx-Titans Cricket Club', 'Titans', 'https://halifaxtitanscricketclub.com/', NULL, 'halifaxtitanscricketclub@gmail.com', '902-414-5502', 'https://www.facebook.com/hfxtitanscc/', 'HfxTitansCricketClub.jpg');

CREATE TABLE `nsca_competition` (
  `CompetitionID` int(11) NOT NULL,
  `CompetitionName` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `CompTypeID` int(11) DEFAULT NULL,
  `YearRunning` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_competitiontype` (
  `CompTypeID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_devprograms` (
  `DevID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Duration` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Time` varchar(64) DEFAULT NULL,
  `Charges` varchar(64) DEFAULT NULL,
  `Type` varchar(64) DEFAULT NULL,
  `DaysRun` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_devroleuser` (
  `DevRoleUserID` int(11) NOT NULL,
  `DevID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `IsLead` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_location` (
  `LocationID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Address` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_locationuser` (
  `LocUserID` int(11) NOT NULL,
  `LocationID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_login` (
  `LoginID` int(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_news` (
  `NewsID` int(11) NOT NULL,
  `Title` varchar(128) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Pictures` text DEFAULT NULL,
  `Videos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nsca_news` (`NewsID`, `Title`, `FirstName`, `LastName`, `Email`, `Date`, `Content`, `Pictures`, `Videos`) VALUES
(1, 'Hello World', 'Morganne', 'Petrollo', 'branfranke@gmail.com', '2019-08-08 04:47:38', 'Anaerobic meningitis', NULL, NULL),
(2, 'Public Utilities', 'Stan', 'Lewendon', 'branfranke@gmail.com', '2019-05-23 04:05:39', 'Other headache syndromes', NULL, NULL),
(3, 'Capital Goods', 'Emalee', 'Briston', 'branfranke@gmail.com', '2018-09-28 05:41:26', 'Other specified failure in dosage', NULL, NULL),
(4, 'Consumer Services', 'Maud', 'Gerault', 'branfranke@gmail.com', '2019-06-01 13:49:59', 'Burkitt\'s tumor or lymphoma, lymph nodes of multiple sites', NULL, NULL),
(5, 'Health Care', 'Randal', 'Matskiv', 'branfranke@gmail.com', '2019-10-20 17:41:02', 'Reticulosarcoma, spleen', NULL, NULL),
(6, 'Health Care', 'Bathsheba', 'Hablet', 'branfranke@gmail.com', '2019-07-19 08:22:32', 'Generally contracted pelvis, antepartum condition or complication', NULL, NULL),
(7, 'Finance', 'Cristina', 'Knoton', 'branfranke@gmail.com', '2019-07-03 01:07:48', 'Symptomatic hemophilia A carrier', NULL, NULL),
(8, 'Technology', 'Merrili', 'Geratt', 'branfranke@gmail.com', '2018-11-25 08:22:33', 'Blister of elbow, forearm, and wrist, without mention of infection', NULL, NULL),
(9, 'Consumer Services', 'Lorry', 'Farrall', 'branfranke@gmail.com', '2018-08-31 17:09:26', 'Brown\'s (tendon) sheath syndrome', NULL, NULL),
(10, 'Finance', 'Gris', 'Linney', 'branfranke@gmail.com', '2018-07-17 14:48:10', 'Second hand tobacco smoke', NULL, NULL),
(11, 'Public Utilities', 'Carla', 'Conningham', 'branfranke@gmail.com', '2018-07-25 20:26:05', 'Acute cholecystitis', NULL, NULL),
(12, 'Consumer Services', 'Michal', 'Alcido', 'branfranke@gmail.com', '2018-08-31 18:38:18', 'Marginal zone lymphoma, intraabdominal lymph nodes', NULL, NULL),
(13, 'Energy', 'Caritta', 'Greed', 'branfranke@gmail.com', '2019-01-20 22:46:21', 'Hungry bone syndrome', NULL, NULL),
(14, 'Hello World', 'Alyssa', 'Challenor', 'branfranke@gmail.com', '2019-06-06 21:17:40', 'Papanicolaou smear of cervix with high grade squamous intraepithelial lesion (HGSIL)', NULL, NULL),
(15, 'Basic Industries', 'Christie', 'Amsberger', 'branfranke@gmail.com', '2018-09-23 13:13:36', 'Epidemic vertigo', NULL, NULL),
(16, 'Miscellaneous', 'Filip', 'Catcherside', 'branfranke@gmail.com', '2019-09-18 08:34:19', 'Menstrual migraine, without mention of intractable migraine with status migrainosus', NULL, NULL),
(17, 'Finance', 'Dorthea', 'Nottram', 'branfranke@gmail.com', '2019-10-22 08:52:36', 'Hypertensive chronic kidney disease, malignant, with chronic kidney disease stage V or end stage renal disease', NULL, NULL),
(18, 'Basic Industries', 'Gwendolen', 'Siman', 'branfranke@gmail.com', '2019-04-12 02:12:18', 'Coxa valga, congenital', NULL, NULL),
(19, 'Capital Goods', 'Rodrique', 'Jacobowitz', 'branfranke@gmail.com', '2018-08-18 23:23:54', 'Open fracture of mandible, body, other and unspecified', NULL, NULL),
(20, 'Consumer Non-Durables', 'Carol-jean', 'Crownshaw', 'branfranke@gmail.com', '2019-05-17 00:45:05', 'Tuberculous pneumonia [any form], bacteriological or histological examination unknown (at present)', NULL, NULL),
(21, 'Capital Goods', 'Kristi', 'McCreary', 'branfranke@gmail.com', '2019-03-29 01:16:33', 'Subjective visual disturbance, unspecified', NULL, NULL),
(23, 'Transportation', 'Melissa', 'Fearns', 'branfranke@gmail.com', '2018-10-05 15:22:38', 'Incisional ventral hernia with obstruction', NULL, NULL),
(24, 'Health Care', 'Arin', 'Goad', 'branfranke@gmail.com', '2019-08-14 17:48:16', 'Subacute lymphoid leukemia, in remission', NULL, NULL),
(25, 'Hello World', 'Bennett', 'Mityashin', 'branfranke@gmail.com', '2018-12-18 23:54:24', 'Letterer-siwe disease, lymph nodes of multiple sites', NULL, NULL),
(26, 'Hello World', 'Pietra', 'Eastlake', 'branfranke@gmail.com', '2018-09-17 14:49:32', 'Transient arthropathy, hand', NULL, NULL),
(27, 'Consumer Services', 'Robin', 'Poel', 'branfranke@gmail.com', '2019-04-29 10:28:25', 'Other lymphedema', NULL, NULL),
(28, 'Technology', 'Annamarie', 'Jennins', 'branfranke@gmail.com', '2018-10-11 09:17:38', 'Onychia and paronychia of toe', NULL, NULL),
(29, 'Finance', 'Carmela', 'Ladell', 'branfranke@gmail.com', '2019-06-26 10:58:01', 'Atherosclerosis of native arteries of the extremities, unspecified', NULL, NULL),
(30, 'Consumer Services', 'Dal', 'Kohring', 'branfranke@gmail.com', '2018-11-30 06:51:48', 'Vasa previa complicating labor and delivery, unspecified as to episode of care or not applicable', NULL, NULL),
(31, 'Hello World', 'Way', 'Burchett', 'branfranke@gmail.com', '2018-11-04 13:50:16', 'Renal colic', NULL, NULL),
(32, 'Technology', 'Griffith', 'Tranmer', 'branfranke@gmail.com', '2019-04-11 06:25:39', 'Other specified hemorrhage in early pregnancy, unspecified as to episode of care or not applicable', NULL, NULL),
(33, 'Finance', 'Hermy', 'Blunkett', 'branfranke@gmail.com', '2019-06-06 14:50:37', 'Tympanosclerosis involving tympanic membrane, ear ossicles, and middle ear', NULL, NULL),
(34, 'Miscellaneous', 'Karie', 'Fillary', 'branfranke@gmail.com', '2019-01-05 11:13:12', 'Candidal otitis externa', NULL, NULL),
(35, 'Technology', 'Mycah', 'Carletti', 'branfranke@gmail.com', '2019-10-03 01:27:42', 'Other specified endocrine disorders', NULL, NULL),
(36, 'Consumer Durables', 'Laverna', 'Fist', 'branfranke@gmail.com', '2018-08-09 04:54:05', 'Perinatal intestinal perforation', NULL, NULL),
(37, 'Finance', 'Rubia', 'Sills', 'branfranke@gmail.com', '2018-09-09 19:06:36', 'Enteritis due to rotavirus', NULL, NULL),
(38, 'Hello World', 'Lori', 'Edland', 'branfranke@gmail.com', '2019-01-02 07:30:31', 'Focal choroiditis and chorioretinitis of other posterior pole', NULL, NULL),
(39, 'Hello World', 'Tressa', 'Pimmocke', 'branfranke@gmail.com', '2019-08-11 15:40:06', 'Intracranial injury of other and unspecified nature with open intracranial wound, with concussion, unspecified', NULL, NULL),
(40, 'Energy', 'Delphine', 'Piens', 'branfranke@gmail.com', '2018-12-27 04:44:20', 'Absence of menstruation', NULL, NULL),
(41, 'Finance', 'Moses', 'Marquot', 'branfranke@gmail.com', '2018-11-29 20:24:04', 'Malignant neoplasm of spermatic cord', NULL, NULL),
(42, 'Finance', 'Siana', 'Gutherson', 'branfranke@gmail.com', '2019-04-30 06:05:42', 'Cardiac pacemaker in situ', NULL, NULL),
(43, 'Hello World', 'Robby', 'Sewill', 'branfranke@gmail.com', '2018-11-28 12:28:31', 'Old laceration of muscles of pelvic floor', NULL, NULL),
(44, 'Finance', 'Haywood', 'Hardson', 'branfranke@gmail.com', '2019-01-21 12:09:10', 'Meningitis, unspecified', NULL, NULL),
(45, 'Hello World', 'Modestine', 'Karolyi', 'branfranke@gmail.com', '2019-01-16 11:37:51', 'Other specified conditions involving the integument of fetus and newborn', NULL, NULL),
(46, 'Finance', 'Jasmina', 'Gilligan', 'branfranke@gmail.com', '2019-04-13 15:29:50', 'Tobacco use disorder complicating pregnancy, childbirth, or the puerperium, antepartum condition or complication', NULL, NULL),
(47, 'Health Care', 'Winny', 'Appleton', 'branfranke@gmail.com', '2018-07-16 22:14:23', 'Unspecified injury of lung with open wound into thorax', NULL, NULL),
(48, 'Finance', 'Kipp', 'Yedall', 'branfranke@gmail.com', '2018-10-14 19:24:48', 'Psychosexual dysfunction, unspecified', NULL, NULL),
(49, 'Public Utilities', 'Gill', 'Walworth', 'branfranke@gmail.com', '2019-08-01 22:11:37', 'Personal history of transient ischemic attack (TIA), and cerebral infarction without residual deficits', NULL, NULL),
(50, 'Finance', 'Morganne', 'Hatje', 'branfranke@gmail.com', '2019-02-17 09:19:08', 'Observation for suspected genetic or metabolic condition', NULL, NULL),
(51, 'Basic Industries', 'Aldis', 'Assel', 'branfranke@gmail.com', '2019-05-21 20:43:32', 'Diabetes with other specified manifestations, type I [juvenile type], uncontrolled', NULL, NULL),
(52, 'Energy', 'Minette', 'Lapree', 'branfranke@gmail.com', '2018-07-16 21:07:25', 'Acute miliary tuberculosis, tubercle bacilli not found (in sputum) by microscopy, but found by bacterial culture', NULL, NULL),
(53, 'Finance', 'Konstantine', 'Shurey', 'branfranke@gmail.com', '2019-06-27 12:29:31', 'Aftercare following surgery for injury and trauma', NULL, NULL),
(54, 'Hello World', 'Hew', 'Pass', 'branfranke@gmail.com', '2018-10-17 15:47:20', 'Complications of transplanted lung', NULL, NULL),
(55, 'Hello World', 'Ignatius', 'Lawrenz', 'branfranke@gmail.com', '2019-03-02 21:44:34', 'Amphetamine and other psychostimulant dependence, episodic', NULL, NULL),
(56, 'Capital Goods', 'Ealasaid', 'Hacard', 'branfranke@gmail.com', '2018-09-09 12:49:13', 'Intestinal trichomoniasis', NULL, NULL),
(57, 'Hello World', 'Stesha', 'Dixcee', 'branfranke@gmail.com', '2019-04-28 21:42:00', 'Idiopathic lymphoid interstitial pneumonia', NULL, NULL),
(58, 'Consumer Services', 'Eleanore', 'Ahrens', 'branfranke@gmail.com', '2019-04-09 08:58:02', 'Other gaseous anesthetics causing adverse effects in therapeutic use', NULL, NULL),
(59, 'Finance', 'Kippy', 'Branni', 'branfranke@gmail.com', '2018-07-28 23:09:36', 'Meningococcal meningitis', NULL, NULL),
(60, 'Finance', 'Stillmann', 'Wright', 'branfranke@gmail.com', '2019-09-27 08:44:17', 'Other acute pericarditis', NULL, NULL),
(61, 'Basic Industries', 'Sella', 'Padson', 'branfranke@gmail.com', '2019-01-18 18:29:45', 'Personal history of malignant neoplasm of epididymis', NULL, NULL),
(62, 'Hello World', 'Maddy', 'Bonds', 'branfranke@gmail.com', '2018-11-09 06:46:05', 'Toxic uninodular goiter with mention of thyrotoxic crisis or storm', NULL, NULL),
(63, 'Capital Goods', 'Myrtice', 'Rowlstone', 'branfranke@gmail.com', '2019-04-25 08:40:00', 'Spontaneous abortion, complicated by delayed or excessive hemorrhage, incomplete', NULL, NULL),
(64, 'Hello World', 'Mortie', 'Wiggam', 'branfranke@gmail.com', '2019-04-03 09:37:48', 'Stiffness of joint, not elsewhere classified, shoulder region', NULL, NULL),
(65, 'Consumer Non-Durables', 'Rogerio', 'Ducroe', 'branfranke@gmail.com', '2019-06-22 15:43:22', 'Full-thickness skin loss [third degree, not otherwise specified] of lip(s)', NULL, NULL),
(66, 'Health Care', 'Amara', 'Bauldry', 'branfranke@gmail.com', '2019-03-27 15:27:00', 'Nephritis and nephropathy, not specified as acute or chronic, with lesion of membranoproliferative glomerulonephritis', NULL, NULL),
(67, 'Consumer Services', 'Trent', 'Ragge', 'branfranke@gmail.com', '2018-09-20 21:25:34', 'Deep transverse arrest and persistent occipitoposterior position, antepartum condition or complication', NULL, NULL),
(68, 'Finance', 'Marj', 'Morteo', 'branfranke@gmail.com', '2018-12-10 01:49:58', 'Postpartum coagulation defects, unspecified as to episode of care or not applicable', NULL, NULL),
(69, 'Energy', 'Cheslie', 'Leeb', 'branfranke@gmail.com', '2018-07-13 11:35:46', 'Screening for other specified mental disorders and developmental handicaps', NULL, NULL),
(70, 'Hello World', 'Sarge', 'Potes', 'branfranke@gmail.com', '2019-01-31 13:25:49', 'Other specified diseases due to chlamydiae', NULL, NULL),
(71, 'Health Care', 'Blane', 'Trittam', 'branfranke@gmail.com', '2018-07-30 09:14:22', 'Slow transit constipation', NULL, NULL),
(72, 'Hello World', 'Angelika', 'Laister', 'branfranke@gmail.com', '2018-08-11 07:00:11', 'Surface (topical) and infiltration anesthetics', NULL, NULL),
(73, 'Public Utilities', 'Sander', 'Freebury', 'branfranke@gmail.com', '2018-11-16 06:03:21', 'Other specified anomalies of stomach', NULL, NULL),
(74, 'Consumer Services', 'Jefferey', 'Ife', 'branfranke@gmail.com', '2018-09-21 01:25:23', 'Suicide and self-inflicted poisoning by other utility gas', NULL, NULL),
(75, 'Hello World', 'Kennie', 'Posse', 'branfranke@gmail.com', '2019-09-28 20:05:16', 'Toxic effect of unspecified gas, fume, or vapor', NULL, NULL),
(76, 'Public Utilities', 'Connie', 'Arndell', 'branfranke@gmail.com', '2019-02-05 02:21:37', 'Suicide and self-inflicted injuries by jumping from unspecified site', NULL, NULL),
(77, 'Transportation', 'Coop', 'Willwood', 'branfranke@gmail.com', '2019-04-26 11:36:43', 'Other activity involving cardiorespiratory exercise', NULL, NULL),
(78, 'Health Care', 'Beilul', 'Elphinston', 'branfranke@gmail.com', '2018-09-22 12:33:20', 'Spina bifida with hydrocephalus, unspecified region', NULL, NULL),
(79, 'Technology', 'Leelah', 'Silvester', 'branfranke@gmail.com', '2019-10-26 05:09:32', 'Stiffness of joint, not elsewhere classified, ankle and foot', NULL, NULL),
(80, 'Hello World', 'Sergent', 'Hulle', 'branfranke@gmail.com', '2018-10-22 07:00:19', 'Unspecified hypertension complicating pregnancy, childbirth, or the puerperium, postpartum condition or complication', NULL, NULL),
(81, 'Energy', 'Frasquito', 'Cheeke', 'branfranke@gmail.com', '2019-06-02 01:33:22', 'Amniotic fluid embolism, delivered, with or without mention of antepartum condition', NULL, NULL),
(82, 'Hello World', 'Genvieve', 'Weeks', 'branfranke@gmail.com', '2018-12-11 21:42:21', 'Congenital deformity of clavicle', NULL, NULL),
(83, 'Finance', 'Danice', 'Sawford', 'branfranke@gmail.com', '2019-01-27 02:21:48', 'Loose body in joint, upper arm', NULL, NULL),
(84, 'Energy', 'Kora', 'Fasey', 'branfranke@gmail.com', '2018-11-30 21:43:46', 'Supervision of high-risk pregnancy with other poor reproductive history', NULL, NULL),
(85, 'Health Care', 'Shelba', 'Battin', 'branfranke@gmail.com', '2019-09-03 13:04:37', 'Syphilitic alopecia', NULL, NULL),
(86, 'Health Care', 'Meir', 'Skirlin', 'branfranke@gmail.com', '2019-01-14 02:40:04', 'Unspecified reduction deformity of lower limb', NULL, NULL),
(87, 'Consumer Services', 'Monro', 'Venable', 'branfranke@gmail.com', '2019-10-08 15:29:54', 'Accidental poisoning by lead and its compounds and fumes', NULL, NULL),
(88, 'Consumer Services', 'Lilllie', 'Toon', 'branfranke@gmail.com', '2019-02-01 13:18:59', 'Queensland tick typhus', NULL, NULL),
(89, 'Energy', 'Tades', 'MacMoyer', 'branfranke@gmail.com', '2018-08-09 23:55:45', 'Activities involving string instrument playing', NULL, NULL),
(90, 'Finance', 'Stace', 'Cantillon', 'branfranke@gmail.com', '2019-01-16 07:36:49', 'Other specified arthropathy, upper arm', NULL, NULL),
(91, 'Consumer Services', 'Milzie', 'Toller', 'branfranke@gmail.com', '2019-07-22 14:28:01', 'Unspecified testicular dysfunction', NULL, NULL),
(92, 'Consumer Services', 'Shandie', 'Burdas', 'branfranke@gmail.com', '2019-07-16 03:17:36', 'Multiple endocrine neoplasia [MEN] type IIB', NULL, NULL),
(93, 'Hello World', 'Ave', 'Lowndsborough', 'branfranke@gmail.com', '2019-10-08 16:12:53', 'Cannabis dependence, in remission', NULL, NULL),
(94, 'Consumer Non-Durables', 'Etienne', 'Domegan', 'branfranke@gmail.com', '2019-10-14 04:56:21', 'Calculus of bile duct with other cholecystitis, with obstruction', NULL, NULL),
(95, 'Finance', 'Friederike', 'Inns', 'branfranke@gmail.com', '2019-08-13 22:02:34', 'Unspecified ectopic pregnancy without intrauterine pregnancy', NULL, NULL),
(96, 'Public Utilities', 'Jodie', 'La Rosa', 'branfranke@gmail.com', '2019-08-24 01:23:40', 'Salmonella pneumonia', NULL, NULL),
(97, 'Consumer Services', 'Klemens', 'Lynam', 'branfranke@gmail.com', '2018-07-22 20:18:02', 'Other hemochromatosis', NULL, NULL),
(98, 'Technology', 'Myriam', 'Lathe', 'branfranke@gmail.com', '2019-05-12 21:17:30', 'Accidental poisoning by other central nervous system depressants', NULL, NULL),
(99, 'Hello World', 'Aluino', 'Pendlebery', 'branfranke@gmail.com', '2018-07-09 08:09:12', 'Accident to powered aircraft at takeoff or landing injuring occupant of other powered aircraft', NULL, NULL),
(100, 'Hello World', 'Jorie', 'Humphrey', 'branfranke@gmail.com', '2018-08-28 19:45:04', 'Retained metal fragments, unspecified', NULL, NULL);

CREATE TABLE `nsca_roletype` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_subcommittees` (
  `SubID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Years` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_subuser` (
  `SubUserID` int(11) NOT NULL,
  `SubID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `IsLead` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_teams` (
  `TeamID` int(11) NOT NULL,
  `ClubID` int(11) DEFAULT NULL,
  `CompID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_teamuser` (
  `TeamUserID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TeamID` int(11) DEFAULT NULL,
  `isClubManager` int(11) DEFAULT 0,
  `isTeamCaptain` int(11) DEFAULT 0,
  `isViceCaptain` int(11) DEFAULT 0,
  `waitingToJoin` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_user` (
  `UserID` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nsca_userroles` (
  `UserRoleID` int(11) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `nsca_alerts`
  ADD PRIMARY KEY (`Alert_ID`);

ALTER TABLE `nsca_clubs`
  ADD PRIMARY KEY (`ClubID`);

ALTER TABLE `nsca_competition`
  ADD PRIMARY KEY (`CompetitionID`),
  ADD KEY `nsca_competition_nsca_competitiontype_CompTypeID_fk` (`CompTypeID`);

ALTER TABLE `nsca_competitiontype`
  ADD PRIMARY KEY (`CompTypeID`);

ALTER TABLE `nsca_devprograms`
  ADD PRIMARY KEY (`DevID`);

ALTER TABLE `nsca_devroleuser`
  ADD PRIMARY KEY (`DevRoleUserID`),
  ADD KEY `DevRoleUser_nsca_devprograms_DevID_fk` (`DevID`),
  ADD KEY `nsca_devroleuser_nsca_userroles_UserID_fk` (`UserID`);

ALTER TABLE `nsca_location`
  ADD PRIMARY KEY (`LocationID`);

ALTER TABLE `nsca_locationuser`
  ADD PRIMARY KEY (`LocUserID`),
  ADD KEY `nsca_LocationUser_nsca_location_LocationID_fk` (`LocationID`),
  ADD KEY `nsca_LocationUser_nsca_user_UserID_fk` (`UserID`);

ALTER TABLE `nsca_login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `nsca_login_nsca_user_UserID_fk` (`UserID`);

ALTER TABLE `nsca_news`
  ADD PRIMARY KEY (`NewsID`);

ALTER TABLE `nsca_roletype`
  ADD PRIMARY KEY (`RoleID`);

ALTER TABLE `nsca_subcommittees`
  ADD PRIMARY KEY (`SubID`);

ALTER TABLE `nsca_subuser`
  ADD PRIMARY KEY (`SubUserID`),
  ADD KEY `nsca_subuser_nsca_subcommittees_SubID_fk` (`SubID`),
  ADD KEY `nsca_subuser_nsca_user_UserID_fk` (`UserID`);

ALTER TABLE `nsca_teams`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `ncsa_teams_nsca_clubs_ClubID_fk` (`ClubID`),
  ADD KEY `ncsa_teams_nsca_competition_CompetitionID_fk` (`CompID`);

ALTER TABLE `nsca_teamuser`
  ADD PRIMARY KEY (`TeamUserID`),
  ADD KEY `nsca_teamUser_ncsa_teams_TeamID_fk` (`TeamID`),
  ADD KEY `nsca_teamUser_nsca_user_UserID_fk` (`UserID`);

ALTER TABLE `nsca_user`
  ADD PRIMARY KEY (`UserID`);

ALTER TABLE `nsca_userroles`
  ADD PRIMARY KEY (`UserRoleID`),
  ADD KEY `nsca_userroles_nsca_roletype_RoleID_fk` (`RoleID`),
  ADD KEY `nsca_userroles_nsca_user_UserID_fk` (`UserID`);


ALTER TABLE `nsca_alerts`
  MODIFY `Alert_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_clubs`
  MODIFY `ClubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `nsca_competition`
  MODIFY `CompetitionID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_competitiontype`
  MODIFY `CompTypeID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_devprograms`
  MODIFY `DevID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_devroleuser`
  MODIFY `DevRoleUserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_locationuser`
  MODIFY `LocUserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_news`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

ALTER TABLE `nsca_roletype`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_subcommittees`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_subuser`
  MODIFY `SubUserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_teams`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_teamuser`
  MODIFY `TeamUserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `nsca_userroles`
  MODIFY `UserRoleID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `nsca_competition`
  ADD CONSTRAINT `nsca_competition_nsca_competitiontype_CompTypeID_fk` FOREIGN KEY (`CompTypeID`) REFERENCES `nsca_competitiontype` (`CompTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_devroleuser`
  ADD CONSTRAINT `DevRoleUser_nsca_devprograms_DevID_fk` FOREIGN KEY (`DevID`) REFERENCES `nsca_devprograms` (`DevID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_devroleuser_nsca_userroles_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_userroles` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_locationuser`
  ADD CONSTRAINT `nsca_LocationUser_nsca_location_LocationID_fk` FOREIGN KEY (`LocationID`) REFERENCES `nsca_location` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_LocationUser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_login`
  ADD CONSTRAINT `nsca_login_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_subuser`
  ADD CONSTRAINT `nsca_subuser_nsca_subcommittees_SubID_fk` FOREIGN KEY (`SubID`) REFERENCES `nsca_subcommittees` (`SubID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_subuser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_teams`
  ADD CONSTRAINT `ncsa_teams_nsca_clubs_ClubID_fk` FOREIGN KEY (`ClubID`) REFERENCES `nsca_clubs` (`ClubID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ncsa_teams_nsca_competition_CompetitionID_fk` FOREIGN KEY (`CompID`) REFERENCES `nsca_competition` (`CompetitionID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_teamuser`
  ADD CONSTRAINT `nsca_teamUser_ncsa_teams_TeamID_fk` FOREIGN KEY (`TeamID`) REFERENCES `nsca_teams` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_teamUser_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `nsca_userroles`
  ADD CONSTRAINT `nsca_userroles_nsca_roletype_RoleID_fk` FOREIGN KEY (`RoleID`) REFERENCES `nsca_roletype` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nsca_userroles_nsca_user_UserID_fk` FOREIGN KEY (`UserID`) REFERENCES `nsca_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
