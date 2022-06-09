# just-a-query-class

Simply a query class for mysql databases developed in php.

## Description

just-a-query-class is a php project created with the intention of facilitating the execution of database queries using a specific query engine. The purpose of this "class" is that you can send queries and parameters to the query class and get, process and/or format the results from the same query class, allowing dynamic data handling and not requiring many instances.

## Getting Started

### Dependencies

- PHP >= 7.x

### Installing

- Getting started with this class is easy. You just need to clone the repository and add the files from the "src" folder to a separate directory in your php project. After including the files in your project folder, you simply need to include the query file in your php code using a require_once with the address where you put the files.

```php
    require_once("path/to/query/file");
```

### Executing program

- To use the "Query" class you can do it as shown below...

```php
//Include the query file
require_once 'Query.php';

//prepare the query string and an associative array with the corresponding parameters
$query_str = "SELECT * FROM posts WHERE post_id = :id";
$params = array(
    "id" => 1,
);

//Create an instance of the "Query" class with the string and parameters
$query = new Query($query_str, $params);

//Execute the created query and store the result
$result = $query->execute(true);

```

- The array containing the parameters can be null, in case no query parameters are being used. If this value is null, it will be ignored.

```php

$query_str = "SELECT * FROM posts";

$query = new Query($query_str);

```

- The "execute" function receives two parameters that default to false. "fetch_result" and "fetch_object", this allows to determine if the returned result will be an array and if this array will contain instantiated objects. The objects will have properties whose name corresponds to the name of the table columns

## Authors

Contributors names and contact info

ex. Zaserafin  
ex. [zaserafin.com](https://zaserafin.com/)

## Version History

- 0.1
  - Initial Release

## License

This project is licensed under the [MIT] License - see the LICENSE.md file for details
