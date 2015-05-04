FR - TeamRH
===========

Nouvel intranet pour TeamRH

1) Installation de l'application
================================

Installer un serveur web avec un vhost :
##Ares
<VirtualHost *:80>
    ##ServerAdmin yourmail@domain.com
    DocumentRoot D:\Projets\ares\web
    ServerName local.ares
    ServerAlias http://local.ares
    <Directory D:\Projets\ares\web>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
    </Directory>
</VirtualHost>

Modifier le fichier hosts :
    127.0.0.1		local.ares

Clonez le dépôt git en local:
git clone http://github.com/KeurbyCandy/Ares

Mettre à jour les vendors :
composer install

Et voila !





EN - TeamRH
===========

New Intranet for TeamRH

1) Setup
========

Setup the web server (Apache/Ngynx):
##Ares
<VirtualHost *:80>
    ##ServerAdmin yourmail@domain.com
    DocumentRoot D:\Projets\ares\web
    ServerName local.ares
    ServerAlias http://local.ares
    <Directory D:\Projets\ares\web>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
    </Directory>
</VirtualHost>

Update the file hosts:
    127.0.0.1		local.ares

Clone the git repository locally :
git clone http://github.com/KeurbyCandy/Ares

Update vendors :
composer install

And voila !