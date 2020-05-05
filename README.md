How to use
Clone the repository with git clone
Copy .env.example file to .env and edit database credentials there
Add L5_SWAGGER_GENERATE_ALWAYS=true to .env
Run composer install
Run php artisan key:generate
Run php artisan migrate
Run php artisan serve
Open main url/api/v1 to use swagger ui
