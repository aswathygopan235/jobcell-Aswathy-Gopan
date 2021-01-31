-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 09:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placementcell`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `username`, `password`) VALUES
(1, 'admin', '5osghim@');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_contact_email` varchar(500) NOT NULL,
  `company_website` varchar(200) NOT NULL,
  `company_contact_no` int(100) NOT NULL,
  `company_info` varchar(5000) NOT NULL,
  `date_time_of_join` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_code`, `company_name`, `company_email`, `company_contact_email`, `company_website`, `company_contact_no`, `company_info`, `date_time_of_join`, `password`) VALUES
(1, 'cy00001', 'Maevers Pvt. Ltd.', 'maevers@business.com', 'maevers@info.com', 'www.maeversshipping.com', 25488, 'A shipping company', '2020-08-12 11:13:53.548295', '123cy#'),
(2, 'cy00002', 'Alpharon Technologies', 'alpharon@india.com', 'alpharon@enquiries.com', 'www.alpharontechnologies.org', 151461, 'Experienced software with many successful projects.', '2020-08-22 06:12:43.799031', 'lag-ott2'),
(3, 'cy00003', 'Merridge Public Library', 'merridge@national.com', 'merridge@contact.com', 'www.merridgelibrary.org', 524524, 'A library', '2020-08-22 11:17:42.551185', '7ojlots@'),
(4, 'cy00004', 'Jacob Agencies', 'business@jacobagencies.com', 'enquiries@jacobagencies.com', 'www.jacobagencies.com', 2147483647, 'A wholesale agency', '2020-08-26 12:35:05.112860', 'nuer4oj,');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `no_of_sems` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course_name`, `no_of_sems`) VALUES
(1, 'course0001', 'BTech Computer Science and Engineering', 8),
(2, 'course0002', 'BTech Civil Engineering', 8),
(3, 'course0003\r\n', 'BTech Electrical and Electronics Engineering', 8),
(4, 'course0004', 'BSc Biology', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `job_code` varchar(100) NOT NULL,
  `job_position_name` varchar(150) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `field` varchar(150) NOT NULL,
  `job_info` varchar(5000) NOT NULL,
  `job_status` enum('Active','Expired','Deleted') NOT NULL DEFAULT 'Active',
  `posted_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_code`, `job_code`, `job_position_name`, `job_location`, `salary`, `field`, `job_info`, `job_status`, `posted_on`, `expires_on`) VALUES
(1, 'cy00002', 'job00001', 'Web developer', 'London,UK', 30000, 'Technology', 'A PHP developer required', 'Active', '2020-08-23 10:05:31', '2020-09-14 17:00:00'),
(3, 'cy00002', 'job00003', 'Office Clerk', 'Paris,France', 27000, 'Administration', 'Front office clerk needed', 'Expired', '2020-08-23 10:49:47', '2020-08-29 13:39:00'),
(12, 'cy00002', 'job00012', 'Cleaning  Staff', 'Orlando,USA', 21000, 'Service', 'Cleaning staff needed', 'Expired', '2020-08-24 08:44:12', '2020-08-30 14:14:00'),
(13, 'cy00001', 'job00013', 'Junior Legal Associate', 'Berlin,Germany', 25000, 'Legal and Administration', 'Looking for new LLB graduates.', 'Active', '2020-08-25 03:44:08', '2020-09-16 09:13:00'),
(15, 'cy00003', 'job00015', 'Office Clerk', 'Paris,France', 25000, 'Administration', 'Office Clerk to help the visitors', 'Active', '2020-08-26 06:14:25', '2020-09-08 11:58:00'),
(16, 'cy00003', 'job00016', 'Library Page', 'Paris,France', 20000, 'Administration', 'Pages are responsible for putting returned books and other items in their proper places on the shelves. They are also responsible for keeping items in the right order. Some handle requests for retrieving materials that are in secured areas, and others may be responsible for checking items back in', 'Expired', '2020-08-27 12:04:16', '2020-08-27 17:35:00'),
(17, 'cy00004', 'job00017', 'Sales Associate', 'Rio de Janerio,Brazil', 28000, 'Public Relaions', 'A sales associate is also responsible for maintaining the store’s clean and organized appearance, restocking items, and checking out customers', 'Expired', '2020-08-29 03:33:15', '2020-08-18 09:23:00'),
(19, 'cy00004', 'job00019', 'Cashier', 'Rio de Janerio,Brazil', 21000, 'Public Relations', 'They’re responsible for processing purchases and transactions, welcoming customers once they walk into the door, assisting with returns and exchanges, answering the phone, and promoting any add-ons — like rewards programs or other miscellaneous items — right before the customer checks out.', 'Expired', '2020-08-29 03:55:10', '2020-08-31 09:25:00'),
(28, 'cy00004', 'job00028', 'Warehouse worker', 'Lima,Peru', 30000, 'Logistics', ' Duties include Collecting merchandise from the distribution center and safely transporting materials to the shipping bay\r\n,Receiving and documenting merchandise for delivery or return\r\n,Keeping an inventory of all merchandise entering or exiting the warehouse,Identifying any missing, lost or damaged materials and immediately notify the supervisor,Ensuring that all the merchandise is safely and securely packed and labeled for shipping,Managing all merchandise with appropriate care\r\n,Assisting with training of newly employed workers\r\n,Scanning labels to ensure products are shipped to the right destination', 'Active', '2020-08-30 12:50:41', '2020-09-05 18:20:00'),
(29, 'cy00004', 'job00029', 'Receiving Associate', 'New York,USA', 40000, 'Logistics', 'Answer and respond to customer inquiries, requirements and needs.\r\n\r\nProvide excellent service to customers.\r\n\r\nReceive and unload merchandise from trucks and ships.\r\n\r\nVerify documents and reports in accordance to the unloaded merchandise.\r\n\r\nUpdate sales reports on a periodic basis.\r\n\r\nExecute housekeeping duties.\r\n\r\nPerform and execute functions relating to merchandise preparation, staging and outbound shipments.\r\nMaintain stockroom in a systematic and orderly manner.\r\nMaintain and manage stockroom records, reports and inventories.Initiate and implement safety procedures and standards.', 'Active', '2020-08-30 12:57:32', '2020-09-06 18:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(100) NOT NULL,
  `application_code` varchar(20) NOT NULL,
  `received_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `job_code` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `student_apply_info` varchar(1000) NOT NULL,
  `application_status` enum('Reviewing','Shortlisted','Rejected') NOT NULL DEFAULT 'Reviewing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `application_code`, `received_on`, `job_code`, `company_code`, `student_code`, `student_apply_info`, `application_status`) VALUES
(1, 'apl00001', '2020-08-28 11:12:28', 'job00013', 'cy00001', 'st00003', 'This job is the perfect start to my career and will help me achieve my career goals.', 'Reviewing'),
(2, 'apl00002', '2020-08-28 11:12:34', 'job00012', 'cy00002', 'st00003', 'This job is the first step in the right way for my career.', 'Shortlisted'),
(3, 'apl00003', '2020-08-28 11:36:16', 'job00003', 'cy00002', 'st00003', 'This is a perfect job for me as I like a very vibrant atmosphere.', 'Rejected'),
(4, 'apl00004', '2020-08-28 12:33:19', 'job00001', 'cy00002', 'st00003', 'I have the knowledge and skill         ', 'Shortlisted'),
(5, 'apl00005', '2020-08-29 03:27:17', 'job00003', 'cy00002', 'st00002', 'I have great interpersonal skill which makes me suitable for the job that involves communicating with people from all walks of life.', 'Reviewing'),
(9, 'apl00009', '2020-08-30 07:06:58', 'job00013', 'cy00001', 'st00001', 'I have passion for the legal field.', 'Reviewing'),
(10, 'apl00010', '2020-08-30 10:27:01', 'job00015', 'cy00003', 'st00001', 'I\'am a great candidate for the job.                         ', 'Reviewing'),
(11, 'apl00011', '2020-08-30 11:36:16', 'job00019', 'cy00004', 'st00001', 'I\'am a people person.                 ', 'Reviewing'),
(12, 'apl00012', '2020-09-04 10:43:47', 'job00001', 'cy00002', 'st00001', 'I have done numerous web application projects.', 'Shortlisted');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(100) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `marks` float NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_code`, `course_code`, `sem`, `marks`, `updated_on`) VALUES
(24, 'st00003', 'course0004', '1', 78.15, '2020-08-29 13:32:58'),
(25, 'st00003', 'course0004', '2', 75.26, '2020-08-20 05:06:56'),
(26, 'st00003', 'course0004', '3', 75.64, '2020-08-20 05:16:55'),
(27, 'st00003', 'course0004', '4', 72.22, '2020-08-20 05:17:05'),
(28, 'st00003', 'course0004', '5', 71.25, '2020-08-20 05:17:12'),
(41, 'st00002', 'course0002', '1', 77, '2020-08-20 09:03:08'),
(42, 'st00002', 'course0002', '2', 71.22, '2020-08-20 06:57:42'),
(43, 'st00002', 'course0002', '3', 80.25, '2020-08-20 06:57:56'),
(44, 'st00002', 'course0002', '4', 81.22, '2020-08-20 06:58:04'),
(45, 'st00002', 'course0002', '5', 80, '2020-08-20 06:58:10'),
(46, 'st00002', 'course0002', '6', 81.25, '2020-08-20 06:58:21'),
(47, 'st00002', 'course0002', '7', 79.25, '2020-08-20 06:58:32'),
(50, 'st00002', 'course0002', '8', 79.25, '2020-08-20 09:16:19'),
(55, 'st00001', 'course0001', '1', 88, '2020-08-30 08:47:36'),
(56, 'st00001', 'course0001', '2', 89.25, '2020-08-29 07:51:20'),
(58, 'st00001', 'course0001', '3', 85.15, '2020-08-30 08:53:56'),
(61, 'st00003', 'course0004', '6', 74.25, '2020-09-01 06:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(20) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `course_code` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `grad_month_year` varchar(30) NOT NULL,
  `date_time_of_join` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `skills` varchar(1000) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_code`, `first_name`, `last_name`, `gender`, `course_code`, `date_of_birth`, `email`, `contact_no`, `grad_month_year`, `date_time_of_join`, `skills`, `password`) VALUES
(1, 'st00001', 'Charles', 'Deaver', 'Male', 'course0001', '1990-05-09', 'charles@mail.com', 51854, '2018-06', '2020-08-18 07:03:30.980620', 'HTML,CSS', '321#pwd'),
(2, 'st00002', 'Olivia', 'Carr', 'Female', 'course0002', '1993-02-13', 'carrolivia@outlook.com', 8496456, '2018-07', '2020-08-18 07:04:39.956086', 'Java,SQL', 'qwe@321'),
(3, 'st00003', 'Kiera', 'Brooks', 'Others', 'course0004', '1995-02-07', 'kiera@dom.com', 79412, '2018-10', '2020-08-19 10:29:37.909199', 'C++,Team Player', '987qwe$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_code_index` (`job_code`),
  ADD KEY `company_code_index` (`company_code`) USING BTREE,
  ADD KEY `job_status_index` (`job_status`) USING BTREE;

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_company_code_index` (`job_code`,`company_code`),
  ADD KEY `company_code_index` (`company_code`),
  ADD KEY `job_code_index` (`job_code`),
  ADD KEY `student_code_index` (`student_code`),
  ADD KEY `application_status_index` (`application_status`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_code_index` (`student_code`),
  ADD KEY `course_code_index` (`course_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_code_index` (`course_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `job_status_change` ON SCHEDULE EVERY 1 SECOND STARTS '2020-08-29 08:32:38' ON COMPLETION PRESERVE ENABLE DO UPDATE jobs SET jobs.job_status='Expired' WHERE CURRENT_TIMESTAMP>jobs.expires_on$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
