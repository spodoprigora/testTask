<?php

    include 'db_connect.php';

    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['phone']) && !empty($_POST['phone'])){

        $stmt = $pdo->prepare('INSERT INTO users(name) VALUES (:name)');
    
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->execute();
    
        $id = $pdo->lastInsertId();
    
        $stmt1 = $pdo->prepare('INSERT INTO phones(number, user_id) VALUES (:number, :user_id)');
        $stmt1->bindValue(':number', $_POST['phone']);
        $stmt1->bindValue(':user_id', $id);
        $stmt1->execute();

        echo 'Данные добавленны';

    }