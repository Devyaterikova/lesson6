<!doctype html>
<html lang="ru">
<head>
    <title>Загрузка тестов</title>
    <style>
        form {
            text-align: left;
            width: 30%;
            margin: 10% auto;
        }
        input {
            display: block;
            margin-bottom: 10px;
        }
        a {
            margin-left: 35%;
        }
    </style>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
    <p>Загрузите тест в формате json:</p>
    <input type="file" name="testFile">
    <input type="submit" value="Загрузить тест" name="submit">
</form>

<a href="list.php">Список тестов</a><br>


<?php
if (isset($_FILES['testFile'])) {
    if (is_uploaded_file($_FILES['testFile']['tmp_name'])) {
        $uploaddir = 'tests/';
        $uploadfile = $uploaddir . basename($_FILES['testFile']['name']);

        if (end(explode('.', $_FILES['testFile']['name'])) !== 'json') {
            echo 'Принимаются файлы только в формате json!';
            exit;
        }

        if ($_FILES['testFile']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['testFile']['tmp_name'], $uploadfile)) {
            echo "<h3>Файл успешно загружен на сервер</h3>";
        } else {
            echo "<h3>Ошибка! Не удалось загрузить файл</h3>";
            exit;
        }
    }
}
?>
</body>
</html>

