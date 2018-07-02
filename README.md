"# xmenInnovation" 

this project defines who is mutant and who is xmen

Prerequierments

- PHP Version 7.0+
- Mysql
- Install composer and verify this one is running correctly.
	https://www.tutorialspoint.com/laravel/laravel_overview.htm
- Create an empty database named xmeninnovation


Run the app

To run this project is needed to run the following commands
- go into laravel folder
	+ Create an empty database
	+ run "php artisan migrate" by cmd, this command will create the scheme of the database.
	+ run "php artisan serve"
	
After installing the app
	- The app allows to send requests to the Mutants in order to become in XMEN
	- The Xmen can validate if a mutant request is valid or not.
		* default user is admin@admin.com with password 12345
	- when a xmen approve any mutant request, the mutant can go into the Xmen dashboard with his email and his password would be the same email.
		Username = email registered 
		Password = email registered.
	
	
	
	