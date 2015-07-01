## Yogaground example application

This is an example application written in the Laravel 5 framework for a simple yoga site. It is designed to show am example of what Laravel can do.


## Set up

You'll need to have Vagrant installed on your machine. Then it's a matter of running

vagrant up

This should provision a Ubuntu 14 virtual server.

After the vagrant build is completed, log into the console and run
 composer update

Update the /vagrant/.env file
MAIL_DRIVER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

DB_HOST=localhost
DB_DATABASE=yogaground
DB_USERNAME=test22
DB_PASSWORD=pass22

Then check the unit tests are running OK
cd /vagrant
phpunit

If you get an error with PHPUnit complaining that "Maximum function nesting level of '100' reached, aborting!", then go to
sudo nano :/etc/php5/cli/conf.d/20-xdebug.ini and add the line
xdebug.max_nesting_level=200
Then run
sudo service apache2 restart and test again. It should now work

http://localhost:8080
and run the application

### License

The yogaground application is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
