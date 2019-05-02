# advantage
Plugin Advantage for Magix CMS 3

Ajouter un ou plusieurs block sur la page d'accueil de votre site internet avec le plugin de mise en avant de vos points forts.

![screenshot-2018-2-27 advantage magix cms admin](https://user-images.githubusercontent.com/356674/36724134-88738242-1bb2-11e8-9379-30fd3ba3a5ca.png)

## Installation
 * Décompresser l'archive dans le dossier "plugins" de magix cms
 * Connectez-vous dans l'administration de votre site internet
 * Cliquer sur l'onglet plugins du menu déroulant pour sélectionner advantage (points forts).
 * Une fois dans le plugin, laisser faire l'auto installation
 * Il ne reste que la configuration du plugin pour correspondre avec vos données.
 * Copier le contenu du dossier **skin/public** dans le dossier de votre skin.
 * Copier le contenu du fichier **public.js** à la fin du fichier **global.js** de votre skin

### Ajouter dans home.tpl la ligne suivante

```smarty
{block name="main:after"}
    {include file="advantage/brick/advantages.tpl" orientation="top"}
{/block}
````