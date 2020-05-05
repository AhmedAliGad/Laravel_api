# Laravel Api documenation wiht Swagger

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Add __.L5_SWAGGER_GENERATE_ALWAYS=true__ to __.env__
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate__
- Run __php artisan serve__
- Open main __.url/api/v1__ to use swagger documentation
