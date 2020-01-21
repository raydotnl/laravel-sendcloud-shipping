# Laravel Sendcloud (shipping) API
A Laravel Wrapper for the SendCloud Shipping API based on the `picqer/sendcloud-php-client` package.

### Instalation
```
composer require deniztezcan/laravel-sendcloud-shipping
```

Add a ServiceProvider to your providers array in `config/app.php`:
```php
    'providers' => [
    	//other things here

    	DenizTezcan\SendCloud\SendCloudServiceProvider::class,
    ];
```

Add the facade to the facades array:
```php
    'aliases' => [
    	//other things here

    	'SendCloud' => DenizTezcan\SendCloud\Facades\SendCloud::class,
    ];
```

Finally, publish the configuration files:
```
php artisan vendor:publish --provider="DenizTezcan\SendCloud\SendCloudServiceProvider"
```

### Configuration
Please set your API: `key` and `secret` in the `config/shipping-sendcloud.php`

### Usage
To create and get a printable label you can use the following code. The ordernumber is optional.
```php
<?php

use DenizTezcan\SendCloud\Entities\Customer;
$customer = new Customer([
	'name' => 'John Doe',
	'company_name' => 'ACME Bank',
	'street_address' => 'Main St',
	'street_address_nr' => '123',
	'city' => 'Anytown',
	'postal_code' => '12345',
	'country' => 'DE',
]);

$parcel = SendCloud::createSingleParcel($customer, 89, 'ORDERNO');
SendCloud::getPDFFromSingleParcel($parcel);
```