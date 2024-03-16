<?php
    $dsn = 'mysql:host=localhost; dbname=ZippyAuto';
    $username = 'theadmin';
    $password = 'pa55word';
    
    try {
        $db = new PDO($dsn, $username, $password);
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>