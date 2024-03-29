## Taskr

Taskr is a simple task management application using Laravel

## Installation
Clone the repository
```bash
git clone https://github.com/SlimGee/taskr.git
```
Or extract the zip file

```bash
tar -xvf taskr.zip
```
Cd into the project directory and install composer dependencies

```bash
cd taskr
```

Composer
```bash
composer install --prefer-dist
```

Install NPM dependencies

```bash
yarn install
```


Create a copy of your .env file and add your database credentials
```bash
cp .env.example .env
```
Migrate the database and start the artisan server
```bash
php artisan serve
```
Create an account and start adding tasks!

You can also use the following command to seed the database with dummy data
```bash
php artisan db:seed TaskSeeder
```

Don't forget to run the following command to compile your assets
```bash
yarn dev
```
or 
```bash
yarn build
```

