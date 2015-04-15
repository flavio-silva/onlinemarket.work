CREATE TABLE `world_city_area_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(128) NOT NULL,
  `country` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
