 <?php
return [
    'db' => [
        'name' => 'dwes',
        'username' => "dwes",
        'password' => "abc123.",
        'connection' => 'mysql:host=localhost',
        'dsn' => "mysql:host=localhost;dbname=dwes",
        'canal' => "Tienda",
        'rutaLogs' => "config/logs/tienda.log",
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];
