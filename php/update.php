<?php

    include 'db_connect.php';

    if(isset($_GET['id']) && !empty($_GET['id'])) {
    
        $userTel = [];
    
        $stmt = $pdo->prepare('SELECT id, name FROM users WHERE id = :id');
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $user = $stmt->fetch();
    
        $stmt = $pdo->prepare('SELECT number FROM phones WHERE user_id = :id');
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $phones = [];
        while ($row = $stmt->fetch())
        {
            $phones[] = $row;
        }
       
    ?>
        
    <span class="close">Close</span>
    <form name="form" id="update_form">
        <h4>Обновить пользователя <?= $user['name']; ?></h4>
    
        <?php foreach ($phones as $key => $phone):?>
            <div class="row">
                <input type="text" name='phones[<?= $key; ?>]' value="<?= $phone['number']; ?>">
                <span class="delete_phone">Удалить</span>
            </div>
        <?php endforeach;?>
        
        <input type="hidden" name="user", value="<?= $user['id']; ?>">
        <input type="submit" id='update' name='update' value="Сохранить">
        <button id="addNumber">Добавить номер</button>
    </form>

<?php
    }

if(isset($_POST['update']) && $_POST['update'] == true) {

    $stmt = $pdo->prepare('DELETE FROM phones WHERE user_id =  :user_id');

    $stmt->bindValue(':user_id', $_POST['user']);
    $stmt->execute();

    if(isset($_POST['phones'])){
        $stmt1 = $pdo->prepare('INSERT INTO phones(number, user_id) VALUES (:number, :id)');

        foreach ($_POST['phones'] as $phone){
            if($phone != ''){
                $stmt1->bindValue(':number', $phone);
                $stmt1->bindValue(':id',  $_POST['user']);
                $stmt1->execute();
            }
        }

    }
}
?>