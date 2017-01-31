# advantage
Plugin Advantage for Magix CMS

Ajouter un ou plusieurs block sur la page d'accueil de votre site internet avec le plugin de mise en avant de vos points forts.

![Plugin Advantage Magix CMS](https://cloud.githubusercontent.com/assets/356674/12450032/886a4f40-bf81-11e5-84cf-20cb19ba4a08.png "Plugin Advantage ou points fort dans Magix CMS")

###version 

[![release](https://img.shields.io/github/release/magix-cms/advantage.svg)](https://github.com/magix-cms/advantage/releases/latest)


## Installation
 * Décompresser l'archive dans le dossier "plugins" de magix cms
 * Connectez-vous dans l'administration de votre site internet
 * Cliquer sur l'onglet plugins du menu déroulant pour sélectionner advantage (points forts).
 * Une fois dans le plugin, laisser faire l'auto installation
 * Il ne reste que la configuration du plugin pour correspondre avec vos données.
 * Copier le fichier **function.widget_advantage_data.php** dans le dossier widget de votre skin.

### Ajouter dans home.tpl la ligne suivante

```smarty
{block name="main:after"}
    {include file="home/brick/advantages.tpl" orientation="left" links=true}
    {include file="home/brick/main-cat.tpl"}
{/block}
````