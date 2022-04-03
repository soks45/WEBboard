<?php
    session_start();
    require __DIR__ . '/vendor/autoload.php';

    use Dotenv\Dotenv;

    if (file_exists(__DIR__ . "/.env")) {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

    try {
        $conn = new PDO("mysql:host=$_ENV[servername];dbname=$_ENV[database]", $_ENV['username'], $_ENV['password']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbconnect='connected';
    } catch (PDOException $e) {
        $dbconnect='failed';
    }

    console_log($dbconnect);