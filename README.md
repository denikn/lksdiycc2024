# LKS Cloud Computing DIY 2024

Repository ini merupakan aplikasi berbasis web yang digunakan untuk seleksi LKS DIY 2024 bidang Cloud Computing.

```
‌‌         ∩∩   ♡      i will always be
       (  . .̫ . )     here for supporting
 〃 ∩    ◜◝U-U◜◝       and loving you ..
 ⊂   ⌒ (   。・ ㉨ ・  )
    ヽ  _ つ＿/￣￣￣/
　 　     ＼/＿＿＿/
```

## Requirements
 - [v8.1+](https://www.php.net/)
 - [Composer v2](https://yarnpkg.com/en/docs/install)

## Getting started
### Clone the repo:
```bash
git clone --depth 1 https://github.com/denikn/lksdiycc2023
cd lksdiycc2023
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
By default, the scripts required to dockerize this project are `Dockerfile` and `docker-compose.yml`. The script is provided in this repository. Here's how to build and run the docker containers.
```
docker compose build
docker compose up -d
```

## Notes
Feel free to edit and adjust this docker configuration to fit with your server environment


## License and Copyright

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).