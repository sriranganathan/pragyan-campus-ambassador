###Pragyan Campus Ambassador

A laravel based webapp with following features
* Facebook login for registration
* Task distribution to selected ambassadors
* Leaderboard display 

##Build Instructions

1. Clone the repository
2. Run `composer install` in the home directory which will install all dependencies
3. Change .env.example to .env and run `php artisan key:generate`
4. Edit database parameters in .env file
5. Run `php artisan migrate` to run the migrations
6. Start the server with `php artisan serve`
