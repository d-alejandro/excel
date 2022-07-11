## Installation

- Create .env
- docker-compose build --no-cache
- docker-compose up -d
- docker container exec -it excel_php-fpm_1 /bin/sh
- composer install
- php artisan key:generate
- php artisan migrate

## Endpoints

```
POST {url}/api/import
{
  import_file: 'filename.xlsx'
}
```
```
GET {url}/api/output?page={number}&file_name={filename.xlsx}
```
