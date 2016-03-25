CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) NOT NULL,
  `parentid` int(10) NOT NULL,
  `item` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `items` (`id`, `parentid`, `item`) VALUES
(1, 0, 'Item 1'),
(2, 0, 'Item 2'),
(3, 0, 'Item 3'),
(4, 0, 'Item 4'),
(5, 1, 'Item 1.2'),
(6, 1, 'Item 1.1'),
(7, 6, 'Item 1.1.2'),
(8, 6, 'Item 1.1.1'),
(9, 8, 'Item 1.1.1.1'),
(10, 1, 'Item 1.3'),
(11, 2, 'Item 2.1');

