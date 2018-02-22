<!doctype html>
<html lang="ru">
<head>
    <title>Список загруженных тестов</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: auto;
        }
        td {
            border: 1px solid black;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <h1>Список тестов</h1>
    <table>
<?php
    $files = array_diff(scandir('tests/' ), Array( ".", ".." ));
    $counter = 1;

if (!empty($files)) {
    foreach ($files as $file) {
        if (end(explode('.', $file)) === 'json') {
            $test = pathinfo($file)['filename'];
            echo '<tr><td>' . $counter . '</td><td><a href="test.php?name=' . $test . '">' . $test . '</a></td></tr>';
            $counter++;
        }
    }
} else {
    echo '<tr><td>Ни один файл не загружен!</td></tr>';
}
?>
    </table>
</body>
</html>