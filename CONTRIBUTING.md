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
        |-- Http
        |-- Domain
        |-- routes.php
```