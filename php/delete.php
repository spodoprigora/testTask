<?php

    include 'db_connect.php';

    if(isset($_POST['id']) && !empty($_POST['id'])){
    
        $stmt = $pdo->prepare('DELETE FROM phones WHERE user_id =  :user_id');
    
        $stmt->bindValue(':user_id', $_POST['id']);
        $stmt->execute();
    
        $stmt = $pdo->prepare('DELETE FROM users WHERE id =  :id');
    
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
    
        echo 'Данные удалены';
    
    }