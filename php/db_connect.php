<?php

    define('HOST', 'localhost');
    define('DBNAME', 'test');
    define('USER', 'root');
    define('PASSWORD', 159753);

    $dsn = "mysql:host=".HOST.";dbname=" .DBNAME;

    $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

    $pdo = new PDO($dsn, USER, PASSWORD, $opt);