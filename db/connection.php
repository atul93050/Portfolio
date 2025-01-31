<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'u510762903_AtV');
define('DB_PASS', 'AtV@tRVbyEv4R^UntyM9');
define('DB_NAME', 'u510762903_AtV');

function connection()
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $conn;
}

function close_connection($conn)
{
    $conn = null;
}
