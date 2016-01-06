--
-- Structure de la table `mc_plugins_advantage`
--

CREATE TABLE IF NOT EXISTS `mc_plugins_advantage` (
  `idadv` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `idlang` smallint(3) unsigned NOT NULL,
  `title` varchar(130) NOT NULL,
  `content` text DEFAULT NULL,
  `icon` varchar(80) NOT NULL DEFAULT 'star',
  `url` varchar(200) DEFAULT NULL,
  `advorder` smallint(3) unsigned NOT NULL default 0,
  PRIMARY KEY (`idadv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;