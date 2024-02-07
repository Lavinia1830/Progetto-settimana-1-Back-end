<?php 
    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => ''
    ];

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password']
    );
    if($mysqli->connect_error) { 
        die($mysqli->connect_error); 
    } 

    $sql = 'CREATE DATABASE IF NOT EXISTS gestione_libreria;'; //Creo il mio DataBase
    if(!$mysqli->query($sql)){
        die($mysqli->connect_error);
    }

    $mysqli->query('USE gestione_libreria;'); // Seleziono il DB

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS libri ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        image VARCHAR(100) NULL,
        titolo VARCHAR(255) NOT NULL, 
        autore VARCHAR(255) NOT NULL, 
        anno_pubblicazione INT, 
        genere VARCHAR(255) NOT NULL
        
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    
?>