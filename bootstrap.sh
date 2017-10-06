#!/usr/bin/env bash

# ---------------------------------------
#          Virtual Machine Setup
# ---------------------------------------

# Adding multiverse sources.
cat > /etc/apt/sources.list.d/multiverse.list << EOF
deb http://archive.ubuntu.com/ubuntu xenial multiverse
deb http://archive.ubuntu.com/ubuntu xenial-updates multiverse
deb http://security.ubuntu.com/ubuntu xenial-security multiverse
EOF


# Updating packages
apt-get update

# ---------------------------------------
#          Apache Setup
# ---------------------------------------

# Installing Packages
apt-get install -y apache2 libapache2-mod-fastcgi apache2-mpm-worker

# linking Vagrant directory to Apache 2.4 public directory
rm -rf /var/www
ln -fs /vagrant /var/www

# Add ServerName to httpd.conf
sudo echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/var/www/public"
  ServerName localhost
  <Directory "/var/www/public">
    AllowOverride All
  </Directory>
</VirtualHost>
EOF
)
sudo echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf

# Loading needed modules to make apache work
a2enmod actions fastcgi rewrite
service apache2 reload

# ---------------------------------------
#          PHP Setup
# ---------------------------------------

# Installing packages
apt-get install -y php7.0 php7.0-cli php7.0-fpm curl php7.0-curl php7.0-mcrypt php7.0-xdebug

# Creating the configurations inside Apache
cat > /etc/apache2/conf-available/php7.0-fpm.conf << EOF
<IfModule mod_fastcgi.c>
    AddHandler php7-fcgi .php
    Action php7.0-fcgi /php7.0-fcgi
    Alias /php7.0-fcgi /usr/lib/cgi-bin/php7.0-fcgi
    FastCgiExternalServer /usr/lib/cgi-bin/php7.0-fcgi -socket /var/run/php7.0-fpm.sock -pass-header Authorization

    # NOTE: using '/usr/lib/cgi-bin/php5-cgi' here does not work,
    #   it doesn't exist in the filesystem!
    <Directory /usr/lib/cgi-bin>
        Require all granted
    </Directory>

</IfModule>
EOF

# Enabling php modules
php7enmod mcrypt

# Triggering changes in apache
a2enconf php7.0-fpm
service apache2 reload



# ---------------------------------------
#          MySQL Setup
# ---------------------------------------

# Setting MySQL root user password root/root
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

# Installing packages
apt-get install -y mysql-server mysql-client php7.0-mysql

# Set up the database
mysql -uroot -proot < /vagrant/sql/user.sql
# Import the data
mysql -uroot -proot yogaground < /vagrant/sql/yogaground.sql
# ---------------------------------------
#          PHPMyAdmin setup
# ---------------------------------------

# Default PHPMyAdmin Settings
sudo debconf-set-selections <<< 'phpmyadmin phpmyadmin/dbconfig-install boolean true'
sudo debconf-set-selections <<< 'phpmyadmin phpmyadmin/app-password-confirm password root'
sudo debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/admin-pass password root'
sudo debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/app-pass password root'
sudo debconf-set-selections <<< 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2'

# Install PHPMyAdmin
sudo apt-get install -y phpmyadmin

# Make Composer available globally
sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/sites-enabled/phpmyadmin.conf

# Restarting apache to make changes
sudo service apache2 restart



# ---------------------------------------
#       Tools Setup
# ---------------------------------------

# php unit
sudo wget https://phar.phpunit.de/phpunit.phar
sudo chmod +x phpunit.phar
sudo sudo mv phpunit.phar /usr/local/bin/phpunit

# Installing nodejs and npm
sudo apt-get install -y nodejs

# Installing Bower and Grunt
sudo npm install -g bower grunt-cli

# Installing GIT
sudo apt-get install -y git

# Install Composer
sudo curl -s https://getcomposer.org/installer | php

# Make Composer available globally
sudo mv composer.phar /usr/local/bin/composer

sudo cat > /etc/php5/cli/conf.d/20-xdebug.ini << EOF
xdebug.max_nesting_level=200
EOF


# Install MailHog
sudo  wget https://github.com/mailhog/MailHog/releases/download/v0.1.7/MailHog_linux_386
sudo  mv MailHog_linux_386 /usr/local/bin/mailhog

 sudo tee /etc/init/mailhog.conf <<EOL
 description "Mailhog"
 start on runlevel [2345]
 stop on runlevel [!2345]
 respawn
 pre-start script
 exec su - vagrant -c "/usr/bin/env ~/mailhog > /dev/null 2>&1 &"
 end script
 EOL

 # add aliases
echo "alias a=\"clear;php artisan --env=local\"" >> /home/vagrant/.bashrc
echo "alias am=\"clear;php artisan --env=local migrate\"" >> /home/vagrant/.bashrc
echo "alias as=\"clear;php artisan --env=local migrate:refresh --seed\"" >> /home/vagrant/.bashrc
echo "alias v=\"clear;cd /vagrant\"" >> /home/vagrant/.bashrc
echo "alias c=\"clear\"" >> /home/vagrant/.bashrc
echo "alias phpunit=\"clear;php /usr/local/bin/phpunit\"" >> /home/vagrant/.bashrc
source /home/vagrant/.bashrc

php /vagrant/artisan key:generate

mv /vagrant/.env_example .env
