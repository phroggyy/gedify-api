#Contribution Guidelines

##New APIs

If you intend to make a new api, there are some rules to follow.

### Routing

1. Ensure all your routes start with the correct version, e.g `v1` (or another applicable version).

```php

$router->group(['prefix' => 'v1'])

```

Please note that the endpoint for your API is automatically generated from the folder name. So your endpoint will automatically be `apiName/api`, you just need to add the version.

### Folder structure

The project uses domain separation, through the `API` namespace. Hence, your new API should go in `API\ApiName`. All routes go in the root of your API's folder. You do not need to register it, that is done automatically.

```
app
|-- API
    |-- ApiName
        |-- Controllers
        |-- routes.php
```

###Automatic Generator

Since #cad4436, there is now a built-in artisan command to generate boilerplate for your new API. It will create the `routes.php` as well as a controller to go along with it.

####Usage

Calling

```
php artisan make:api ApiName
```

Will create:

```
app
|-- API
    |-- ApiName
        |-- Controllers
            |-- ApiNameController.php
        |-- routes.php
```

So, the command will name the controller after the name of your API, and the `routes.php` will come with an empty route group for your `v1`.