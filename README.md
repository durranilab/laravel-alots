# laravel-alots

A simple alots sms gateway implementation for Laravel 5.*|6.*|7.* 

For more information please visit:- https://www.alots.in/

[![Latest Stable Version](https://poser.pugx.org/bhavinjr/laravel-alots/v/stable)](https://packagist.org/packages/bhavinjr/laravel-alots)
[![Total Downloads](https://poser.pugx.org/bhavinjr/laravel-alots/downloads)](https://packagist.org/packages/bhavinjr/laravel-alots)
[![License](https://poser.pugx.org/bhavinjr/laravel-alots/license)](https://packagist.org/packages/bhavinjr/laravel-alots)

## Installation

First, you'll need to install the package via Composer:

```shell
$ composer require bhavinjr/laravel-alots
```

If you are don't use using Laravel 5.5.* Then, update `config/app.php` by adding an entry for the service provider.


```php
'providers' => [
    // ...
    Bhavinjr\Alots\Providers\AlotsServiceProvider::class,
];

'aliases' => [
    //...
    "Alots": "Bhavinjr\Alots\Facades\Alots",
];
```

In command line paste this command:
```shell
php artisan config:cache
```

In command line again, publish the default configuration file:
```shell
php artisan vendor:publish --provider="Bhavinjr\Alots\Providers\AlotsServiceProvider"
```

In command line paste this command:
```shell
php artisan migrate
```


## Configuration

Configuration was designed to be as flexible.
global configuration can be set in the `config/alots.php` file.


```<?php
return [
    'table_names' => [
        'messages'    => 'alots_messages',
    ],
];
```

after update `config/alots.php` file.
```shell
php artisan config:cache
```

## Usage

The package gives you the following methods to use:

Send sms is really simple 

you need specify mobile_number and sms_text respectively all parameter are compulsory

### Alots::simpleSms()

```php
Alots::simpleSms('9876543210', 'test sms');
```

### Alots::unicodeSms()

Send unicode sms

```php
Alots::unicodeSms('9876543210', 'test sms');
```

### Alots::scheduleSms()

You can schedule sms

```php
Alots::scheduleSms('9876543210', 'test sms', '01012020-1010AM');
```

### Alots::groupSms()

Send sms using group

you need specify group_id and sms_text respectively all parameter are compulsory

```php
Alots::groupSms('123', 'test sms');
```

### Alots::getDeliveryReport()

To check sms delivery status.

you need specify message_id

```php
Alots::getDeliveryReport('123');
```


### Alots::checkCredit()

To check available sms/credit limit.

```php
Alots::checkCredit();
```