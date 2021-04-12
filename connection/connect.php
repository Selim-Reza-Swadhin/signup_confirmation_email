<?php
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=signup_confirm", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'connection is created!';
    return $db;
} catch (PDOException $e) {
    echo "Sorry Error: " . $e->getMessage();
}
