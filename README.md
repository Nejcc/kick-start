# nejcc/kick-start prepare for laravel

## Installation

#### 1. Laravel last version
```
composer create-project --prefer-dist laravel/laravel blog
```
#### 2. Laravel ui scaffolding
```
composer require laravel/ui
```
```
composer require nejcc/kickStart
```

#### 3. Tailwind prepare (when you run this command will replace your UI folder!!)
##### For Tailwind Only
```
php artisan ui kickstart
```
#### 4. Change .env 

```
DB_CONNECTION=sqlite
```

#### 5. serve

```
php artisan serve
```
or
```
php artisan serve --port 8888
```
