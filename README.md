# online Buses 
>In development phase
## Simple online Buses system for users
The idea of this application to manage routes and times for Buses :
- Users can register in application
- User can search for Routes
- Users can Book any Routes and pending the request until the admin active these requests by receipt number
- Admin can active the request by input the receipt number 
- Add new Buses Route By Admin]

## Requirements:
1. Composer version 2.1.14 or higher
2. PHP 7.4.21 or higher
3. Xampp 7.4.21-0 or higher

## Installation :

```
cp .env.example .env
```
```
composer install
```
```
php artisan key:generate
```
```
php artisan migrate
```
```
php artisan cache:clear
```
```
php artisan config:clear
```
## Usage:
- go to project directory atind run:
```
php artisan serve
```
- go to
```
http://127.0.0.1:8000/
http://127.0.0.1:8000/admin/login
```
- For trial
```
https://onlinebusesss.000webhostapp.com/public/login
https://onlinebusesss.000webhostapp.com/public/admin/login
```
-Admin credentials 
```
email:admin@admin.com
password:12345678
```


