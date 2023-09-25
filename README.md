# advantage
Plugin Advantage for Magix CMS 3

Ajouter un ou plusieurs block sur la page d'accueil de votre site internet avec le plugin de mise en avant de vos points forts.

### version

[![release](https://img.shields.io/github/release/magix-cms/advantage.svg)](https://github.com/magix-cms/advantage/releases/latest)

<img width="691" alt="Advantage admin" src="https://user-images.githubusercontent.com/356674/231793568-ee57d439-f72a-4307-94c0-81b2a0077b64.png">

## Installation
 * Décompresser l'archive dans le dossier "plugins" de magix cms
 * Connectez-vous dans l'administration de votre site internet
 * Cliquer sur l'onglet plugins du menu déroulant pour sélectionner advantage (points forts).
 * Une fois dans le plugin, laisser faire l'auto installation
 * Il ne reste que la configuration du plugin pour correspondre avec vos données.
 * Copier le contenu du dossier **skin/public** dans le dossier de votre skin.

### Ajouter dans home.tpl la ligne suivante

```smarty
{block name="main:after"}
    {include file="advantage/brick/advantages.tpl" orientation="top"}
{/block}
````