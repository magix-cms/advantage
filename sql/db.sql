CREATE TABLE IF NOT EXISTS `mc_advantage` (
  `id_adv` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `icon_adv` varchar(80) NOT NULL DEFAULT 'star',
  `order_adv` smallint(3) unsigned NOT NULL default 0,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_adv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `mc_advantage_content` (
  `id_content` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_adv` smallint(5) unsigned NOT NULL,
  `id_lang` smallint(3) unsigned NOT NULL,
  `title_adv` varchar(130) NOT NULL,
  `desc_adv` text DEFAULT NULL,
  `url_adv` varchar(200) DEFAULT NULL,
  `blank_adv` smallint(1) unsigned NOT NULL default 0,
  PRIMARY KEY (`id_content`),
  KEY `id_adv` (`id_adv`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `mc_advantage_content`
  ADD CONSTRAINT `mc_advantage_content_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `mc_lang` (`id_lang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mc_advantage_content_ibfk_1` FOREIGN KEY (`id_adv`) REFERENCES `mc_advantage` (`id_adv`) ON DELETE CASCADE ON UPDATE CASCADE;