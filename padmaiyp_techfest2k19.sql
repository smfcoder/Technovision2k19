-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2019 at 05:21 PM
-- Server version: 5.6.43-84.3-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padmaiyp_techfest2k19`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, '@dmin', 'techno@2k19');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `filename` text NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `name`, `filename`, `size`) VALUES
(4, 'Innovative Idea Competition template', 'Innovative Idea Competition template.docx', 12510),
(5, 'IEEE-Paper Submission Format', 'IEEE-Conference-A4.pdf', 124929),
(6, 'Rules and Regulation', 'Rules and Regulation.docx', 19932);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `filename` text NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` text NOT NULL,
  `grp` text NOT NULL,
  `title` text NOT NULL,
  `status_g` int(11) NOT NULL,
  `app_g` int(11) NOT NULL,
  `rej_g` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `filename` text NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` text NOT NULL,
  `grp` text NOT NULL,
  `title` text NOT NULL,
  `status_i` int(11) NOT NULL,
  `app_i` int(11) NOT NULL,
  `rej_i` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logina`
--

CREATE TABLE `logina` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logina`
--

INSERT INTO `logina` (`id`, `user`, `pass`) VALUES
(1, 'groupA', 'mod@group@');

-- --------------------------------------------------------

--
-- Table structure for table `loginb`
--

CREATE TABLE `loginb` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginb`
--

INSERT INTO `loginb` (`id`, `user`, `pass`) VALUES
(1, 'groupB', 'mod@groupb@');

-- --------------------------------------------------------

--
-- Table structure for table `loginc`
--

CREATE TABLE `loginc` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginc`
--

INSERT INTO `loginc` (`id`, `user`, `pass`) VALUES
(1, 'groupC', 'groupc@mod');

-- --------------------------------------------------------

--
-- Table structure for table `logini`
--

CREATE TABLE `logini` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logini`
--

INSERT INTO `logini` (`id`, `user`, `pass`) VALUES
(1, 'idea', 'ide@');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `user`, `pass`) VALUES
(1, 'Modgcoej', 'mod@gcoej');

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `branch` text NOT NULL,
  `inst` text NOT NULL,
  `grp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `googleid` text NOT NULL,
  `email` text NOT NULL,
  `propicture` text NOT NULL,
  `phoneno` text NOT NULL,
  `college_name` text NOT NULL,
  `university_name` text NOT NULL,
  `pass` text NOT NULL,
  `auth1` text NOT NULL,
  `auth2` text NOT NULL,
  `auth3` text NOT NULL,
  `profilestat` int(11) NOT NULL,
  `state` text NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supper`
--

CREATE TABLE `supper` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supper`
--

INSERT INTO `supper` (`id`, `email`) VALUES
(1, 'principal@gcoej.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`id`, `text`) VALUES
(1, '<center style=\"font-size:25px;\"><b><u>Paper Presentation Competition</u></b></center><br>\r\n<b>Eligibility Rules:</b><br>\r\n1. Eligibility of participation and submitting paper shall be from Engineering. stream, Diploma,or any Science UG & PG programs of all branches.<br>\r\n<br>\r\n<b>Paper Submission Rules:</b><br>\r\n1. The last date for paper submission is 10th Oct 2019.<br>\r\n2. Maximum 3 authors are allowed per paper.<br>\r\n3. The theme of the paper shall be technology-based but not limited to the themes mentioned in the brochure.<br>\r\n4. A complete paper should not exceed 8 pages.<br>\r\n5. The paper should be written in IEEE format (template available in the <a href=\"../downloads.php\"> download section</a>).<br>\r\n6. The paper must be preceded by a cover page specifying the title of the paper, names of authors, <br>their affiliated institutes and their contact numbers with email id.<br>\r\n7. Paper submitted should be strictly in PDF/DOC/DOCX Format. Please bring your Powerpoint<br> presentation in your personal pen drive.<br>\r\n<b>Event Rules:</b><br>\r\n1. Participation Fees will be Rs. 300.<br>\r\n2. The teams will get 8 minutes for presentation and 2 minutes for conclusion followed by a Q&A<br> session<br>\r\n3. Participant required to bring College Identity Card at the time of the event.<br>\r\n4. All teams and their respective members should report the registration desk on/before 8.00 am on<br> the day of the event.<br>\r\n5. The final list of shortlisted papers will be displayed on the website by 13th  October 2019<br>\r\n\r\n<center style=\"font-size:25px;\"><b><u>Innovative Idea Competition</u></b></center><br>\r\n<b>About Event:</b><br>\r\nâ€¢	Present your break-through and innovative ideas for solving a socio-economic and industrial problem.<br>\r\nâ€¢	Ideas can be from any domain such as industrial application, smart communication, defence, science and technology, agriculture and rural development, environment, healthcare and biomedical devices, finance, security and surveillance, startup and business idea.<br> \r\n<b>Eligibility Rules:</b><br>\r\n1. Eligibility of participation and submitting idea shall be from any stream of science, commerce,Engineering. stream, Diploma, UG & PG programs of all branches.<br>\r\nIdea Submission Rules:<br>\r\n1. The last date for idea submission is 10th Oct 2019.<br>\r\n2. Maximum 2 authors are allowed per idea.<br>\r\n3. The complete idea should not exceed 4 pages.<br>\r\n4. The idea must be preceded by a cover page specifying the title of the paper, names of authors, their affiliated institutes and their contact numbers with email id.<br>\r\n6. Idea submitted should be strictly in PDF/DOC/DOCX Format. Please bring your PowerPoint<br> presentation in your personal pen drive.<br>\r\n7. If your idea is product based you can demonstrate it either with prototype or by both prototype and PowerPoint.<br>\r\n<b>Event Rules:</b><br>\r\n1. Participation Fees will be Rs. 200.<br>\r\n2. The teams will get 10 minutes for presentation and 3 minutes for conclusion followed by a Q&A<br> session<br>\r\n3. Participant required to bring college Identity Card at the time of the event.<br>\r\n4. All teams and their respective members should report the registration desk on/before 8.00 am on<br> the day of the event.<br> \r\n5. The final list of shortlisted ideas will be displayed on the website by 13th  October 2019<br>\r\n \r\n\r\n<center><b style=\"font-size:25px;\"><u>TA and Accommodation rules:</u></b></center><br>\r\n<b>Travelling Allowance Rules:</b><br>\r\n1. One side Fare for OUT of  North Maharashtra University region participant.<br>\r\n2. To & fro fare for OUT of  Maharashtra state participant.<br>\r\n3. Participants will be paid fare of only Railway sleeper class (SL II) and State Transport Bus. Fare for any other mode of transport shall be entitled as per Government Institution norms and regulations.<br>\r\n4. Railway fare will be calculated from nearest Railway station of Participantâ€™s College to Jalgaon Railway station.<br>\r\n5. State transport bus fare will be calculated from the nearest bus depot of Participantâ€™s College to Jalgaon bus depot.<br>\r\n6. A participant has to produce original travel ticket without which no fare will be paid.<br>\r\n7. Participants should submit their TA bill as per the format is given in the downloads section.<br>\r\n8. All rights are reserved with the organizing committee.<br>\r\n<b>Accommodation Rules:</b><br>\r\n1. Accommodation will be provided during TECHNOVISION event in the college hostel.<br>\r\n2. Accommodation will be on first come first serve rule and on shared basis.<br>\r\n3. Accommodation will be provided from 18:00 hrs on 15-10-2019 to 18:00 hrs on 16-10-2019.<br>\r\n4. Hospitality will include accommodation in students hostel, working Lunch on 16th October 2019.<br>\r\n5. A nominal fees of Rs. 50/- per person will be charged for accommodation.<br>\r\n6. Intimate us for accommodation up to 14th Oct 2019, 17:00 hrs.<br>\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logina`
--
ALTER TABLE `logina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginb`
--
ALTER TABLE `loginb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginc`
--
ALTER TABLE `loginc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logini`
--
ALTER TABLE `logini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supper`
--
ALTER TABLE `supper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logina`
--
ALTER TABLE `logina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginb`
--
ALTER TABLE `loginb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginc`
--
ALTER TABLE `loginc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logini`
--
ALTER TABLE `logini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supper`
--
ALTER TABLE `supper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
