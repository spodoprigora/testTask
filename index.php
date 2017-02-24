<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

    <div id = "form">
        <h4>Добавить пользователя</h4>
        <form>
            <label for="name">Имя</label>
            <input type="text" id="name">

            <label for="phone">Телефон</label>
            <input type="text" id="phone">

            <input id='submit' type="submit" value="Добавить">
        </form>
     </div>

    <div id="main">
        <?php include 'php/partial_view.php'; ?>        
    </div>
    
    <div id="modal"></div>   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>