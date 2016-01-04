# advantage
Plugin Advantage for Magix CMS

## Installation
 * Décompresser l'archive dans le dossier "plugins" de magix cms
 * Connectez-vous dans l'administration de votre site internet
 * Cliquer sur l'onglet plugins du menu déroulant pour sélectionner advantage (points forts).
 * Une fois dans le plugin, laisser faire l'auto installation
 * Il ne reste que la configuration du plugin pour correspondre avec vos données.

### Ajouter dans home.tpl la ligne suivante

```smarty
{block name="main:after"}
    {include file="home/brick/advantages.tpl" orientation="left" links=true}
    {include file="home/brick/main-cat.tpl"}
{/block}
````

