-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 May 2013, 21:53:29
-- Sunucu sürümü: 5.5.25a
-- PHP Sürümü: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `harkutco_cloud_quiz`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_detail` text NOT NULL,
  `answer_letter` text NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_date` varchar(50) NOT NULL,
  `event_title` varchar(250) NOT NULL,
  `event_detail` text NOT NULL,
  `event_builder_ssn` bigint(12) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_builder_id` (`event_builder_ssn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `event`
--

INSERT INTO `event` (`event_id`, `event_date`, `event_title`, `event_detail`, `event_builder_ssn`) VALUES
(2, '20-07-1974', 'kizim ayse tatile ciksin', 'kizim ayse annesini de alip tatile ciksin', 13368369400),
(6, '20-07-2013', 'kar tatili', 'bugun kar tatiti cocuklar okula gelmeyin', 13368369400);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `lecture_id` int(11) NOT NULL AUTO_INCREMENT,
  `lecture_name` text NOT NULL,
  PRIMARY KEY (`lecture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `lecture_name`) VALUES
(2, 'Türkçe');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender_id` (`sender_id`,`receiver_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `msg_view_by_receiver_id`
--
CREATE TABLE IF NOT EXISTS `msg_view_by_receiver_id` (
`message_id` int(11)
,`receiver_id` int(11)
,`message_content` text
);
-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `msg_view_by_sender_id`
--
CREATE TABLE IF NOT EXISTS `msg_view_by_sender_id` (
`message_id` int(11)
,`sender_id` int(11)
,`message_content` text
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_detail` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `question`
--

INSERT INTO `question` (`question_id`, `question_detail`, `subject_id`) VALUES
(3, 'aşağıdakilerrin hangisi aşağıdadır', 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` text NOT NULL,
  `lecture_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `lecture_id` (`lecture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `lecture_id`) VALUES
(10, 'anlatim bozukluklari', 2),
(11, 'dilbilgisi', 2),
(12, 'noktalama işaretleri', 2),
(13, 'cümle bilgisi', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(250) NOT NULL,
  `teacher_surname` varchar(250) NOT NULL,
  `teacher_branch_id` int(11) NOT NULL,
  `teacher_email` text NOT NULL,
  `teacher_password` text NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `teacher_branch_id` (`teacher_branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_surname`, `teacher_branch_id`, `teacher_email`, `teacher_password`) VALUES
(1, 'ferit', 'akdeniz', 2, 'akdenizferit@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `teacher_brach_view`
--
CREATE TABLE IF NOT EXISTS `teacher_brach_view` (
`teacher_id` int(11)
,`teacher_name` varchar(250)
,`teacher_surname` varchar(250)
,`teacher_email` text
,`teacher_password` text
,`teacher_branch_id` int(11)
,`teacher_branch_name` text
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher_branch`
--

CREATE TABLE IF NOT EXISTS `teacher_branch` (
  `teacher_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_branch_name` text NOT NULL,
  PRIMARY KEY (`teacher_branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `teacher_branch`
--

INSERT INTO `teacher_branch` (`teacher_branch_id`, `teacher_branch_name`) VALUES
(2, 'Türkçe');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`) VALUES
(1, 'yunus ekiz', 'ynsekiz@gmail.com'),
(2, 'cagri yeni', 'cagri.yeni@gmail.com'),
(3, 'osman nuri', 'goldenpoisonfrog@gmail.com');

-- --------------------------------------------------------

--
-- Görünüm yapısı `msg_view_by_receiver_id`
--
DROP TABLE IF EXISTS `msg_view_by_receiver_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`harkutco`@`localhost` SQL SECURITY DEFINER VIEW `msg_view_by_receiver_id` AS select `message`.`message_id` AS `message_id`,`message`.`receiver_id` AS `receiver_id`,`message`.`message_content` AS `message_content` from (`user` join `message`) where (`message`.`receiver_id` = `user`.`user_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `msg_view_by_sender_id`
--
DROP TABLE IF EXISTS `msg_view_by_sender_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`harkutco`@`localhost` SQL SECURITY DEFINER VIEW `msg_view_by_sender_id` AS select `message`.`message_id` AS `message_id`,`message`.`sender_id` AS `sender_id`,`message`.`message_content` AS `message_content` from (`user` join `message`) where (`message`.`sender_id` = `user`.`user_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `teacher_brach_view`
--
DROP TABLE IF EXISTS `teacher_brach_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`harkutco`@`localhost` SQL SECURITY DEFINER VIEW `teacher_brach_view` AS select `teacher`.`teacher_id` AS `teacher_id`,`teacher`.`teacher_name` AS `teacher_name`,`teacher`.`teacher_surname` AS `teacher_surname`,`teacher`.`teacher_email` AS `teacher_email`,`teacher`.`teacher_password` AS `teacher_password`,`teacher_branch`.`teacher_branch_id` AS `teacher_branch_id`,`teacher_branch`.`teacher_branch_name` AS `teacher_branch_name` from (`teacher` join `teacher_branch`) where (`teacher`.`teacher_branch_id` = `teacher_branch`.`teacher_branch_id`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lecture_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`teacher_branch_id`) REFERENCES `teacher_branch` (`teacher_branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
