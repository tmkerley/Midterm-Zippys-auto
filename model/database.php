<?php
    $dsn = 'mysql:host=gzp0u91edhmxszwf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=w2rm76kscxad3b8d;';
    $username = 'tjfiklp35p367iqd';
    $password = 'ekk7if6nfig7gkx2';
    
    try {
        $db = new PDO($dsn, $username, $password);
        echo "Connected to successfully!";
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/db_error.php');
        exit();
    }
?>