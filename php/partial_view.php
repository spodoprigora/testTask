<?php
    include 'db_connect.php';

    $users =[];

    $stmt = $pdo->query('SELECT id, name FROM users ');
    while ($row = $stmt->fetch())
    {
        $users[$row['id']][$row['name']] =[];
        $stmt1 = $pdo->prepare('SELECT id, number FROM phones WHERE user_id = ?');
        $stmt1->execute([$row['id']]);
        foreach ($stmt1 as $row1)
        {
            $users[$row['id']][$row['name']][$row1['id']] = $row1['number'];

        }
    }
?>
<ul>
    <?php foreach ($users as $user_id => $user):?>
        <li data_id ="<?= $user_id; ?>" class="user">
            <?= key($user); ?> 
            <span class="update">Редактировать</span> 
            <span class="delete">Удалить</span>
            <ul>
                <?php foreach ($user[key($user)] as $id => $phone): ?>
                    <li data-id="<?= $id; ?>" class="phone"><?= $phone; ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach;?>
</ul>