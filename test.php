<?php
$file_list = glob('uploads/*.json');
$num = $_GET['test'];
$num = (int)$num;
$num++;
foreach ($file_list as $key => $file)
{
    if ($key == $_GET['test'])
    {
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
    }
}

$count_answer = 0;
$count_questions = 0;
?>

<!doctype html>
<html lang="ru">
<head>
    <title>Тест <?=$num;?></title>
</head>
<body>
<?php if (!empty($_POST))
{
        foreach ($_POST as $key => $val)
        {
            $quest = str_replace("_", " ", $key);
            $exp_answer = explode("/", $quest);

            if ($val == true) {
                $count_answer++;
                $count_questions++;
                echo "<p>Ответ: " . $exp_answer[1] . "<br>" . "Вопрос: " . $exp_answer[0] . "</p>";
                echo "<p style='color: blue;'>Правильно" . "</p><br>";
            }
            else
            {
                $count_questions++;
                echo "<p>Ответ: " . $exp_answer[1] . "<br>" . "На вопрос: " . $exp_answer[0] . "</p>";
                echo "<p style='color: red;'>Не верно" . "</p><br>";
            }
        }
?>
<p><a href="list.php">Выбор теста</a></p>
<p><a href="admin.php">Загрузка теста</a></p>
<?php } else {?>
<form method="post" style="margin-top: 20px">
    <?php
    for($i=0; $i<count($decode_file); $i++) {
        $question = $decode_file[$i]['question'];
        $answers = $decode_file[$i]['answers'];
   ?>
    <fieldset style="margin: 20px 0">
        <legend><?=$question?></legend>
        <?php foreach ($answers as $key => $val) : ?>
            <label><input type="radio" name="<?=$question . "/" . $val['answer'];?>" value="<?=$val['result'];?>"> <?=$val['answer'];?></label><br>
        <?php endforeach; ?>
    </fieldset>

    <?php } ?>

    <input type="submit" value="Отправить">
</form>
    <br><br>
    <p><a href="list.php">Выбор теста</a></p>
    <p><a href="admin.php">Загрузка теста</a></p>
<?php } ?>
</body>
</html>