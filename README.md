<h1 align="center">QBAdminUI Laravel Broilerplate</h1>



## About QBAdminUI

QBAdminUI is a free html template.Here this is a laravel broilerplate to start with this admin dashboard.We use the Laravel Framework default authentication system.

- [HTML Demo](https://qbytesoft-com.github.io/qbadminui/).
- [Laravel Demo](https://qbadminui.qbytesoft.com).




## Installation

1. Install

``` bash
$ composer Install
$ composer require doctrine/dbal
$ composer require owen-it/laravel-auditing
$ composer require barryvdh/laravel-dompdf
$ composer require protoqol/prequel  
$ npm install
```
2. Build with NPM
``` bash
$ npm run dev
```
3. Create a .env file
4. Setup Database Name
5. Edit the config/app.php file and add the following line to register the service provider:
``` bash
$ 'providers' => [
    // ...

    OwenIt\Auditing\AuditingServiceProvider::class,

    // ...
],
```
6. php artisan vendor:publish --provider "OwenIt\Auditing\AuditingServiceProvider" --tag="config"

7. Publish the audits table migration to the database/ directory with the following command:
``` bash
$ php artisan vendor:publish --provider "OwenIt\Auditing\AuditingServiceProvider" --tag="migrations"
```
5. Migrate the tables
``` bash
$ php artisan key:generate
$ php artisan migrate
```
It's Done

#### Welcome Screen
![image Welcome](./public/qbadminui/img/welcome.png)
#### Sign UP Screen
![image Welcome](./public/qbadminui/img/signup.png)
#### Sign In Screen
![image Welcome](./public/qbadminui/img/signin.png)
#### Home Screen
![image Welcome](./public/qbadminui/img/home.png)






## License

The QBAdminUI Laravel Broilerplate is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
