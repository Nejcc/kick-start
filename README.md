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
php artisan ui:auth  or  use my package for tailwind before continue 
```

```
composer require nejcc/kickStart
```

#### 3. Run command 

##### This command will modify and change following files: 

*   app
    *   http
        *   middlewares
            *   Localization.php [add]
    *   Models
        *   Role.php [add]
    *   User.php [overrid]
    *   Providers
        *   AuthServicePeovider.php [overrid]
*   database
    *   migration
        *   user [overided]
        *   roles [add]
        *   roles_user [add]
        *   foren_roles_user [add]
    *   seeds
        *   DatabaseSeeder.php [override]
        *   RoleTableSeeder.php [add]
        *   UserTableSeeder.php [add]
    * database.sqlite
* routes
    web.php [append]
*   .env [override]


NOTICE!:  Before running this command make sure you have saved your work!
```
php artisan ui kickstart
```


#### 4. serve

```
php artisan serve
```
or
```
php artisan serve --port 8888
```
