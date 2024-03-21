<?php
    $dsn = 'mysql:host=//tjfiklp35p367iqd:ekk7if6nfig7gkx2@gzp0u91edhmxszwf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306;dbname=w2rm76kscxad3b8d;';
    $username = 'tjfiklp35p367iqd';
    $password = 'ekk7if6nfig7gkx2';
    
    try {
        $db = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/db_error.php');
        exit();
    }
?>
