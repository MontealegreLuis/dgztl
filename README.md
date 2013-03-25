# Car Management Test

## Installation

### Install Composer

To install Composer run the folwing command in your Apache document root folder.

    curl -s https://getcomposer.org/installer | php

### Generate project

Create the project using the `composer.phar` file recently downloaded.

    php composer.phar create-project montealegreluis/carmsys dgztl

This command will install the project in a folder named `dgztl`.

### Install dependencies

Once the project is created, install the dependencies needed to run the project.

    php composer.phar install

### Configure a virtual host

Add this line to your `hosts` file (`/etc/hosts`)

    127.0.0.1 checoperez.dev
    
Add this to your Apache's `vhost.conf` file (`/etc/httpd/conf.d/vhosts.conf`)

    #
    # checoperez.dev
    #
    <VirtualHost *:80>
        ServerName checoperez.dev
        DocumentRoot /path/to/documentroot/dgztl/web
        <Directory "/path/to/documentroot/dgztl/web">
            Options Indexes MultiViews FollowSymLinks
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
    
Create a symlink to the application assets

    cd web/
    ln -s ../lib/vendor/symfony/symfony1/data/web/sf/ sf

### Run the application

Open a browser and go to

    http://checoperez.dev