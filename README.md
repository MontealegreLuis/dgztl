# Car Management Test

## Installation

### Install Composer

### Generate project

### Install dependencies

### Configure a virtual host

Add this line to your `hosts` file (ie, `/etc/hosts`)

    127.0.0.1 checoperez.dev
    
Add this to your Apache's `vhost.conf` file (ie, `/etc/httpd/conf.d/vhosts.conf`

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
    
Create symlink to assets

    cd web/
    ln -s ../lib/vendor/symfony/symfony1/data/web/sf/ sf
