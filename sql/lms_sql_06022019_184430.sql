-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 12:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forgedb`
--
DROP DATABASE IF EXISTS `forgedb`;
CREATE DATABASE IF NOT EXISTS `forgedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forgedb`;

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

DROP TABLE IF EXISTS `assigns`;
CREATE TABLE `assigns` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `assigns`
--

TRUNCATE TABLE `assigns`;
--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `content`, `created_by`, `created_at`, `updated_at`, `status`) VALUES
(1, '{\"assigned\":{\"id\":3,\"status\":2},\"course\":1,\"remarks\":null,\"levels\":[[{\"id\":4,\"status\":\"1\"}],[{\"id\":4,\"status\":\"1\"}],[{\"id\":5,\"status\":\"1\"}]]}', 3, 1527422461, 1528682434, 1),
(2, '{\"assigned\":{\"id\":3,\"status\":2},\"course\":1,\"remarks\":null,\"levels\":[[{\"id\":4,\"status\":2}],[{\"id\":5,\"status\":2}]]}', 3, 1527828566, 1527828566, 3);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `citation` text NOT NULL,
  `tags` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `books`
--

TRUNCATE TABLE `books`;
--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `citation`, `tags`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Author Name. (1999). Some title of book or article about Android Development.', '[\"Android Application Development\"]', 0, 1522834404, 1),
(2, 'Author\'s Name. (2001). Some book about JavaScript.', '[\"JavaScript\",\"Programming\",\"Web Development\",\"VueJS\"]', 0, 1522315528, 1),
(3, 'Zak, Diane (2011) An Introduction to Programming with C++. 6th ed.  Australia: Course Technology', '', 0, 0, 1),
(4, 'McGrath, Mike (2012) C++ Programming in Easy Steps.  4th ed.  Warwickshire, United Kingdom: Easy Steps Limited', '', 0, 0, 1),
(5, 'Gaddis, Tony (2007) Starting out with C++. Pearson Publishing.	', '', 0, 1521736538, 1),
(6, 'Gregoire, Marc, et. al. (2011) Professional C++. 2nd ed.  Indianapolis, Indiana: Wiley', '', 0, 0, 1),
(7, 'Deitel, Paul J. (2009) C++ for programmers. Prentice Hall.', '', 0, 0, 1),
(8, 'D. S. Malik (2008) C++ programming. Thomson Course Technology.', '', 0, 0, 1),
(9, 'Deitel, Paul J. (2008) C++ how to program. Pearson Publishing.', '', 0, 0, 1),
(10, 'Josuttis, Nicolai M. (2012) The C++ Standard Library: a tutorial and reference. 2nd ed.  Upper Saddle River, NJ. :  Addison-Wesley', '', 0, 0, 1),
(11, 'Mullins, C. (2013). Database Administration 2nd Edition, Addison-Wesley.', '', 0, 0, 1),
(12, 'Gillenson, M. (2012). Fundamentals of Database Management Systems 2nd Edition, John Wiley & Sons.', '', 0, 0, 1),
(13, 'Elmasri, R. (2011). Fundamentals of Database Systems 6th Edition, Addison-Wesley.', '', 0, 0, 1),
(14, 'Gill, P. (2011). Database Management Systems 2nd Edition, I.K. International Pub.', '', 0, 0, 1),
(15, 'Connoly, T. (2010). Database Systems: A practical Approach to Design, Implementation and Management 5th Edition, McGraw Hill International.', '', 0, 0, 1),
(16, 'Harrington, J. (2010). SQL Clearly Explained, Morgan Kaufmann.', '', 0, 0, 1),
(17, 'Kroenke, D. (2010). Database Concepts 4th Edition, Pearson.', '', 0, 0, 1),
(18, 'Kendall (2014). System analysis and design (9th). Pearson: Upper Saddle River, NJ', '[\"Capstone Project\",\"Project Management\",\"System Analysis\",\"System Design\"]', 0, 1526302967, 1),
(19, 'Wiegers K. (2013). Software requirements (3rd). Redmond, Washington: Microsoft Press', '[\"Software Requirements\",\"Capstone Project\",\"Project Management\"]', 0, 1526302661, 1),
(20, 'Puntambekar, A. (2014). Object oriented analysis & design: a conceptual approach. Technical Publication: New Delhi', '', 0, 0, 1),
(21, 'Schwalbe, Kathy (2011). Information Technology Project Management. Rev. 6th ed. Australia: Course Technology', '[\"Capstone Project\",\"Project Management\"]', 0, 1526302620, 1),
(22, 'Test1', '', 0, 0, 1),
(23, 'Test2', '', 0, 0, 0),
(24, 'Test3', '', 0, 0, 1),
(25, 'Test4', '', 0, 0, 1),
(26, 'Test5', '', 0, 0, 0),
(27, 'test', '[\"VBScript\",\"Programming\"]', 1522315610, 1522315748, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `comments`
--

TRUNCATE TABLE `comments`;
--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `assign_id`, `comment`, `level`, `created_at`, `status`) VALUES
(1, 5, 1, 'test', 2, 1528682509, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `objectives` text NOT NULL,
  `unitsLec` tinyint(4) NOT NULL,
  `unitsLab` tinyint(4) NOT NULL,
  `tags` text NOT NULL,
  `prerequisites` text NOT NULL,
  `corequisites` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `courses`
--

TRUNCATE TABLE `courses`;
--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `description`, `objectives`, `unitsLec`, `unitsLab`, `tags`, `prerequisites`, `corequisites`, `created_at`, `updated_at`, `status`) VALUES
(1, 'CAPSTONE PROJECT 1', 'ITWPROJ1', 'This course focuses on creation of reliable, efficient and maintainable software application based from the approved requirements in ITWPROJMAN. This covers implementing and testing the software, project documentation and presenting the project in front of the panel committee for final defense.', '', 3, 0, '[\"Capstone Project\",\"Software Testing\",\"Software Evaluation\",\"Software Requirements\"]', '[\"6\"]', '[]', 0, 1522415141, 1),
(2, 'MOBILE APPLICATION DEVELOPMENT 2', 'ITWSPEC4', 'Some description about mobile application development in iOS.', '', 2, 1, '', '', '', 0, 0, 1),
(3, 'WEB APPLICATION DEVELOPMENT 2', 'ITWSPEC6', 'Some description about web application development using PHP frameworks.', '', 2, 1, '', '', '', 0, 0, 1),
(4, 'DATABASE MANAGEMENT SYSTEMS 1', 'ITEDBASE1', 'This course introduces the concept of databases and database management system. In this course, the students will  learn how to examine the database management in business for routine processing and management reporting, design databases using ERD, and use SQL statements to store, retrieve and manipulate data in the database. In addition, students will be introduced to basic data and database administration and installation of DBMS.', '<p>Upon successful completion of this course, the student will be able to:</p>\r\n<ul>\r\n  <li>To develop understanding of the context of Database Management including: (a) the Database environment and (b) the Database development process.</li>\r\n  <li>To build expertise in Database Analysis that includes: (a) Modeling data in the organization and (b) the Enhanced E-R Model and business rules.</li>\r\n  <li>To develop skills in Database Design including: (a) Logical Database design and (b) the Relational Model.</li>\r\n  <li>To develop and implement Databases and enhance skills in advanced database topics including: (a) SQL/ Advanced SQL, and (b) Data and Database Administration.</li>\r\n</ul>', 2, 1, '', '', '', 0, 0, 1),
(5, 'COMPUTER PROGRAMMING 1', 'ITPROG1', 'This course is an introduction to programming which will provide the students the skills in programming through the use of conventional techniques of flowcharting and pseudo-coding.', '<p>Upon successful completion of this course, the student will be able to:</p> <ul>   <li>Know the similarities and differences between C and C++</li>   <li>Translate logic formulation into algorithms and flowchart;</li>   <li>Create working C++ programs;</li>   <li>Test and debug C++ programs; and</li>   <li>Create simple programs for input and output operations</li>   <li>Use the visual studio IDE in running C++ programs.</li>   <li>Understand and apply different control structures of C++</li>   <li>Understand and apply the principles of data storage and array manipulation</li>   <li>Perform tests in programs by using the \"if\" and \"switch\" control flow branching statements and repeat code segments by including \"for, while,\" and \"do…while\" control flow loops</li>   <li>Use critical thinking skills to create and debug C programs.</li> </ul>', 2, 1, '[]', '[]', '[\"14\"]', 0, 1522907882, 1),
(6, 'PROJECT MANAGEMENT FOR IT-WMA', 'ITWPROMAN', 'This course focuses on the Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sollicitudin, metus sit amet egestas volutpat, ligula ex tincidunt arcu, vel venenatis tortor urna non enim. Quisque ut nisi tempor, lacinia felis ac, dictum est. Sed tristique risus nec eros dapibus, sit amet facilisis eros suscipit.', '', 3, 0, '[]', '[]', '[\"3\"]', 0, 1523780512, 1),
(7, 'SOME COURSE TITLE 1', 'NEWCOURSE1', 'Some description with <h1>Header</h1> and \' \" this \\ ?', 'Some objectives with <h1>Header</h1> and \' \" this \\ ?', 2, 1, '', '', '', 0, 0, 0),
(8, 'SOME COURSE TITLE 2', 'NEWCOURSE2', 'Some description with <h1>Header</h1> and \' \" this \\ ?', 'Some objectives with <h1>Header</h1> and \' \" this \\ ?', 3, 0, '', '', '', 0, 0, 1),
(9, 'SOME COURSE TITLE 3', 'NEWCOURSE3', 'Some description with <h1>Header</h1> and \' \" this \\ ?', 'Some objectives with <h1>Header</h1> and \' \" this \\ ?', 3, 0, '', '', '', 0, 0, 0),
(10, 'SOME COURSE TITLE 4', 'NEWCOURSE4', 'Some description with <h1>Header</h1> and \' \" this \\ ?', 'Some objectives with <h1>Header</h1> and \' \" this \\ ?', 2, 1, '', '', '', 0, 0, 1),
(11, 'SOME COURSE TITLE 5', 'NEWCOURSE5', 'Some description with <h1>Header</h1> and \' \" this \\ ?', 'Some objectives with <h1>Header</h1> and \' \" this \\ ?', 3, 0, '', '', '', 0, 0, 1),
(12, '', '', '', '', 0, 0, '', '', '', 0, 0, 1),
(13, 'Some new course 1', 'SOMENEW1', 'Some nice course description\r\n1. with numbers :o\r\n2. waw\r\n3. another', 'Some nice course objectives with bullets\r\n- nice\r\n- waw\r\n    - sub-bullets too\r\n    - sub-bullets too', 3, 0, '[\"Programming\",\"Animation\"]', '[\"3\"]', '[\"2\",\"1\"]', 1522424825, 1523780496, 1),
(14, 'COMPUTER PROGRAMMING 1 FOR IT (LAB)', 'ITPROG1L', 'Test', 'test', 0, 1, '[]', '[]', '[]', 1522907865, 1522907865, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `latest` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `curriculum`
--

TRUNCATE TABLE `curriculum`;
--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `label`, `content`, `latest`, `created_at`, `updated_at`, `status`) VALUES
(1, '2015', '[{\"label\":\"a\",\"text\":\"Able to apply knowledge of computing fundamentals, technical concepts and practices, best practices and standards in the application of core information technologies, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements\"},{\"label\":\"b\",\"text\":\"Identify, formulate, research literature, and analyze user needs and taking them into account to solve complex information technology problems, reaching substantiated conclusions using fundamental principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.\"},{\"label\":\"c\",\"text\":\"Design and evaluate possible solutions for complex computing problems, and design and evaluate systems, components, or processes that meet specified user needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations\"},{\"label\":\"d\",\"text\":\"An ability to assist in the creation of an effective project plan to implement solution that includes selection, creation, evaluation, and administration of IT Systems\"},{\"label\":\"e\",\"text\":\"An ability to effectively integrate IT-based solutions into the user environment\"},{\"label\":\"f\",\"text\":\"An ability to administer delivered information system assuring its appropriateness to the user’s environment\"},{\"label\":\"g\",\"text\":\"Create, select, adapt and apply appropriate techniques, resources, and modern computing tools to complex computing activities, with an understanding of the limitations\"},{\"label\":\"h\",\"text\":\"Function effectively as an individual and as a member or leader in diverse teams and in multidisciplinary settings\"},{\"label\":\"i\",\"text\":\"Communicate effectively with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation, make effective presentations, and give and understand clear instructions\"},{\"label\":\"j\",\"text\":\"Understand and assess societal, health, safety, legal, and cultural issues within local and global contexts, and the consequential responsibilities relevant to professional computing practice\"},{\"label\":\"k\",\"text\":\"Understand and commit to professional ethics, responsibilities, and norms of professional computing practice\"},{\"label\":\"l\",\"text\":\"Recognize the need, and have the ability, to engage in independent learning for continual development as a computing professional\"}]', 0, 0, 1522493111, 1),
(2, '2017', '[{\"label\":\"a\",\"text\":\"Apply knowledge of computing, science and mathematics appropriate to the discipline.\"},{\"label\":\"b\",\"text\":\"Understand best practices and standards and their applications.\"},{\"label\":\"c\",\"text\":\"Analyze complex problems and identify and define the computing requirements appropriate to its solution.\"},{\"label\":\"d\",\"text\":\"Identify and analyze user needs and take them into account in the selection, creation, evaluation and administration of computer-based systems.\"},{\"label\":\"e\",\"text\":\"Design, implement and evaluate computer-based systems, processes,components or programs to meet desired needs and requirements under various constraints.\"},{\"label\":\"f\",\"text\":\"Integrate IT-based solutions into the user environment effectively.\"},{\"label\":\"g\",\"text\":\"Apply knowledge through the use of current techniques, skills, tools and practices necessary for the IT profession.\"},{\"label\":\"h\",\"text\":\"Function effectively as a member or leaderof a development team recognizing the different roles within a team to accomplish a common goal.\"},{\"label\":\"i\",\"text\":\"Assist in the creation of an effective IT project plan.\"},{\"label\":\"j\",\"text\":\"Communicate effectively with the computing community and with society at large about complex computing activities through logical writing, presentations and clear instructions.\"},{\"label\":\"k\",\"text\":\"Analyze the local and global impact of computing information technology on individuals, organizations and society.\"},{\"label\":\"l\",\"text\":\"Understand professional, ethical, legal, security and social issues and responsibilities in the utilization of information technology.\"},{\"label\":\"m\",\"text\":\"Recognize the need for and engage in planning self-learning and improving performance as a foundation for continuing professional development.\"}]', 1, 0, 1522772992, 1),
(3, '2018', '[{\"label\":\"a\",\"text\":\"Sample\"}]', 0, 1522493286, 1527831387, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `fields`
--

TRUNCATE TABLE `fields`;
--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `title`, `status`) VALUES
(1, 'Java', 1),
(2, 'Programming', 1),
(3, 'Object Oriented Programming', 1),
(4, 'Web Development', 1),
(5, 'Mobile Programming', 1),
(6, 'PHP', 1),
(7, 'Frameworks', 1),
(8, 'CodeIgniter', 1),
(9, 'Laravel', 1),
(10, 'iOS', 1),
(11, 'Swift', 1),
(12, 'Android Application Development', 1),
(13, 'Capstone Project', 1),
(14, 'Project Presentation', 1),
(15, 'Software Development', 1),
(16, 'JavaScript', 1),
(17, 'Database', 1),
(18, 'Arrays', 1),
(19, 'SQL', 1),
(20, 'C++', 1),
(21, 'Database Management', 1),
(22, 'Data Definition Language (DDL)', 1),
(23, 'Data Manipulation Language (DML)', 1),
(24, 'Data Control Language (DCL)', 1),
(25, 'Database Administration', 1),
(26, 'Database Design', 1),
(27, 'Control Structures', 1),
(28, 'Operators', 1),
(29, 'Project Management', 1),
(30, 'Assignment and Formatting', 1),
(31, 'Software Evaluation', 1),
(32, 'Software Testing', 1),
(33, 'Data Modeling', 1),
(34, 'Transaction Control', 1),
(35, 'Computer Programming', 1),
(36, 'History', 1),
(37, 'Basic Input and Output', 1),
(38, 'System Analysis', 1),
(39, 'System Design', 1),
(40, 'Software Requirements', 1),
(41, 'Ruby', 1),
(42, 'NodeJS', 1),
(43, 'AngularJS', 1),
(44, 'VueJS', 1),
(45, 'VBScript', 1),
(46, 'Animation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `materials`
--

TRUNCATE TABLE `materials`;
--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `description`, `tags`, `status`) VALUES
(1, 'Whiteboard', '', '[\"Capstone Project\"]', 1),
(2, 'Net book', '', '[\"Capstone Project\"]', 1),
(3, 'DLP', '', '[\"Capstone Project\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

DROP TABLE IF EXISTS `outcomes`;
CREATE TABLE `outcomes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `tags` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `outcomes`
--

TRUNCATE TABLE `outcomes`;
--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`id`, `content`, `type`, `tags`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Develop and execute the project requirements based from the proposal document.', 1, '[\"Capstone Project\"]', 0, 1528031100, 1),
(2, 'Test and evaluate the software product to validate for the process and output.', 1, '[\"Capstone Project\"]', 0, 0, 1),
(3, 'Complete the system defined in the plan to satisfy the project specifications and present final documentation.', 1, '[\"Capstone Project\"]', 0, 0, 1),
(4, 'Understand the fundamental concepts and principles of database management and database administration.', 1, '[\"Database\"]', 0, 0, 1),
(5, 'Analyze business rules and translate them into user requirements.', 1, '[\"Database\"]', 0, 0, 1),
(6, 'Design logical and relational database that meets specified user requirements following relational database design principles and constructs.', 1, '[\"Database\"]', 0, 0, 1),
(7, 'Create SQL statements that retrieve information requirements of the organization needed for reports generation.', 1, '[\"Database\"]', 0, 0, 1),
(8, 'Develop, execute and create the project deliverables.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(9, 'Test the software product to validate its process and output.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(10, 'Complete the work defined in the plan to satisfy the project specifications.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(11, 'Complete the 50% software development stated in the proposal.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(12, 'Understand Project Review and closure.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(13, 'Complete the 75% software development stated in the proposal.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(14, 'Create and present the final documentation.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(15, 'Execution of user acceptance testing.', 2, '[\"Capstone Project\"]', 0, 0, 1),
(16, 'Mock defense', 2, '[\"Capstone Project\"]', 0, 0, 1),
(17, 'Project Final Defense/Presentation', 2, '[\"Capstone Project\"]', 0, 0, 1),
(18, 'Revision of Software and Documents', 2, '[\"Capstone Project\"]', 0, 0, 1),
(19, 'Submission of Final Requirements', 2, '[\"Capstone Project\"]', 0, 0, 1),
(20, 'Discussion of the Guidelines', 3, '[\"Capstone Project\"]', 0, 0, 1),
(21, 'Classroom Discussion', 3, '[\"Capstone Project\"]', 0, 0, 1),
(22, 'Class/Library Activity; Research current trends in IT.', 3, '[\"Capstone Project\"]', 0, 0, 1),
(23, 'Require instrument for software testing.', 3, '[\"Capstone Project\"]', 0, 0, 1),
(24, 'Actual user acceptance', 3, '[\"Capstone Project\"]', 0, 0, 1),
(25, 'Student can clarify/ask questions on matters concerning course syllabus, OBE, and PBL.', 4, '[\"Capstone Project\"]', 0, 0, 1),
(26, 'Class/Library Activity; search the current trends in IT so that they will have the idea in making their title.', 4, '[\"Capstone Project\"]', 0, 0, 1),
(27, 'Follow formulated testing instrument and comply with the checking and testing of the software.', 4, '[\"Capstone Project\"]', 0, 0, 1),
(28, 'The students can identify and describe Project Management Groups needed for a project. Determine their role in project development.', 4, '[\"Capstone Project\"]', 0, 0, 1),
(29, 'The students can be able to produce Results and Discussion of the Proposal Paper.', 4, '[\"Capstone Project\"]', 0, 0, 1),
(30, 'Conducts user acceptance testing', 4, '[\"Capstone Project\"]', 0, 0, 1),
(31, 'Test', 1, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `content` text NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `settings`
--

TRUNCATE TABLE `settings`;
--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `updated_at`) VALUES
(1, 'syllabusContent', '{\"institutionVision\":\"FEU Institute of Technology aims to be one of the top five technology educational institutions in the Philippines.\",\"institutionMission\":\"FEU Institute of Technology is dedicated to provide quality, relevant, innovative and industry-based education producing competent and principled professionals with greater sense of responsibility, social awareness and high competitiveness contributing significantly to the betterment of the society.\",\"departmentVision\":\"The Information Technology Department aims its program specializations to be a catalyst on the delivery of industry-based standards solutions and internationally recognized IT education.\",\"departmentMission\":\"The Information Technology Department is committed to provide industry-based information technology solutions, international academic linkages, researches and IT certified professionals.\",\"programEducationalObjectives\":\"The graduates of the Bachelor of Science in Information Technology program are:\\n1. engaged in further professional development and have interest in or aptitude for advanced studies or trainings in computing.\\n2. entrepreneurs or are employed in computing industries, organizing and managing team-based projects leading to successful and sustainable computing systems solutions.\\n3. responsible computing professionals actively participating in community groups that make a significant impact in addressing current and future societal challenges.\"}', 1523275579),
(2, 'gradingSystem', '[{\"label\":\"Midterm Grade\",\"text\":\"**Midterm Grade (MG) = 70% (Lecture Grade) + 30% (Lab Grade)**\\n\\n.\\n\\n**Lecture: 70%**\\n\\n- **Class Standing  (CS) 60%**\\n\\n    1. Average of at least two long quizzes 40%\\n    2. Teacher\\u2019s Evaluation 5%\\n    3. Class participation 25%\\n        - (Seatwork, Assignments, Recitations)\\n    4. Short Quizzes, Class Exercises 30%\\n\\n.\\n\\n**Midterm Exam (ME) 40%**\\n\\n.\\n\\n**Lab: 30%**\\n\\n- **Class Standing  (CS) 60%**\\n    1. Laboratory Exercises\\/Machine Problems 40%\\n    2. Teacher\\u2019s Evaluation 5%\\n    3. Project\\/s 30%\\n    4. Practical Exam  25%\\n\\n.\\n\\n**Midterm Exam (ME)\\t40%**\\n\\n.\\n\\n.\\n\\n**PASSING RAW SCORE: 70**\\n\\n_Note:  Grades in Lecture and Lab should be the same._\"},{\"label\":\"Final Grade\",\"text\":\"**Final Grade (FG) = 70% (Lecture Grade) + 30% (Lab Grade)**\\n\\n.\\n\\n**Lecture: 70%**\\n\\n- **Class Standing  (CS) 60%**\\n\\n    1. Average of at least two long quizzes 40%\\n    2. Teacher\\u2019s Evaluation 5%\\n    3. Class participation 25%\\n        - (Seatwork, Assignments, Recitations)\\n    4. Short Quizzes, Class Exercises 30%\\n\\n.\\n\\n**Midterm Exam (ME) 40%**\\n\\n.\\n\\n**Lab: 30%**\\n\\n- **Class Standing  (CS) 60%**\\n    1. Laboratory Exercises\\/Machine Problems 40%\\n    2. Teacher\\u2019s Evaluation 5%\\n    3. Project\\/s 30%\\n    4. Practical Exam  25%\\n\\n.\\n\\n**Midterm Exam (ME)\\t15%**\\n\\n**Final Exam (FE)\\t25%**\\n\\n.\\n\\n**PASSING RAW SCORE: 70**\\n\\n_Note:  Grades in Lecture and Lab should be the same._\"}]', 1523275585),
(3, 'cloOptions', '[{\"symbol\":\"I\",\"text\":\"Introductory\"},{\"symbol\":\"E\",\"text\":\"Engaging\"},{\"symbol\":\"D\",\"text\":\"Demonstrative\"}]', 1523275586);

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

DROP TABLE IF EXISTS `syllabi`;
CREATE TABLE `syllabi` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `version` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `syllabi`
--

TRUNCATE TABLE `syllabi`;
--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `course_id`, `editor_id`, `assign_id`, `content`, `version`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 3, 1, '{\"institutionVision\":\"FEU Institute of Technology aims to be one of the top five technology educational institutions in the Philippines.\",\"institutionMission\":\"FEU Institute of Technology is dedicated to provide quality, relevant, innovative and industry-based education producing competent and principled professionals with greater sense of responsibility, social awareness and high competitiveness contributing significantly to the betterment of the society.\",\"departmentVision\":\"The Information Technology Department aims its program specializations to be a catalyst on the delivery of industry-based standards solutions and internationally recognized IT education.\",\"departmentMission\":\"The Information Technology Department is committed to provide industry-based information technology solutions, international academic linkages, researches and IT certified professionals.\",\"programEducationalObjectives\":\"The graduates of the Bachelor of Science in Information Technology program are:\\n1. engaged in further professional development and have interest in or aptitude for advanced studies or trainings in computing.\\n2. entrepreneurs or are employed in computing industries, organizing and managing team-based projects leading to successful and sustainable computing systems solutions.\\n3. responsible computing professionals actively participating in community groups that make a significant impact in addressing current and future societal challenges.\",\"facultyInCharge\":{\"id\":\"3\",\"fname\":\"Smith\",\"mname\":\"\",\"lname\":\"Paul\",\"username\":\"ralph\",\"title\":\"\",\"weight\":\"0\",\"password\":\"$2y$10$QdPPMV36C0HmJG/EdEHlzum/sWKyzclgCGqWVUKeC1gJBjS3pVZb6\",\"img_src\":\"\",\"tags\":[],\"status\":\"1\",\"created_at\":\"0\",\"updated_at\":\"0\",\"auth\":[3,4]},\"evaluatedBy\":[[{\"id\":4,\"status\":\"1\",\"user\":{\"id\":\"4\",\"fname\":\"Roman\",\"mname\":\"\",\"lname\":\"De Angel\",\"username\":\"roman\",\"title\":\"Coordinator, ITWMA\",\"weight\":\"1\",\"password\":\"$2y$10$sy/BOOEgtIwkLbExWNlHHuqRCm/oa2zT98w5MW1wASS1iE25WL.WO\",\"img_src\":\"\",\"tags\":\"[]\",\"status\":\"1\",\"created_at\":\"0\",\"updated_at\":\"1522835142\",\"auth\":\"[\\\"3\\\",\\\"5\\\"]\"}}],[{\"id\":4,\"status\":\"1\",\"user\":{\"id\":\"4\",\"fname\":\"Roman\",\"mname\":\"\",\"lname\":\"De Angel\",\"username\":\"roman\",\"title\":\"Coordinator, ITWMA\",\"weight\":\"1\",\"password\":\"$2y$10$sy/BOOEgtIwkLbExWNlHHuqRCm/oa2zT98w5MW1wASS1iE25WL.WO\",\"img_src\":\"\",\"tags\":\"[]\",\"status\":\"1\",\"created_at\":\"0\",\"updated_at\":\"1522835142\",\"auth\":\"[\\\"3\\\",\\\"5\\\"]\"}}]],\"approvedBy\":[[{\"id\":5,\"status\":1,\"user\":{\"id\":\"5\",\"fname\":\"Rossana\",\"mname\":\"T.\",\"lname\":\"Adao\",\"username\":\"joanne\",\"title\":\"Senior Director, CCS\",\"weight\":\"10\",\"password\":\"$2y$10$Q61GloOCeRIHKx1Gz7atr.Y9ujWhJqfA8Tmix98awgRjFDW9PKZRa\",\"img_src\":\"\",\"tags\":\"[]\",\"status\":\"1\",\"created_at\":\"0\",\"updated_at\":\"1522867906\",\"auth\":\"[\\\"5\\\"]\"}}]],\"bookReferences\":[\"Schwalbe, Kathy (2011). Information Technology Project Management. Rev. 6th ed. Australia: Course Technology\",\"Wiegers K. (2013). Software requirements (3rd). Redmond, Washington: Microsoft Press\",\"Kendall (2014). System analysis and design (9th). Pearson: Upper Saddle River, NJ\"],\"programOutcomes\":{\"id\":\"2\",\"label\":\"2017\",\"content\":[{\"label\":\"a\",\"text\":\"Apply knowledge of computing, science and mathematics appropriate to the discipline.\"},{\"label\":\"b\",\"text\":\"Understand best practices and standards and their applications.\"},{\"label\":\"c\",\"text\":\"Analyze complex problems and identify and define the computing requirements appropriate to its solution.\"},{\"label\":\"d\",\"text\":\"Identify and analyze user needs and take them into account in the selection, creation, evaluation and administration of computer-based systems.\"},{\"label\":\"e\",\"text\":\"Design, implement and evaluate computer-based systems, processes,components or programs to meet desired needs and requirements under various constraints.\"},{\"label\":\"f\",\"text\":\"Integrate IT-based solutions into the user environment effectively.\"},{\"label\":\"g\",\"text\":\"Apply knowledge through the use of current techniques, skills, tools and practices necessary for the IT profession.\"},{\"label\":\"h\",\"text\":\"Function effectively as a member or leaderof a development team recognizing the different roles within a team to accomplish a common goal.\"},{\"label\":\"i\",\"text\":\"Assist in the creation of an effective IT project plan.\"},{\"label\":\"j\",\"text\":\"Communicate effectively with the computing community and with society at large about complex computing activities through logical writing, presentations and clear instructions.\"},{\"label\":\"k\",\"text\":\"Analyze the local and global impact of computing information technology on individuals, organizations and society.\"},{\"label\":\"l\",\"text\":\"Understand professional, ethical, legal, security and social issues and responsibilities in the utilization of information technology.\"},{\"label\":\"m\",\"text\":\"Recognize the need for and engage in planning self-learning and improving performance as a foundation for continuing professional development.\"}],\"latest\":\"1\",\"created_at\":\"0\",\"updated_at\":\"1522772992\",\"status\":\"1\"},\"courseLearningOutcomes\":[\"Develop and execute the project requirements based from the proposal document.\",\"Test and evaluate the software product to validate for the process and output.\",\"Complete the system defined in the plan to satisfy the project specifications and present final documentation.\"],\"intendedLearningOutcomes\":[],\"cloPoMap\":[{\"d\":{\"symbol\":\"I\",\"text\":\"Introductory\"}},{\"e\":{\"symbol\":\"I\",\"text\":\"Introductory\"}},{\"i\":{\"symbol\":\"I\",\"text\":\"Introductory\"}}],\"weeklyActivities\":[{\"noOfWeeks\":1,\"noOfHours\":\"5.34\",\"topics\":[\"Lesson 1. Project Development\",\"Lesson 2. Software Evaluation\"],\"ilo\":[\"Develop, execute and create the project deliverables.\",\"Test the software product to validate its process and output.\"],\"cloMap\":[0],\"tlaFaculty\":[\"Discussion of the Guidelines\"],\"tlaStudent\":[\"Student can clarify/ask questions on matters concerning course syllabus, OBE, and PBL.\",\"Class/Library Activity; search the current trends in IT so that they will have the idea in making their title.\"],\"instructionalMaterials\":[\"Whiteboard\"],\"assessmentTasks\":[\"Group Presentation\",\"Group Dynamics\"],\"text\":null,\"asObject\":true},{\"noOfWeeks\":\"2\",\"noOfHours\":\"5.34\",\"topics\":[\"Lesson 2. Software Evaluation\",\"Lesson 3. Project Control and Project Closure\"],\"ilo\":[\"Complete the work defined in the plan to satisfy the project specifications.\",\"Test the software product to validate its process and output.\"],\"cloMap\":[1,2],\"tlaFaculty\":[\"Require instrument for software testing.\",\"Class/Library Activity; Research current trends in IT.\"],\"tlaStudent\":[\"Class/Library Activity; search the current trends in IT so that they will have the idea in making their title.\",\"The students can be able to produce Results and Discussion of the Proposal Paper.\"],\"instructionalMaterials\":[\"DLP\",\"Net book\"],\"assessmentTasks\":[\"Documentation\",\"Class Activity\"],\"text\":null,\"asObject\":true},{\"noOfWeeks\":1,\"noOfHours\":\"2\",\"topics\":[],\"ilo\":[],\"cloMap\":[0,1],\"tlaFaculty\":[],\"tlaStudent\":[],\"instructionalMaterials\":[],\"assessmentTasks\":[\"Testing\"],\"text\":\"Final Exam\",\"asObject\":false}],\"gradingSystem\":[{\"label\":\"Midterm Grade\",\"text\":\"**Midterm Grade (MG) = 70% (Lecture Grade) + 30% (Lab Grade)**\\n\\n.\\n\\n**Lecture: 70%**\\n\\n- **Class Standing  (CS) 60%**\\n\\n    1. Average of at least two long quizzes 40%\\n    2. Teacher’s Evaluation 5%\\n    3. Class participation 25%\\n        - (Seatwork, Assignments, Recitations)\\n    4. Short Quizzes, Class Exercises 30%\\n\\n.\\n\\n**Midterm Exam (ME) 40%**\\n\\n.\\n\\n**Lab: 30%**\\n\\n- **Class Standing  (CS) 60%**\\n    1. Laboratory Exercises/Machine Problems 40%\\n    2. Teacher’s Evaluation 5%\\n    3. Project/s 30%\\n    4. Practical Exam  25%\\n\\n.\\n\\n**Midterm Exam (ME)\\t40%**\\n\\n.\\n\\n.\\n\\n**PASSING RAW SCORE: 70**\\n\\n_Note:  Grades in Lecture and Lab should be the same._\"},{\"label\":\"Final Grade\",\"text\":\"**Final Grade (FG) = 70% (Lecture Grade) + 30% (Lab Grade)**\\n\\n.\\n\\n**Lecture: 70%**\\n\\n- **Class Standing  (CS) 60%**\\n\\n    1. Average of at least two long quizzes 40%\\n    2. Teacher’s Evaluation 5%\\n    3. Class participation 25%\\n        - (Seatwork, Assignments, Recitations)\\n    4. Short Quizzes, Class Exercises 30%\\n\\n.\\n\\n**Midterm Exam (ME) 40%**\\n\\n.\\n\\n**Lab: 30%**\\n\\n- **Class Standing  (CS) 60%**\\n    1. Laboratory Exercises/Machine Problems 40%\\n    2. Teacher’s Evaluation 5%\\n    3. Project/s 30%\\n    4. Practical Exam  25%\\n\\n.\\n\\n**Midterm Exam (ME)\\t15%**\\n\\n**Final Exam (FE)\\t25%**\\n\\n.\\n\\n**PASSING RAW SCORE: 70**\\n\\n_Note:  Grades in Lecture and Lab should be the same._\"}],\"versionType\":0,\"course\":{\"id\":\"1\",\"title\":\"CAPSTONE PROJECT 1\",\"code\":\"ITWPROJ1\",\"description\":\"This course focuses on creation of reliable, efficient and maintainable software application based from the approved requirements in ITWPROJMAN. This covers implementing and testing the software, project documentation and presenting the project in front of the panel committee for final defense.\",\"objectives\":\"\",\"unitsLec\":\"3\",\"unitsLab\":\"0\",\"tags\":[\"Capstone Project\",\"Software Testing\",\"Software Evaluation\",\"Software Requirements\"],\"prerequisites\":[{\"id\":\"6\",\"title\":\"PROJECT MANAGEMENT FOR IT-WMA\",\"code\":\"ITWPROMAN\",\"description\":\"This course focuses on the Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sollicitudin, metus sit amet egestas volutpat, ligula ex tincidunt arcu, vel venenatis tortor urna non enim. Quisque ut nisi tempor, lacinia felis ac, dictum est. Sed tristique risus nec eros dapibus, sit amet facilisis eros suscipit.\",\"objectives\":\"\",\"unitsLec\":\"3\",\"unitsLab\":\"0\",\"tags\":[],\"prerequisites\":\"[]\",\"corequisites\":\"[\\\"3\\\"]\",\"created_at\":\"0\",\"updated_at\":\"1523780512\",\"status\":\"1\"}],\"corequisites\":[],\"created_at\":\"0\",\"updated_at\":\"1522415141\",\"status\":\"1\"}}', '1.0', 1527422833, 1527424326, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tasks`
--

TRUNCATE TABLE `tasks`;
--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `tags`, `status`) VALUES
(1, 'Assignment', '', '[\"Programming\",\"Database\"]', 1),
(2, 'Recitation', '', '[\"Programming\",\"Database\"]', 1),
(3, 'Short Quiz', '', '[\"Programming\",\"Database\"]', 1),
(4, 'Case Study 1', '', '[\"Programming\"]', 1),
(5, 'Seatwork/Boardwork', '', '[\"Programming\",\"Database\"]', 1),
(6, 'Lab Exercise 1', '', '[\"Programming\"]', 1),
(7, 'Case Study 3', '', '[\"Programming\"]', 1),
(8, 'Lab Exercise 2', '', '[\"Programming\"]', 1),
(9, 'Case Study 4', '', '[\"Programming\"]', 1),
(10, 'Lab Exercise 3', '', '[\"Programming\"]', 1),
(11, 'Case Study 5', '', '[\"Programming\"]', 1),
(12, 'Lab Exercise 4', '', '[\"Programming\"]', 1),
(13, 'Case Study 6', '', '[\"Programming\"]', 1),
(14, 'Lab Exercise 5', '', '[\"Database\"]', 1),
(15, 'Lab Exercise 6', '', '[\"Database\"]', 1),
(16, 'Case Study 7', '', '[\"Database\"]', 1),
(17, 'Lab Exercise 7', '', '[\"Database\"]', 1),
(18, 'Lab Exercise 8', '', '[\"Database\"]', 1),
(19, 'Seatwork', '', '[\"Programming\",\"Database\"]', 1),
(20, 'Group Dynamics', '', '[\"Capstone Project\"]', 1),
(21, 'Group Presentation', '', '[\"Capstone Project\"]', 1),
(22, 'Class Activity', '', '[\"Capstone Project\"]', 1),
(23, 'Documentation', '', '[\"Capstone Project\"]', 1),
(24, 'Testing', '', '[\"Capstone Project\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `topics`
--

TRUNCATE TABLE `topics`;
--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `tags`, `status`) VALUES
(1, 'Lesson 1. Project Development', '[\"Capstone Project\"]', 1),
(2, 'Lesson 2. Software Evaluation', '[\"Capstone Project\"]', 1),
(3, 'Lesson 3. Project Control and Project Closure', '[\"Capstone Project\"]', 1),
(4, 'Lesson 4. Project Management Process Issues', '[\"Capstone Project\"]', 1),
(5, 'Lesson 5. Writing Proposals', '[\"Capstone Project\"]', 1),
(6, 'Lesson 6. Writing Proposals', '[\"Capstone Project\"]', 1),
(7, 'Users\' Acceptance Testing', '[\"Capstone Project\"]', 1),
(8, 'Module 1. The Database Environment and Development Process', '[\"Database\"]', 1),
(9, 'Module 2. Modeling Data in the Organization', '[\"Database\"]', 1),
(10, 'Module 3. Enhanced E-R Model', '[\"Database\"]', 1),
(11, 'Module 4. Logical Database Design and the Relational Model', '[\"Database\"]', 1),
(12, 'Module 5. Introduction to SQL', '[\"Database\"]', 1),
(13, 'Module 6. Data Definition Language (DDL)', '[\"Database\"]', 1),
(14, 'Module 7. Data Manipulation Language (DML) and Transaction Control', '[\"Database\"]', 1),
(15, 'Module 8. Advanced SQL', '[\"Database\"]', 1),
(16, 'Module 9. Data Control Language (DCL)', '[\"Database\"]', 1),
(17, 'Module 10. Data and Database Administration', '[\"Database\"]', 1),
(18, 'Module 1. Introduction to Programming', '[\"Programming\"]', 1),
(19, 'Module 2.1. Introduction to C++', '[\"Programming\"]', 1),
(20, 'Module 2.2. Basic Input and Output', '[\"Programming\"]', 1),
(21, 'Module 2.3. Operators', '[\"Programming\"]', 1),
(22, 'Module 3. Assignment and Formatting', '[\"Programming\"]', 1),
(23, 'Module 4. Program Control Structures', '[\"Programming\"]', 1),
(24, 'Module 5. Repetition Control Structure', '[\"Programming\"]', 1),
(25, 'Module 6. Introduction to Arrays', '[\"Programming\"]', 1),
(26, 'PBL Orientation', '[\"Capstone Project\"]', 1),
(27, 'Sample topic 1', '', 1),
(28, 'Sample topic 2', '', 1),
(29, 'Sample topic 3', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `mname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `weight` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_src` text NOT NULL,
  `tags` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `auth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `username`, `title`, `weight`, `password`, `img_src`, `tags`, `status`, `created_at`, `updated_at`, `auth`) VALUES
(1, 'John', 'Smith', 'Doe', 'test', 'Admin', 0, '$2y$10$tEU6V/HbHOZ59TQQpUrIb.eE3enrCo5i.fYkvSKY9EPFwJJqnMh1C', 'F_1522260047.png', '[]', 1, 0, 1522834696, '[\"1\"]'),
(2, 'Jane', '', 'Doe', 'charlyn', '', 0, '$2y$10$3jQ.7tz1XYlAyMzsU1Mgfu9XciWKkMa26yPfiV2bPLGP0nVsniDuq', '', '', 1, 0, 1521732242, '[\"1\",\"2\",\"3\",\"4\"]'),
(3, 'Smith', '', 'Paul', 'ralph', '', 0, '$2y$10$QdPPMV36C0HmJG/EdEHlzum/sWKyzclgCGqWVUKeC1gJBjS3pVZb6', '', '', 1, 0, 0, '[\"3\",\"4\"]'),
(4, 'Roman', '', 'De Angel', 'roman', 'Coordinator, ITWMA', 1, '$2y$10$sy/BOOEgtIwkLbExWNlHHuqRCm/oa2zT98w5MW1wASS1iE25WL.WO', '', '[]', 1, 0, 1522835142, '[\"3\",\"5\"]'),
(5, 'Rossana', 'T.', 'Adao', 'joanne', 'Senior Director, CCS', 10, '$2y$10$Q61GloOCeRIHKx1Gz7atr.Y9ujWhJqfA8Tmix98awgRjFDW9PKZRa', '', '[]', 1, 0, 1522867906, '[\"5\"]'),
(8, 'Ace', 'C.', 'Lagman', 'lagman', 'Program Director, IT', 1, '$2y$10$XVY3K2/Mh/Ry7.Uqm/Va/up9eFgKwVyqOYkD67.3ueju2yfRbRUdu', 'F_1522263636.png', '[\"Software Testing\",\"Programming\",\"Android Application Development\",\"JavaScript\",\"Ruby\",\"NodeJS\",\"AngularJS\"]', 1, 1522263636, 1522835033, '[\"5\"]');

-- --------------------------------------------------------

--
-- Table structure for table `workflow_logs`
--

DROP TABLE IF EXISTS `workflow_logs`;
CREATE TABLE `workflow_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(16) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `workflow_logs`
--

TRUNCATE TABLE `workflow_logs`;
--
-- Dumping data for table `workflow_logs`
--

INSERT INTO `workflow_logs` (`id`, `user_id`, `assign_id`, `content`, `type`, `created_at`, `status`) VALUES
(1, 3, 1, 'viewed this syllabus.', 'view', 1527827835, 1),
(2, 3, 1, 'viewed this syllabus.', 'view', 1527828400, 1),
(3, 4, 1, 'viewed this syllabus.', 'view', 1528682422, 1),
(4, 4, 1, '<strong>level 1</strong> &mdash; approved this syllabus.', 'approval', 1528682423, 1),
(5, 4, 1, '<strong>level 2</strong> &mdash; approved this syllabus.', 'approval', 1528682425, 1),
(6, 5, 1, 'viewed this syllabus.', 'view', 1528682433, 1),
(7, 5, 1, '<strong>level 3</strong> &mdash; approved this syllabus.', 'approval', 1528682434, 1),
(8, 5, 1, 'viewed this syllabus.', 'view', 1528682440, 1),
(9, 5, 1, 'viewed this syllabus.', 'view', 1528682446, 1),
(10, 5, 1, 'viewed this syllabus.', 'view', 1528682449, 1),
(11, 5, 1, 'viewed this syllabus.', 'view', 1528682506, 1),
(12, 3, 1, 'viewed this syllabus.', 'view', 1528788853, 1),
(13, 3, 1, 'viewed this syllabus.', 'view', 1528789387, 1),
(14, 3, 1, 'viewed this syllabus.', 'view', 1528861615, 1),
(15, 3, 1, 'viewed this syllabus.', 'view', 1528965269, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `books` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`tags`);
ALTER TABLE `books` ADD FULLTEXT KEY `FULLTEXT_INDEX_CITATION_TAGS` (`citation`,`tags`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `courses` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`code`,`title`,`tags`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `materials` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`tags`);
ALTER TABLE `materials` ADD FULLTEXT KEY `FULLTEXT_INDEX_NAME_TAGS` (`name`,`tags`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `outcomes` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`content`);
ALTER TABLE `outcomes` ADD FULLTEXT KEY `FULLTEXT_INDEX_TAGS` (`tags`);
ALTER TABLE `outcomes` ADD FULLTEXT KEY `FULLTEXT_INDEX_CONTENT_TAGS` (`content`,`tags`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tasks` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`tags`);
ALTER TABLE `tasks` ADD FULLTEXT KEY `FULLTEXT_INDEX_NAME_TAGS` (`name`,`tags`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `topics` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`tags`);
ALTER TABLE `topics` ADD FULLTEXT KEY `FULLTEXT_INDEX_NAME_TAGS` (`name`,`tags`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
ALTER TABLE `users` ADD FULLTEXT KEY `FULLTEXT_INDEX` (`fname`,`mname`,`lname`,`username`,`title`);

--
-- Indexes for table `workflow_logs`
--
ALTER TABLE `workflow_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workflow_logs`
--
ALTER TABLE `workflow_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Database: `gold`
--
DROP DATABASE IF EXISTS `gold`;
CREATE DATABASE IF NOT EXISTS `gold` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gold`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_desc` blob,
  `announcement_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `announcements`
--

TRUNCATE TABLE `announcements`;
-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `app_id` int(11) NOT NULL,
  `app_firstName` varchar(255) NOT NULL,
  `app_lastName` varchar(255) NOT NULL,
  `app_gender` varchar(255) NOT NULL,
  `app_civilStatus` varchar(255) NOT NULL,
  `app_birthday` date NOT NULL,
  `app_address` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_type` varchar(255) NOT NULL,
  `app_password` varchar(255) NOT NULL,
  `app_hired` varchar(255) NOT NULL,
  `app_nationality` varchar(255) NOT NULL,
  `app_positionApplyingFor` varchar(255) NOT NULL,
  `app_expectedSalary` varchar(255) NOT NULL,
  `app_qualifications` text NOT NULL,
  `app_skills` text NOT NULL,
  `app_registerDate` datetime NOT NULL,
  `app_resumePath` text NOT NULL,
  `app_yearsExperience` int(11) NOT NULL,
  `app_validated` varchar(5) NOT NULL,
  `app_emailValidationKey` varchar(32) NOT NULL,
  `app_imagePath` text NOT NULL,
  `app_educ_attain` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `applicants`
--

TRUNCATE TABLE `applicants`;
--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `app_firstName`, `app_lastName`, `app_gender`, `app_civilStatus`, `app_birthday`, `app_address`, `app_email`, `app_type`, `app_password`, `app_hired`, `app_nationality`, `app_positionApplyingFor`, `app_expectedSalary`, `app_qualifications`, `app_skills`, `app_registerDate`, `app_resumePath`, `app_yearsExperience`, `app_validated`, `app_emailValidationKey`, `app_imagePath`, `app_educ_attain`) VALUES
(1, 'Root', ' ', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'root', 'admin', '7b24afc8bc80e548d66c4e7ff72171c5', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '0000-00-00 00:00:00', '', 0, 'true', 'd1fe173d08e959397adf34b1d77e88d7', 'goldenLogo.jpg', ''),
(2, 'Admin', ' ', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'admin', 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '0000-00-00 00:00:00', '', 0, 'true', '8e296a067a37563370ded05f5a3bf3ec', 'goldenLogo.jpg', ''),
(3, 'Darlene', 'Teves', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'dteves@gmail.com', 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-06 01:05:41', '', 0, 'true', '3dc4876f3f08201c7c76cb71fa1da439', 'goldenLogo.jpg', ''),
(4, 'Liza', 'Santos', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'lsantos@gmail.com', 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-07 07:10:31', '', 0, 'true', 'a4f23670e1833f3fdb077ca70bbd5d66', 'goldenLogo.jpg', ''),
(5, 'Bob', 'Marley', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'bmarley@gmail.com', 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-22 09:29:06', '', 0, 'true', '4c27cea8526af8cfee3be5e183ac9605', 'goldenLogo.jpg', ''),
(6, 'Snoop', 'Dogg', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'sdogg@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-25 09:32:27', '', 0, 'true', '202cb962ac59075b964b07152d234b70', 'goldenLogo.jpg', ''),
(7, 'Phil', 'Collins', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'pcollins@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-26 22:20:06', '', 0, 'true', '7f39f8317fbdb1988ef4c628eba02591', 'goldenLogo.jpg', ''),
(8, 'Don', 'Ablay', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'dablay@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'interview', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-07 17:24:07', '', 0, 'true', '3328bdf9a4b9504b9398284244fe97c2', 'goldenLogo.jpg', ''),
(9, 'Dem', 'Son', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'dson@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-09 19:31:28', '', 0, 'true', '9908279ebbf1f9b250ba689db6a0222b', 'goldenLogo.jpg', ''),
(10, 'Finn', 'The Human', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'fthuman@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-28 04:59:01', '', 0, 'true', '9ad6aaed513b73148b7d49f70afcfb32', 'goldenLogo.jpg', ''),
(11, 'Jake', 'The Dog', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jtdog@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-07 19:59:47', '', 0, 'true', '795c7a7a5ec6b460ec00c5841019b9e9', 'goldenLogo.jpg', ''),
(12, 'Princess', 'Bubblegum', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'pbubblegum@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-02 05:17:09', '', 0, 'true', 'be83ab3ecd0db773eb2dc1b0a17836a1', 'goldenLogo.jpg', ''),
(13, 'Fire', 'Princess', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'fprincess@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-01 12:42:49', '', 0, 'true', '2f55707d4193dc27118a0f19a1985716', 'goldenLogo.jpg', ''),
(14, 'Tatsuya', 'Shiba', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'tshiba@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'interview', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-09 20:28:47', '', 0, 'true', 'd4c2e4a3297fe25a71d030b67eb83bfc', 'goldenLogo.jpg', ''),
(15, 'Sound', 'Logic', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'slogic@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-06 02:59:39', '', 0, 'true', 'e2230b853516e7b05d79744fbd4c9c13', 'goldenLogo.jpg', ''),
(16, 'Naruto', 'Uzumaki', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'nuzumaki@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-12 16:37:24', '', 0, 'true', '013d407166ec4fa56eb1e1f8cbe183b9', 'goldenLogo.jpg', ''),
(17, 'Sasuke', 'Uchiha', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'suchiha@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-03 05:22:08', '', 0, 'true', 'f033ab37c30201f73f142449d037028d', 'goldenLogo.jpg', ''),
(18, 'Goku', 'Saiyan', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'gsaiyan@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-27 10:20:30', '', 0, 'true', '692f93be8c7a41525c0baf2076aecfb4', 'goldenLogo.jpg', ''),
(19, 'Co', 'Conut', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'cconut@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-23 03:24:09', '', 0, 'true', '6bc24fc1ab650b25b4114e93a98f1eba', 'goldenLogo.jpg', ''),
(20, 'Parokya', 'Ni Edgar', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'pne@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '0000-00-00 00:00:00', '', 0, 'true', '4a47d2983c8bd392b120b627e0e1cab4', 'goldenLogo.jpg', ''),
(21, 'Silent', 'Sanctuary', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'ssanctuary@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-03 14:11:24', '', 0, 'true', 'ef0d3930a7b6c95bd2b32ed45989c61f', 'goldenLogo.jpg', ''),
(22, 'Just', 'Dance', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jdance@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-26 18:23:59', '', 0, 'true', '89fcd07f20b6785b92134bd6c1d0fa42', 'goldenLogo.jpg', ''),
(23, 'Quick', 'Maths', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'qmaths@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-10 11:27:19', '', 0, 'true', 'c45147dee729311ef5b5c3003946c48f', 'goldenLogo.jpg', ''),
(24, 'No', 'Ketchup', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'nketchup@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-19 12:54:12', '', 0, 'true', 'acf4b89d3d503d8252c9c4ba75ddbf6d', 'goldenLogo.jpg', ''),
(25, 'Just', 'Sauce', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jsauce@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-22 04:43:26', '', 0, 'true', 'c2626d850c80ea07e7511bbae4c76f4b', 'goldenLogo.jpg', ''),
(26, 'Raw', 'Sauce', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'rsauce@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'interview', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-22 01:03:48', '', 0, 'true', 'f2201f5191c4e92cc5af043eebfd0946', 'goldenLogo.jpg', ''),
(27, 'Purple', 'Lamborghini', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'plambo@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-17 19:59:47', '', 0, 'true', '7f1171a78ce0780a2142a6eb7bc4f3c8', 'goldenLogo.jpg', ''),
(28, 'White', 'Iverson', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'wiverson@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-23 13:58:52', '', 0, 'true', '8d34201a5b85900908db6cae92723617', 'goldenLogo.jpg', ''),
(29, 'Noisy', 'Dog', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'ndog@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-27 07:04:43', '', 0, 'true', 'e820a45f1dfc7b95282d10b6087e11c0', 'goldenLogo.jpg', ''),
(30, 'Fast', 'AF', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'faf@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-24 21:36:54', '', 0, 'true', '816b112c6105b3ebd537828a39af4818', 'goldenLogo.jpg', ''),
(31, 'Logic', 'Gates', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'lgates@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-09 09:15:20', '', 0, 'true', '19b650660b253761af189682e03501dd', 'goldenLogo.jpg', ''),
(32, 'How', 'To', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'hto@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-05 17:45:58', '', 0, 'true', 'a87ff679a2f3e71d9181a67b7542122c', 'goldenLogo.jpg', ''),
(33, 'Lipsum', 'Irum', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'lirum@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-18 09:33:35', '', 0, 'true', 'a3d68b461bd9d3533ee1dd3ce4628ed4', 'goldenLogo.jpg', ''),
(34, 'Ed', 'Sheeran', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'esheeran@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'interview', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-23 03:33:04', '', 0, 'true', '5f93f983524def3dca464469d2cf9f3e', 'goldenLogo.jpg', ''),
(35, 'Air', 'Max', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'amax@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-25 06:25:56', '', 0, 'true', 'fe7ee8fc1959cc7214fa21c4840dff0a', 'goldenLogo.jpg', ''),
(36, 'Stan', 'Smith', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'ssmith@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-23 21:28:16', '', 0, 'true', '4c56ff4ce4aaf9573aa5dff913df997a', 'goldenLogo.jpg', ''),
(37, 'John', 'Doe', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jdoe@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-23 03:17:45', '', 0, 'true', 'f4552671f8909587cf485ea990207f3b', 'goldenLogo.jpg', ''),
(38, 'Juan', 'Dela Cruz', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jdc@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-28 10:33:15', '', 0, 'true', '13f9896df61279c928f19721878fac41', 'goldenLogo.jpg', ''),
(39, 'Black', 'Pants', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'bpants@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-22 21:01:35', '', 0, 'true', '7e7757b1e12abcb736ab9a754ffb617a', 'goldenLogo.jpg', ''),
(40, 'Green', 'Paper', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'gpaper@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-10 10:18:33', '', 0, 'true', 'ebd9629fc3ae5e9f6611e2ee05a31cef', 'goldenLogo.jpg', ''),
(41, 'Dark', 'Room', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'droom@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-26 16:17:20', '', 0, 'true', '959a557f5f6beb411fd954f3f34b21c3', 'goldenLogo.jpg', ''),
(42, 'Happy', 'T', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'ht@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-06 12:33:57', '', 0, 'true', 'a516a87cfcaef229b342c437fe2b95f7', 'goldenLogo.jpg', ''),
(43, 'Ex-', 'B', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'exb@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-17 02:11:20', '', 0, 'true', 'd61e4bbd6393c9111e6526ea173a7c8b', 'goldenLogo.jpg', ''),
(44, 'Sabog', 'Nako', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'snako@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-16 02:46:14', '', 0, 'true', '5c936263f3428a40227908d5a3847c0b', 'goldenLogo.jpg', ''),
(45, 'Sky', 'Flakes', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'sflakes@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '0000-00-00 00:00:00', '', 0, 'true', 'd645920e395fedad7bbbed0eca3fe2e0', 'goldenLogo.jpg', ''),
(46, 'Noob', 'Noob', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'nnoob@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-12 22:47:31', '', 0, 'true', 'a64c94baaf368e1840a1324e839230de', 'goldenLogo.jpg', ''),
(47, 'Samsung', 'Galaxy', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'sgalaxy@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '0000-00-00 00:00:00', '', 0, 'true', 'c361bc7b2c033a83d663b8d9fb4be56e', 'goldenLogo.jpg', ''),
(48, 'Nikki', 'Minaj', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'nminaj@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-09 16:09:13', '', 0, 'true', '0efe32849d230d7f53049ddc4a4b0c60', 'goldenLogo.jpg', ''),
(49, 'Us2q', 'Mmty', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'us2qmmty@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'interview', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-27 23:13:38', '', 0, 'true', '10a7cdd970fe135cf4f7bb55c0e3b59f', 'goldenLogo.jpg', ''),
(50, 'Kim', 'Bok Joo', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'kbokjoo@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-05 20:27:44', '', 0, 'true', '1905aedab9bf2477edc068a355bba31a', 'goldenLogo.jpg', ''),
(51, 'Emilio', 'Aguinaldo', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'eaguinaldo@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'hired', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-13 07:32:59', '', 0, 'true', '8b5040a8a5baf3e0e67386c2e3a9b903', 'goldenLogo.jpg', ''),
(52, 'Rodrigo', 'Duterte', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'rduterte@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-24 10:49:06', '', 0, 'true', '94f6d7e04a4d452035300f18b984988c', 'goldenLogo.jpg', ''),
(53, 'Leni', 'Robredo', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'lrobredo@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-12 16:03:40', '', 0, 'true', '8b16ebc056e613024c057be590b542eb', 'goldenLogo.jpg', ''),
(54, 'To', 'Mi', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'tomi@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-11 15:15:15', '', 0, 'true', 'bc6dc48b743dc5d013b1abaebd2faed2', 'goldenLogo.jpg', ''),
(55, 'Dove', 'For Men', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'dfmen@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-15 19:03:01', '', 0, 'true', '17c276c8e723eb46aef576537e9d56d0', 'goldenLogo.jpg', ''),
(56, 'Rexonna', 'For Men', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'rfmen@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-04 12:43:59', '', 0, 'true', '605ff764c617d3cd28dbbdd72be8f9a2', 'goldenLogo.jpg', ''),
(57, 'Steve', 'Kun', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'skun@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-16 01:42:46', '', 0, 'true', '170c944978496731ba71f34c25826a34', 'goldenLogo.jpg', ''),
(58, 'Gabriel', 'Villon', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'gabvll@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-13 04:34:28', '', 0, 'true', '884d247c6f65a96a7da4d1105d584ddd', 'goldenLogo.jpg', ''),
(59, 'iPhone', '6S', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'i6s@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-03 16:31:39', '', 0, 'true', 'dc5689792e08eb2e219dce49e64c885b', 'goldenLogo.jpg', ''),
(60, 'Man', 'Down', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'mdown@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-28 19:18:47', '', 0, 'true', '4b6538a44a1dfdc2b83477cd76dee98e', 'goldenLogo.jpg', ''),
(61, 'Hana', 'Bishi', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'hbishi@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-08 10:17:46', '', 0, 'true', '158f3069a435b314a80bdcb024f8e422', 'goldenLogo.jpg', ''),
(62, 'Game', 'Con', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'gcon@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-19 09:50:31', '', 0, 'true', '28dd2c7955ce926456240b2ff0100bde', 'goldenLogo.jpg', ''),
(63, 'Algolympics', '2018', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'algolympics2018@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-26 06:20:18', '', 0, 'true', '013d407166ec4fa56eb1e1f8cbe183b9', 'goldenLogo.jpg', ''),
(64, 'Jack', 'Coles', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'jcole@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-07 17:11:37', '', 0, 'true', 'd5cfead94f5350c12c322b5b664544c1', 'goldenLogo.jpg', ''),
(65, 'Alexander', 'Flynn', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'aflynn@gmail.com', 'user', '1a1dc91c907325c69271ddf0c944bc72', 'false', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-02 16:45:32', '', 0, 'true', '8e296a067a37563370ded05f5a3bf3ec', 'goldenLogo.jpg', ''),
(66, 'Staff', '', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'staff', 'staff', '1a1dc91c907325c69271ddf0c944bc72', 'true', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-19 05:54:49', '', 0, 'true', '28f0b864598a1291557bed248a998d4e', 'goldenLogo.jpg', ''),
(67, 'Liason', '', 'male', 'Single', '1999-09-09', 'P. Paredes St. Sampaloc Manila', 'liason', 'liason', '1a1dc91c907325c69271ddf0c944bc72', 'true', 'Filipino', 'Web Development', '20000', 'q1, q2, q3', 's1, s2, s3', '2018-01-27 17:10:50', '', 0, 'true', 'e165421110ba03099a1c0393373c5b43', 'goldenLogo.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicationss`
--

DROP TABLE IF EXISTS `applicationss`;
CREATE TABLE `applicationss` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `app_status` varchar(20) DEFAULT NULL,
  `app_view_status` int(1) DEFAULT NULL,
  `app_view_status_hover` int(1) DEFAULT NULL,
  `applications_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `applicationss`
--

TRUNCATE TABLE `applicationss`;
-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `educ_id` int(11) NOT NULL,
  `educ_title` varchar(255) NOT NULL,
  `educ_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `education`
--

TRUNCATE TABLE `education`;
-- --------------------------------------------------------

--
-- Table structure for table `educattainjob`
--

DROP TABLE IF EXISTS `educattainjob`;
CREATE TABLE `educattainjob` (
  `educAttainJob_id` int(11) NOT NULL,
  `educAttainJob_skill` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `educattainjob`
--

TRUNCATE TABLE `educattainjob`;
-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

DROP TABLE IF EXISTS `hired`;
CREATE TABLE `hired` (
  `hired_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `hire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `hired`
--

TRUNCATE TABLE `hired`;
-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

DROP TABLE IF EXISTS `interview`;
CREATE TABLE `interview` (
  `interview_id` int(11) NOT NULL,
  `interview_date` datetime DEFAULT NULL,
  `interview_postDate` datetime DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `interview`
--

TRUNCATE TABLE `interview`;
-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_comp` varchar(255) NOT NULL,
  `job_desc` text NOT NULL,
  `job_postDate` datetime NOT NULL,
  `job_expireDate` date NOT NULL,
  `job_startDate` date NOT NULL,
  `job_slot` int(11) NOT NULL,
  `job_age` int(11) NOT NULL,
  `job_yearsExperience` int(11) NOT NULL,
  `job_keywords` text NOT NULL,
  `job_category` varchar(255) NOT NULL,
  `job_educ_attain` varchar(4) NOT NULL,
  `job_confirmation` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_comp`, `job_desc`, `job_postDate`, `job_expireDate`, `job_startDate`, `job_slot`, `job_age`, `job_yearsExperience`, `job_keywords`, `job_category`, `job_educ_attain`, `job_confirmation`) VALUES
(1, 'Software Engineer', 'ABC Company', 'Develops software with optimized algorithms.', '2018-06-09 10:07:16', '2018-03-01', '2018-02-25', 10, 0, 0, 'software, algorithm, programmer', 'Computers', '', ''),
(2, 'Database Programmer', 'ABC Company', 'Develops databases for data storage.', '2018-06-09 10:07:16', '2018-03-01', '2018-02-25', 10, 0, 0, 'software, algorithm, programmer', 'Computers', '', ''),
(3, 'Web developer', 'ABC Company', 'Develops website stuff.', '2018-06-09 10:07:16', '2018-03-01', '2018-02-25', 10, 0, 0, 'software, algorithm, programmer', 'Computers', '', ''),
(4, 'HR Front Desk', 'ABC Company', 'Acommodates all guests of the HR department and is responsible for something.', '2018-06-09 10:07:16', '2018-03-01', '2018-02-25', 10, 0, 0, 'front desk, social, sociable', 'Sales / Retails', '', ''),
(5, 'Division Chief', 'ABC Company', 'Head of a division. Is responsible for all actions within a department.', '2018-06-09 10:07:17', '2018-03-01', '2018-02-25', 10, 0, 0, 'software, algorithm, programmer, social, sociable', 'Sales / Retails', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `qualjob`
--

DROP TABLE IF EXISTS `qualjob`;
CREATE TABLE `qualjob` (
  `qualJob_id` int(11) NOT NULL,
  `qualJob_qual` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `qualjob`
--

TRUNCATE TABLE `qualjob`;
-- --------------------------------------------------------

--
-- Table structure for table `skilljob`
--

DROP TABLE IF EXISTS `skilljob`;
CREATE TABLE `skilljob` (
  `skillJob_id` int(11) NOT NULL,
  `skillJob_skill` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `skilljob`
--

TRUNCATE TABLE `skilljob`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `applicationss`
--
ALTER TABLE `applicationss`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educ_id`);

--
-- Indexes for table `educattainjob`
--
ALTER TABLE `educattainjob`
  ADD PRIMARY KEY (`educAttainJob_id`);

--
-- Indexes for table `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`hired_id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`interview_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `qualjob`
--
ALTER TABLE `qualjob`
  ADD PRIMARY KEY (`qualJob_id`);

--
-- Indexes for table `skilljob`
--
ALTER TABLE `skilljob`
  ADD PRIMARY KEY (`skillJob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `applicationss`
--
ALTER TABLE `applicationss`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educattainjob`
--
ALTER TABLE `educattainjob`
  MODIFY `educAttainJob_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hired`
--
ALTER TABLE `hired`
  MODIFY `hired_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `interview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qualjob`
--
ALTER TABLE `qualjob`
  MODIFY `qualJob_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skilljob`
--
ALTER TABLE `skilljob`
  MODIFY `skillJob_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `jimac-test-suite`
--
DROP DATABASE IF EXISTS `jimac-test-suite`;
CREATE DATABASE IF NOT EXISTS `jimac-test-suite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jimac-test-suite`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_11_06_042309_create_test_cases_table', 1),
(3, '2018_11_06_042616_create_modules_table', 1),
(4, '2018_11_06_042641_create_test_scenario_table', 1),
(5, '2018_11_10_111549_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_case_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `modules`
--

TRUNCATE TABLE `modules`;
-- --------------------------------------------------------

--
-- Table structure for table `test_cases`
--

DROP TABLE IF EXISTS `test_cases`;
CREATE TABLE `test_cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_case_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `test_cases`
--

TRUNCATE TABLE `test_cases`;
-- --------------------------------------------------------

--
-- Table structure for table `test_scenario`
--

DROP TABLE IF EXISTS `test_scenario`;
CREATE TABLE `test_scenario` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_scenario_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_scenario_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_scenario_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_scenario_steps` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_results` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_results` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `test_scenario`
--

TRUNCATE TABLE `test_scenario`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `auth` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `status`, `auth`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ken Cosca (SQA)', 'sqa', 'kendrickjaviercosca@gmail.com', NULL, '$2y$10$djEf/4jIS6DIszKZPKDynO/WLrwLA8SNlQhxVUPoMYvPtvtN0CHsm', 1, 1, '3W19zkEXWN5eICcG', '2018-11-10 03:12:22', '2018-11-10 21:02:50'),
(2, 'Ken Cosca (Project Leader)', 'pl', 'witwiw0034@gmail.com', NULL, '$2y$10$Sc.93.dk0MsbqFcMjtaeiug1Vvd2vjpa71d3H5toD3RcknylSrz8q', 1, 2, '', '2018-11-10 03:12:22', '2018-11-10 03:12:22'),
(3, 'Ken Cosca (Project Manager)', 'pm', 'royalhmtaxi@gmail.com', NULL, '$2y$10$HKgr3q2c.XsRuNRdmnODYuisJAC7YrxiE7qT4Jk1qhj/87YrxCqHe', 1, 3, '', '2018-11-10 03:12:22', '2018-11-10 03:12:22'),
(4, 'Ken Cosca (Admin)', 'su', 'kendrickandrewjavier@gmail.com', NULL, '$2y$10$Mgl48UYDM/s8emHMyQ7a2u3M/z/Hb.2nugzI/7jpVmlwKPy.Ofvhu', 1, 4, '', '2018-11-10 03:12:22', '2018-11-10 03:12:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cases`
--
ALTER TABLE `test_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_scenario`
--
ALTER TABLE `test_scenario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_scenario_test_scenario_id_unique` (`test_scenario_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_cases`
--
ALTER TABLE `test_cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_scenario`
--
ALTER TABLE `test_scenario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `lms_sql`
--
DROP DATABASE IF EXISTS `lms_sql`;
CREATE DATABASE IF NOT EXISTS `lms_sql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lms_sql`;

-- --------------------------------------------------------

--
-- Table structure for table `authorbooktbl`
--

DROP TABLE IF EXISTS `authorbooktbl`;
CREATE TABLE `authorbooktbl` (
  `authorbook_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authorbooktbl`
--

TRUNCATE TABLE `authorbooktbl`;
-- --------------------------------------------------------

--
-- Table structure for table `authortbl`
--

DROP TABLE IF EXISTS `authortbl`;
CREATE TABLE `authortbl` (
  `author_id` int(11) NOT NULL,
  `author_fname` varchar(255) NOT NULL,
  `author_lname` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authortbl`
--

TRUNCATE TABLE `authortbl`;
-- --------------------------------------------------------

--
-- Table structure for table `booktbl`
--

DROP TABLE IF EXISTS `booktbl`;
CREATE TABLE `booktbl` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booktbl`
--

TRUNCATE TABLE `booktbl`;
--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`book_id`, `book_name`, `book_author`, `section_id`) VALUES
(1, 'Book 1', 'Author 1', 2),
(2, 'Book 2', 'Author 1', 2),
(3, 'Book 3', 'Author 1', 1),
(4, 'Book 4', 'Author 1', 1),
(5, 'Book 5', 'Author 1', 1),
(6, 'Book 6', 'Author 1', 1),
(7, 'Book 7', 'Author 1', 1),
(8, 'Book 8', 'Author 1', 1),
(9, 'Book 9', 'Author 1', 1),
(10, 'Book 10', 'Author 1', 1),
(11, 'Book 11', 'Author 1', 1),
(12, 'Book 12', 'Author 1', 1),
(13, 'Book 13', 'Author 1', 1),
(14, 'Book 14', 'Author 1', 1),
(15, 'Book 15', 'Author 1', 1),
(16, 'Book 16', 'Author 1', 1),
(17, 'Book 17', 'Author 1', 1),
(18, 'Book 18', 'Author 1', 1),
(19, 'Book 19', 'Author 1', 1),
(20, 'Book 20', 'Author 1', 1),
(21, 'Book 21', 'Author 1', 1),
(22, 'Book 22', 'Author 1', 1),
(23, 'Book 23', 'Author 1', 1),
(24, 'Book 24', 'Author 1', 1),
(25, 'Book 25', 'Author 1', 1),
(26, 'Book 26', 'Author 1', 1),
(27, 'Book 27', 'Author 1', 1),
(28, 'Book 28', 'Author 1', 1),
(29, 'Book 29', 'Author 1', 1),
(30, 'Book 30', 'Author 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itembooktbl`
--

DROP TABLE IF EXISTS `itembooktbl`;
CREATE TABLE `itembooktbl` (
  `itembook_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `itembooktbl`
--

TRUNCATE TABLE `itembooktbl`;
--
-- Dumping data for table `itembooktbl`
--

INSERT INTO `itembooktbl` (`itembook_id`, `book_id`, `book_code`, `status`, `created_at`) VALUES
(1, 1, '001', 2, 1556902221),
(2, 1, '002', 1, 1556902319),
(3, 1, '003', 1, 1556903885),
(4, 1, '004', 1, 1556910463),
(5, 2, '005', 1, 1558130091),
(6, 3, '001', 1, 1558130099);

-- --------------------------------------------------------

--
-- Table structure for table `penaltytbl`
--

DROP TABLE IF EXISTS `penaltytbl`;
CREATE TABLE `penaltytbl` (
  `penalty_id` int(11) NOT NULL,
  `penalty_date` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL,
  `penalty_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `penaltytbl`
--

TRUNCATE TABLE `penaltytbl`;
--
-- Dumping data for table `penaltytbl`
--

INSERT INTO `penaltytbl` (`penalty_id`, `penalty_date`, `penalty_amount`, `penalty_day`) VALUES
(1, 0, 20, 3),
(2, 1557649191, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

DROP TABLE IF EXISTS `sectiontbl`;
CREATE TABLE `sectiontbl` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(255) NOT NULL,
  `section_code_number` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectiontbl`
--

TRUNCATE TABLE `sectiontbl`;
--
-- Dumping data for table `sectiontbl`
--

INSERT INTO `sectiontbl` (`section_id`, `section_name`, `section_code`, `section_code_number`, `status`, `created_at`) VALUES
(1, 'None', 'NON', 1, 1, 1556900274),
(2, 'Science', 'SCI', 5, 1, 1556901623),
(3, 'Fiction', 'FIC', 1, 0, 1556901623),
(4, 'Non-Fiction', 'NFC', 1, 0, 1556901623),
(5, 'Business', 'BUS', 1, 0, 1556901623),
(6, 'Economics', 'ECO', 1, 0, 1556901623),
(7, 'Information Technology', 'IT', 1, 0, 156901623),
(8, 'Engineering', 'ENG', 1, 0, 1556901623),
(9, 'Literature', 'LIT', 1, 0, 1556901623),
(10, 'Arts', 'ART', 1, 0, 1556901623),
(11, 'Comedy', 'COM', 1, 0, 1556901623),
(12, 'Romantic', 'ROM', 1, 0, 1556901623),
(13, 'Sample 1', 'ABC', 1, 0, 1556901623),
(14, 'Sample 2', 'DEF', 1, 0, 1556901623),
(15, 'Sample 3', 'GHI', 1, 0, 1556901623),
(16, 'Sample 4', 'JKL', 1, 0, 1556901623),
(17, 'Sample 5', 'MNO', 1, 0, 1556901623),
(18, 'Sample 6', 'PQR', 1, 0, 1556901623),
(19, 'Sample 7', 'STU', 1, 0, 1556901623),
(20, 'Sample 8', 'VWX', 1, 0, 1556901623),
(21, 'Sample 9', 'YZA', 1, 0, 1556901623),
(22, 'Sample 10', 'BCD', 1, 0, 1556901623),
(23, 'Sample 11', 'EFG', 1, 0, 1556901623),
(24, 'Sample 12', 'HIJ', 1, 0, 1556901623),
(25, 'Sample 13', 'KLM', 1, 0, 1556901623),
(26, 'Sample 14', 'OPQ', 1, 0, 1556901623),
(27, 'Sample 15', 'RST', 1, 0, 1556901623),
(28, 'Sample 16', 'UVW', 1, 0, 1556901623),
(29, 'Sample 17', 'XYZ', 1, 0, 1556901623),
(30, 'Sample 18', 'KJC', 1, 0, 1556901623);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbl`
--

DROP TABLE IF EXISTS `transactiontbl`;
CREATE TABLE `transactiontbl` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `itembook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `transactiontbl`
--

TRUNCATE TABLE `transactiontbl`;
--
-- Dumping data for table `transactiontbl`
--

INSERT INTO `transactiontbl` (`transaction_id`, `transaction_date`, `return_date`, `amount_paid`, `status`, `itembook_id`, `user_id`) VALUES
(1, 1557059780, 0, 0, 1, 2, 2),
(2, 1557475991, 0, 0, 2, 3, 3),
(3, 1557477811, 0, 0, 6, 4, 1),
(4, 1558076122, 0, 0, 6, 4, 1),
(5, 1558076128, 1558076128, 80, 3, 3, 3),
(6, 1558076133, 0, 0, 6, 2, 1),
(7, 1558109684, 0, 0, 1, 1, 1),
(8, 1558110180, 0, 0, 2, 1, 1),
(9, 1558110516, 1558110516, 0, 3, 1, 1),
(10, 1558110565, 0, 0, 1, 1, 3),
(11, 1558110572, 0, 0, 6, 1, 1),
(12, 1558166260, 0, 0, 1, 1, 2),
(13, 1558166305, 0, 0, 1, 2, 2),
(14, 1557705600, 0, 0, 2, 1, 2),
(15, 1559024810, 0, 0, 2, 2, 2),
(16, 1559024816, 1559024816, 0, 3, 2, 2),
(17, 1559024821, 1559024821, 140, 3, 1, 2),
(18, 1559024826, 0, 0, 5, 4, 1),
(19, 1559024830, 0, 0, 6, 4, 1),
(20, 1559024841, 0, 0, 5, 3, 1),
(21, 1559024846, 0, 0, 5, 2, 1),
(22, 1559024850, 0, 0, 6, 2, 1),
(23, 1559024854, 0, 0, 6, 3, 1),
(24, 1559391783, 0, 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
CREATE TABLE `usertbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `password_code` varchar(6) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `usertbl`
--

TRUNCATE TABLE `usertbl`;
--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`user_id`, `username`, `email`, `password`, `user_type`, `status`, `password_code`, `created_at`) VALUES
(1, 'admin', '', '55285e5a32519431b408de651aa7a47c41369b15', 1, 1, '', 1556697008),
(2, 'ken', '', '470bc578162732ac7f9d387d34c4af4ca6e1b6f7', 0, 1, '', 1556697008),
(3, 'trix', '', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 0, 1, '', 1556697015),
(4, 'km', '', '7c688a7db4e8803973eddc22a33832015ff5c1e4', 0, 1, '', 1556697020),
(5, 'yuji', '', 'd9b713482988e8821ac416d1bb119b9123d945a0', 0, 1, '', 1556697023),
(6, 'admin2', '', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 1, 1, '', 1556701548),
(7, 'admin3', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701658),
(8, 'admin4', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701789),
(9, 'admin5', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701892),
(10, 'admin6', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1, '', 1556877050),
(12, 'bryan', 'bryanbernardo9828@gmail.com', 'fc6002e909d0dbf1c50f5db0e28af6470aceb2ca', 0, 1, 'Kg5QjJ', 1558143500),
(14, 'kendrick', 'kendric@a.c', '2eaab2fbb032b258b58fdaed26b83ca391ddcd0a', 0, 1, '', 1558169180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorbooktbl`
--
ALTER TABLE `authorbooktbl`
  ADD PRIMARY KEY (`authorbook_id`);

--
-- Indexes for table `authortbl`
--
ALTER TABLE `authortbl`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `booktbl`
--
ALTER TABLE `booktbl`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  ADD PRIMARY KEY (`itembook_id`);

--
-- Indexes for table `penaltytbl`
--
ALTER TABLE `penaltytbl`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorbooktbl`
--
ALTER TABLE `authorbooktbl`
  MODIFY `authorbook_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authortbl`
--
ALTER TABLE `authortbl`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booktbl`
--
ALTER TABLE `booktbl`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  MODIFY `itembook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penaltytbl`
--
ALTER TABLE `penaltytbl`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `phpmyadmin`
--
DROP DATABASE IF EXISTS `phpmyadmin`;
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

DROP TABLE IF EXISTS `pma__bookmark`;
CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

DROP TABLE IF EXISTS `pma__central_columns`;
CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

DROP TABLE IF EXISTS `pma__column_info`;
CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

DROP TABLE IF EXISTS `pma__designer_settings`;
CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Truncate table before insert `pma__designer_settings`
--

TRUNCATE TABLE `pma__designer_settings`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

DROP TABLE IF EXISTS `pma__export_templates`;
CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Truncate table before insert `pma__export_templates`
--

TRUNCATE TABLE `pma__export_templates`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

DROP TABLE IF EXISTS `pma__favorite`;
CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

--
-- Truncate table before insert `pma__favorite`
--

TRUNCATE TABLE `pma__favorite`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

DROP TABLE IF EXISTS `pma__history`;
CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

--
-- Truncate table before insert `pma__history`
--

TRUNCATE TABLE `pma__history`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

DROP TABLE IF EXISTS `pma__navigationhiding`;
CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Truncate table before insert `pma__navigationhiding`
--

TRUNCATE TABLE `pma__navigationhiding`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

DROP TABLE IF EXISTS `pma__pdf_pages`;
CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Truncate table before insert `pma__pdf_pages`
--

TRUNCATE TABLE `pma__pdf_pages`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

DROP TABLE IF EXISTS `pma__recent`;
CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Truncate table before insert `pma__recent`
--

TRUNCATE TABLE `pma__recent`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

DROP TABLE IF EXISTS `pma__relation`;
CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

DROP TABLE IF EXISTS `pma__savedsearches`;
CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

DROP TABLE IF EXISTS `pma__table_coords`;
CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Truncate table before insert `pma__table_coords`
--

TRUNCATE TABLE `pma__table_coords`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

DROP TABLE IF EXISTS `pma__table_info`;
CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Truncate table before insert `pma__table_info`
--

TRUNCATE TABLE `pma__table_info`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

DROP TABLE IF EXISTS `pma__table_uiprefs`;
CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

DROP TABLE IF EXISTS `pma__tracking`;
CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

DROP TABLE IF EXISTS `pma__userconfig`;
CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Truncate table before insert `pma__userconfig`
--

TRUNCATE TABLE `pma__userconfig`;
--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-06-02 10:42:49', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":220}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

DROP TABLE IF EXISTS `pma__usergroups`;
CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

--
-- Truncate table before insert `pma__usergroups`
--

TRUNCATE TABLE `pma__usergroups`;
-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

DROP TABLE IF EXISTS `pma__users`;
CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Truncate table before insert `pma__users`
--

TRUNCATE TABLE `pma__users`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `pos`
--
DROP DATABASE IF EXISTS `pos`;
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '1',
  `verif_code` varchar(20) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
