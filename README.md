# LKS Cloud Computing DIY 2024

Repository ini merupakan aplikasi berbasis web yang digunakan untuk seleksi LKS DIY 2024 bidang Cloud Computing.

```
   ...    *    .   _  .
*  .  *     .   * (_)   *
  .      |*  ..   *   ..
   .  * \|  *  ___  . . *
*   \/   |/ \/{o,o}     .
  _\_\   |  / /)  )* _/_ *
      \ \| /,--"-"---  ..
_-----`  |(,__,__/__/_ .
       \ ||      ..
        ||| .            *
        |||
lkscc   |||
  , -=-~' .-^- _
```

## Requirements
 - [v8.1+](https://www.php.net/)
 - [Composer v2](https://yarnpkg.com/en/docs/install)
 - Stable version of [Docker](https://docs.docker.com/engine/install/)
 - Compatible version of [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

## Getting started
### Clone the repo:
```bash
git clone --depth 1 https://github.com/denikn/lksdiycc2024
cd lksdiycc2024
rm -rf .git
```

### Set environment variables:
```bash
cp .env.example .env
```

### Set key:
```bash
php artisan key:generate
```

### Set database on .env (fill your AWS database config):
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Set S3 on .env (fill your AWS S3 config):
```bash
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=ap-southeast-2
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
```

### Set SQS on .env (fill your AWS SQS config):
```bash
QUEUE_DRIVER=sqs
QUEUE_CONNECTION=sqs
SQS_KEY=<aws_access_key_id>
SQS_SECRET=<aws_secret_access_key>
SQS_QUEUE=<queue name>
SQS_REGION=ap-southeast-2
SQS_PREFIX=https://sqs.ap-southeast-2.amazonaws.com/<aws_account_id>
```

### Install dependencies:
```bash
composer install
```

### Database migration and seed:
```bash
php artisan migrate
```

### Running locally (in personal computer):
```bash
php -S localhost:8000 -t public
```

## Dockerize
By default, the scripts required to dockerize this project are `.docker` and `docker-compose.yml`. The script is provided in this repository. Here's how to build and run the docker containers.
### For first time only !
- `git clone https://github.com/refactorian/laravel-docker.git`
- `cd laravel-docker`
- `docker compose up -d --build`
- `docker compose exec php bash`
- `composer setup`

### From the second time onwards
- `docker compose up -d`

### Laravel App
- URL: http://localhost

### Mailpit
- URL: http://localhost:8025

### phpMyAdmin
- URL: http://localhost:8080
- Server: `db`
- Username: `refactorian`
- Password: `refactorian`
- Database: `refactorian`

### Adminer
- URL: http://localhost:9090
- Server: `db`
- Username: `refactorian`
- Password: `refactorian`
- Database: `refactorian`

### Basic docker compose commands
- Build or rebuild services
    - `docker compose build`
- Create and start containers
    - `docker compose up -d`
- Stop and remove containers, networks
    - `docker compose down`
- Stop all services
    - `docker compose stop`
- Restart service containers
    - `docker compose restart`
- Run a command inside a container
    - `docker compose exec [container] [command]`

### Useful Laravel Commands
- Display basic information about your application
    - `php artisan about`
- Remove the configuration cache file
    - `php artisan config:clear`
- Flush the application cache
    - `php artisan cache:clear`
- Clear all cached events and listeners
    - `php artisan event:clear`
- Delete all of the jobs from the specified queue
    - `php artisan queue:clear`
- Remove the route cache file
    - `php artisan route:clear`
- Clear all compiled view files
    - `php artisan view:clear`
- Remove the compiled class file
    - `php artisan clear-compiled`
- Remove the cached bootstrap files
    - `php artisan optimize:clear`
- Delete the cached mutex files created by scheduler
    - `php artisan schedule:clear-cache`
- Flush expired password reset tokens
    - `php artisan auth:clear-resets`

### Laravel Pint (Code Style Fixer | PHP-CS-Fixer)
- Format all files
    - `vendor/bin/pint`
- Format specific files or directories
    - `vendor/bin/pint app/Models`
    - `vendor/bin/pint app/Models/User.php`
- Format all files with preview
    - `vendor/bin/pint -v`
- Format uncommitted changes according to Git
    - `vendor/bin/pint --dirty`
- Inspect all files
  - `vendor/bin/pint --test`
 
## Notes
Feel free to edit and adjust this docker configuration to fit with your server environment. Special thanks to https://github.com/refactorian/laravel-docker for good docker setup inspiration.


## License and Copyright

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).