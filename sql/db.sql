--
-- Structure de la table `mc_plugins_advantage`
--

CREATE TABLE IF NOT EXISTS `mc_plugins_advantage` (
  `idadv` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `idlang` int(10) unsigned NOT NULL,
  `title` varchar(130) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `icon` varchar(80) NOT NULL DEFAULT 'star',
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idadv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;