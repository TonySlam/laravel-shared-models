
## About slam-micro/sharedmodels

This is a simple light-weight package for to get other Eloquent
models in other laravel package by simply connecting to the extended database.
This package is created to retrieve data from other micro-service instance.

## Get Started With slam-micro/sharedmodels 

##Installation

Recommended php version 8.2.1

Git Repository [slam-micro/sharedmodels](https://github.com/TonySlam/laravel-shared-models) 

Access the package [Packagist slam-micro/sharedmodels](https://packagist.org/packages/slam-micro/sharedmodels) 
````bash
$ composer require slam-micro/sharedmodels
````

##Usage

````
$host = 'my-custom-host';
$port = 'my-custom-port';
$database = 'my-custom-database';
$username = 'my-custom-username';
$password = 'my-custom-password';

// replace with the name of the table you want to access
$table = 'table-name'; 

// replace with the fully qualified name of your model class
$modelClass = 'App\\Models\\ModelName'; 

$databaseConnection = new DatabaseConnection($host, $port, $database, $username, $password);
$models = $databaseConnection->getModels($table, $modelClass);

return $models;
````
Other useful of usage 
````
// Get all records
$models->all();

// Get by ID
$models->find(1);

//delete record by ID
$var = $models->where('id', 1)->first();
return $list->delete();

//Update record by ID
$var->update(
    [
      'name' => "John Doe"
     ]
);
````


## Author
Email: thabo.tony@gmail.com
