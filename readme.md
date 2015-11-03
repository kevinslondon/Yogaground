## Yogaground example application

This is an example application written in the Laravel 5 framework for a simple yoga site. It is designed to demonstrate some example Laravel code .

## Set up

You'll need to have Vagrant installed on your machine. Then it's a matter of running

vagrant up

This should provision a Ubuntu 14 virtual server.

After the vagrant build is completed, log into the console (vagrant ssh) and run
 composer update


If you don't know what the app key is, run

php artisan key:generate

Now update the .env file with the new key
nano /vagrant/.env

Make sure that /vagrant/storage/ is writable

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
