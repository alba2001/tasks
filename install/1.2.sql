
CREATE TABLE IF NOT EXISTS `tsk2_doctors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fio` varchar(100) NOT NULL,
  `position_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `tsk2_doctors` (`id`, `fio`, `position_id`) VALUES
(1, 'Иваненко Иван Иванович', 1),
(2, 'Петренко Петр Петрович', 2),
(3, 'Сидоренко Сдор Сидорович', 3);

CREATE TABLE IF NOT EXISTS `tsk2_pacients` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fio` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `tsk2_pacients` (`id`, `fio`, `birth_date`) VALUES
(1, 'Иванов Иван Иванович', '2015-03-01'),
(2, 'Петров Петр Петрович', '2000-03-02'),
(3, 'Сидоров Сидор Сидорович', '1965-04-04');

CREATE TABLE IF NOT EXISTS `tsk2_doctors_pacients` (
  `doctor_id` int(10) NOT NULL,
  `pacient_id` int(10) NOT NULL,
  UNIQUE KEY `doctor_id` (`doctor_id`,`pacient_id`),
  KEY `pacient_id` (`pacient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tsk2_doctors_pacients` (`doctor_id`, `pacient_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3);

CREATE TABLE IF NOT EXISTS `tsk2_positions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `tsk2_positions` (`id`, `name`) VALUES
(1, 'Гинеколог'),
(2, 'Акушер'),
(3, 'Проктолог');

ALTER TABLE `tsk2_doctors`
  ADD CONSTRAINT `tsk2_doctors_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `tsk2_positions` (`id`);

ALTER TABLE `tsk2_doctors_pacients`
  ADD CONSTRAINT `tsk2_doctors_pacients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `tsk2_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tsk2_doctors_pacients_ibfk_2` FOREIGN KEY (`pacient_id`) REFERENCES `tsk2_pacients` (`id`) ON DELETE CASCADE;

