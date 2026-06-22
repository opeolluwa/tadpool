<?php

$database_name = $_ENV['DATABASE_NAME'];
$database_host = $_ENV['DATABASE_HOST'];
$database_username = $_ENV['DATABASE_USERNAME'];
$database_password = $_ENV['DATABASE_PASSWORD'];
$database_port = $_ENV['DATABASE_PORT'];

$database_dsn = "mysql:host=$database_host;dbname=$database_name;port=$database_port";

return [
    'class' => \yii\db\Connection::class,
    'dsn' => $database_dsn,
    'username' => $database_username,
    'password' => $database_password,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];