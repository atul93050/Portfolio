<?php
const DB_HOST = 'localhost';
const DB_USER = 'u510762903_AtV';
const DB_PASS = 'AtV@tRVbyEv4R^UntyM9';
const DB_NAME = 'u510762903_AtV';

function connection()
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
