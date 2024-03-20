<?php
    $dsn = 'gzp0u91edhmxszwf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'tjfiklp35p367iqd';
    $password = 'ekk7if6nfig7gkx2';

    // $dsn = 'mysql:host=localhost; dbname=ZippyAuto';
    // $username = 'theadmin';
    // $password = 'pa55word';
    
    try {
        $db = new PDO($dsn, $username, $password);
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>