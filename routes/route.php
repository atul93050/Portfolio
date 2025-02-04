<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
    case '/home':
        require '/index.php';
        break;
    case '/Khata_Book':
        require 'Khata_Book/index.php';
        break;

}
?>
