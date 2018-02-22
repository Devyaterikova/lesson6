<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тест</title>
    <style>
        fieldset {
            width: 40%;
            margin: 0 auto 20px;
        }
        input[type="radio"] {
            margin-left: 15px;
        }
        input[type="submit"] {
            margin-left: 30%;
        }
        p {
            margin-left: 30%;
        }
    </style>
</head>
<body>
<form method="post">
    <?php
    if (!empty($_GET["name"])) {
        $test = json_decode(file_get_contents('./tests/' . $_GET["name"] . '.json'));
        foreach($test->questions as $question) {
            echo '<fieldset>';
            echo '<h3>' . $question->question . '</h3>';
            foreach($question->choices as $key => $choice) {
                echo '<label><input type="radio" value="' . $key . '" name="' . $question->id . '">'. $choice . '</label>';
            }
            echo '</fieldset>';
        }
    }
    ?>
    <input type="submit" value="Принять ответы">
</form>
</body>
</html>
<?php
if ($_POST) {
    $counter = 0;

    foreach($_POST as $number => $answer) {
        foreach($test->questions as $question) {
            if ($answer === $question->correct && $number === $question->id) {
                $counter++;
            }
        }
    }
    echo '<p>Количество правильных ответов: ' . $counter . '</p>';
}
?>