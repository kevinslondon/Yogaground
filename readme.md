## Yogaground example application

This is an example application written in the Laravel 5 framework for a simple yoga site. It is designed to demonstrate some example Laravel code .

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

DB_USERNAME=testing_yoga

DB_PASSWORD=yoga$pass

Then check the unit tests are running OK

cd /vagrant

phpunit

Then run

sudo service apache2 restart and test again. It should now work

http://localhost:8080
and run the application

The admin user is test@testing.com and password is testingt123
http://localhost:8080/auth/login

### License

The yogaground application is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
