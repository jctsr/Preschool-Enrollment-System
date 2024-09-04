-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preschool-mini-projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) NOT NULL,
  `AdminUsername` varchar(20) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Pwd` varchar(120) NOT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminUsername`, `MobileNumber`, `Email`, `Pwd`, `AdminRegdate`, `UserType`) VALUES
(1, 'Henry', 'admin', '0143986601', 'admin@gmail.com', '$2y$10$cG5VKjoerfKZqiOaX0pm2uKg936RUTOhoGY4HZglv74NQkG/M1faS', '2023-09-01 03:48:17', 1),
(8, 'Josh', 'subadmin', '0134567789', 'newacc@gmail.com', '$2y$10$nSjIzF.4qDcFvSvlwBFQ4ueDYU1bsZbeeb0NiPAO81eBM7m1h/5tK', '2023-09-02 05:38:21', 0),
(9, 'skellington', 'subadmin2', '0134567782', 'skellington@gmail.com', '$2y$10$2.6RJW/4A14h.0BpgSTO5e9b3zUSntfeIi.1RGICczh6MM7i2tfhK', '2023-09-06 10:40:17', 0),
(10, 'teser', 'subadmin3', '0198765542', 'teser@gmail.com', '$2y$10$cBS1FG1//XkqDIm5wnogr./SYad94CJxAlTYPVRGdxq.OaXexF76i', '2023-09-06 10:44:11', 0),
(11, 'John Does', 'subadmin4', '0198765502', 'johndoes@gmail.com', '$2y$10$6NIVX7TIDIrsSq/1lE56FOox7UXvpXRrHmg7mgmH1oQC3JiPmayy2', '2023-10-11 04:01:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `ageGroup` varchar(150) NOT NULL,
  `classTiming` varchar(120) NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `classPic` varchar(255) NOT NULL,
  `AddedBy` varchar(150) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `teacherId`, `className`, `ageGroup`, `classTiming`, `capacity`, `classPic`, `AddedBy`, `postingDate`) VALUES
(5, 3, 'Art & Drawing', '18 Month - 2 Year', '9-10 AM', '10', '5a202841bcc60530918a7523a5848cd31694005605.jpg', 'admin', '2023-09-06 13:06:45'),
(6, 5, 'Language & Speaking', '4-5 Year', '1-2 PM', '10', 'b3bfcb60a8a6381ddf660552bab473d51694010175.jpg', 'admin', '2023-09-06 14:21:35'),
(7, 6, 'Writing', '2-3 Year', '8-9 AM', '20', 'be498647266a2b65d6f1660ec7fe4ad61694011315.jpg', 'admin', '2023-09-06 14:41:38'),
(8, 7, 'Mathematics', '5-6 Year', '2-3 PM', '20', 'a7895be4e81423f2e2f42f34a737d6c71694011796.jpg', 'admin', '2023-09-06 14:49:56'),
(9, 8, 'Sport', '5-6 Year', '4-5 PM', '35', 'bb1373e7c3dd542a021b5a3672c1b1731694016071jpeg', 'admin', '2023-09-06 16:01:11'),
(10, 9, 'Maths', '5-6 Year', '11-12 PM', '10', 'a7895be4e81423f2e2f42f34a737d6c71696997362.jpg', 'admin', '2023-10-11 04:09:22'),
(11, 10, 'Programming', '3-4 Year', '9-10 AM', '20', 'f73fd44701a97d0ca929f3ff41dca5171698572760.jpg', 'admin', '2023-10-29 09:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `id` int(11) NOT NULL,
  `enrollmentNumber` bigint(12) NOT NULL,
  `fatherName` varchar(120) NOT NULL,
  `motherName` varchar(120) NOT NULL,
  `parentmobNo` varchar(15) NOT NULL,
  `parentEmail` varchar(150) NOT NULL,
  `childName` varchar(150) NOT NULL,
  `childAge` varchar(200) NOT NULL,
  `enrollProgram` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `enrollStatus` varchar(100) NOT NULL,
  `officialRemark` mediumtext NOT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblenrollment`
--

INSERT INTO `tblenrollment` (`id`, `enrollmentNumber`, `fatherName`, `motherName`, `parentmobNo`, `parentEmail`, `childName`, `childAge`, `enrollProgram`, `message`, `postingDate`, `enrollStatus`, `officialRemark`, `updationDate`) VALUES
(3, 849222630, 'John', 'Crystie', '0187657728', 'jcy@gmail.com', 'alre', '2-3 Year', 'PlayGroup-1.8 to 3 years', 'Hi, I want to enroll for my child', '2023-09-05 13:05:32', 'Rejected', 'Full', '2023-09-05 13:53:26'),
(4, 649572902, 'Dean', 'Rossy', '0187654432', 'dsy@gmail.com', 'verry', '4-5 Year', 'Junior KG- 3.5 to 5 years', 'Hello!, I want to enroll for my child. Please contact me if accepted.', '2023-09-05 13:07:14', 'Accepted', 'Accepted', '2023-09-05 13:45:54'),
(8, 450787959, 'iliraimi', 'ika', '0198288233', 'ili@gmail.com', 'maya', '4-5 Year', 'Junior KG- 3.5 to 5 years', 'hello', '2023-09-27 08:19:14', 'Accepted', 'ok', '2023-09-27 08:20:27'),
(9, 236880147, 'Harold', 'Katie', '0134765592', 'harold@gmail.com', 'Ronny', '5-6 Year', 'Senior KG- 4.5 to 6 years', 'I want to register my child.', '2023-10-11 03:58:18', 'Accepted', 'Accepted', '2023-10-11 04:12:25'),
(10, 229868482, 'hiruzen', 'sarah', '0192876672', 'wdjwq@gmail.com', 'knjdai', '3-4 Year', 'Nursery-2.5 to 4 years', 'I want to enroll for my child\r\n', '2023-10-29 09:40:18', 'Accepted', 'accepted', '2023-10-29 09:42:44'),
(11, 367058329, 'Jack', 'Maria', '019876552', 'jkm@gmail.com', 'Peter', '3-4 Year', 'Nursery-2.5 to 4 years', 'I want to enroll for my son', '2023-10-30 03:57:32', 'Accepted', 'Accepted', '2023-10-30 03:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) NOT NULL,
  `PageTitle` varchar(200) NOT NULL,
  `PageDescription` mediumtext NOT NULL,
  `Email` varchar(200) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', 'Playschool helps in building a strong foundation in social, pre-academics, and general life skills. It helps in the development of a child’s emotional and personal growth and provides opportunities for children to learn in ways that sheerly interests them and develop a strong sense of curiosity. Consequently, it helps in building a positive association with inquisitive learning in the form of fun activities and guided play. \r\n\r\nPlayschool is important for your child as it helps in making the child habitual of the routine. The child also becomes aware of himself/herself and develops motor and cognitive skills. Playschools further enable the child to receive individual attention as the school has a very low student-to-teacher ratio. According to the report, only 48% of poor children who were born in 2001 \"started school ready to learn, compared to 75% of children from middle-income families.\"\r\n\r\nAdditionally, the amount of time parents of various socioeconomic statuses spend reading to their children has changed since the 1960s and 1970s. Parents with higher education read to their kids for up to an additional 30 minutes per day between 2010 and 2012, which adds up by the time the kids enter kindergarten.The kids are given the ‘right’ toys to play with according to their age of development which helps them to develop and learn the things that can be implemented or transferred onto them, such as changing the clothes of the doll, feeding the doll, etc. Some more benefits of playschool are mentioned below: ', '', '', '2023-09-05 03:22:18'),
(2, 'contactus', 'Get In Touch', 'Preschool, Kota Kinabalu, Sabah, Malaysia.', 'preschool@gmail.com', '0134567782', '2023-09-05 03:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherMobileNo` varchar(15) NOT NULL,
  `teacherSubject` varchar(255) NOT NULL,
  `teacherPic` varchar(255) NOT NULL,
  `AddedBy` varchar(120) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `fullName`, `teacherEmail`, `teacherMobileNo`, `teacherSubject`, `teacherPic`, `AddedBy`, `regDate`) VALUES
(3, 'Rosaria', 'rosaria@gmail.com', '0134567761', 'Art & Drawing', '06940303f580ef89805d5242166fb8671693796506.jpg', 'admin', '2023-09-04 03:01:46'),
(5, 'Jack', 'jack@gmail.com', '0134566722', 'Language & Speaking', 'ddc01577479ff46e6d42027edc5fba5c1693997360.jpg', 'admin', '2023-09-06 10:49:20'),
(6, 'Beverly', 'beverly@gmail.com', '0132456672', 'Writing', '94f512a17a11048b4d473f272918efbb1694011221.jpg', 'admin', '2023-09-06 14:40:21'),
(8, 'Marry', 'marry@gmail.com', '0132456654', 'Sport', '195f2e8e1bf2e17ad2b9a9111dc22af31694016625.jpg', 'admin', '2023-09-06 15:59:04'),
(11, 'Sofia', 'sofia@gmail.com', '0198765562', 'Maths', 'a1d27b07ba0c1f8c3454c2b81ad7beb41698638151.jpg', 'admin', '2023-10-30 03:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `id` int(11) NOT NULL,
  `guardianName` varchar(220) NOT NULL,
  `guardianEmail` varchar(220) NOT NULL,
  `childName` varchar(225) NOT NULL,
  `childAge` varchar(120) NOT NULL,
  `message` mediumtext NOT NULL,
  `officialRemark` mediumtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `visitTime` varchar(220) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`id`, `guardianName`, `guardianEmail`, `childName`, `childAge`, `message`, `officialRemark`, `status`, `visitTime`, `postingDate`, `updationDate`) VALUES
(1, 'Jack', 'jack@gmail.com', 'John', '3-4 Year', 'I want to visit my son', 'Visited on time', 'Visited', '2023-09-07T09:50', '2023-09-05 08:40:42', '2023-09-05 09:32:52'),
(2, 'Alex', 'alex@gmail.com', 'alexa', '4-5 Year', 'I want to visit if I could', 'Visitor changed mind', 'Not-Visited', '2023-09-06T09:22', '2023-09-05 12:23:08', '2023-09-05 12:23:58'),
(3, 'El shaarawy', 'el@gmail.com', 'elsha', '3-4 Year', 'I want to visit my son\r\n', 'Visited', 'Visited', '2023-10-01T10:18', '2023-10-01 02:19:18', '2023-10-01 02:19:52'),
(4, 'Harold', 'harold@gmail.com', 'Ronny', '5-6 Year', 'I want to visit my son.', 'Visited', 'Visited', '2023-10-13T11:18', '2023-10-11 04:18:51', '2023-10-11 04:20:11'),
(5, 'sara', 'sara@gmail.com', 'saru', '3-4 Year', 'I want to visit my child', 'Visited', 'Visited', '2023-10-31T09:46', '2023-10-29 09:46:56', '2023-10-29 09:47:18'),
(6, 'Jack', 'jkm@gmail.com', 'Peter', '3-4 Year', 'I want to visit my son', 'Visited', 'Visited', '2023-10-31T11:57', '2023-10-30 03:58:00', '2023-10-30 03:59:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
