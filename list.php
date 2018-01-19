<?php
$file_list = glob('tests/*.json');
$number = 0;
?>
<html>
<head>
    <title>Список тестов</title>
</head>
<body>
<?php
foreach ($file_list as $key => $file)
{
    $number++;
    $file_test = file_get_contents($file);
    $decode_file = json_decode($file_test, true);
    echo "<a href=\"test.php?test=$key\">Тест №: $number</a><br>";
}
?>
<p><a href="admin.php">Загрузка теста</a></p>
</body>
</html>