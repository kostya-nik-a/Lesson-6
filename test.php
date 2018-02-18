<?php
$test_number = ($_GET['test_number']);
$testDir = "./tests/";
$tests_list = scandir($testDir);
if ($test_number < 1 || !ctype_digit($test_number) || $test_number > count($tests_list) - 2) {
   echo "Такого теста не существует. Выберите существующий номер теста на <a href='list.php'> предыдущей странице </a>";
   exit();
}

$test = $tests_list[$test_number+1];
$contents = file_get_contents(__DIR__ . $testDir.DIRECTORY_SEPARATOR.$test);
$tests = json_decode($contents, true);
<<<<<<< HEAD
=======
echo "<pre>";
>>>>>>> 2354907cc57503295b582a58e9d86ba2f2007d5e

$trueAnswer = 0;
$falseAnswer = 0;
$noAnswer = 0;
$i = 0;
$userAnswers = [];

foreach ($tests as $userAnswers) {
    if (empty($_POST)) {   
    } 
    elseif (empty($_POST["answerUser$i"])) {
            $noAnswer++;            
    } elseif ($_POST["answerUser$i"] == $userAnswers["correct-answer"]) {
            $trueAnswer++;            
    } else {
            $falseAnswer++;            
    }
            $i++; 
}
<<<<<<< HEAD

=======
>>>>>>> 2354907cc57503295b582a58e9d86ba2f2007d5e

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <body>
        <h1>Вы проходите тест: <?php echo '<i style="color: blue;">'.$tests['title'].'</i>' ?> </h1>
        <form action="" method="POST">
            <div style="text-align: left;">
                <?php 
                    $i = 0;
                    foreach ($tests as $userAnswers) {
                ?>
                <fieldset>
                    <legend>
                        <h2><?php echo $userAnswers['question'] ?></h2>
                    </legend>

                <label>
                    <input name="<?php echo 'answerUser'.$i ?>" type="radio" value="<?php echo $userAnswers['answer1']; ?>"><?php echo $userAnswers['answer1']; ?>
                    <input name="<?php echo 'answerUser'.$i ?>" type="radio" value="<?php echo $userAnswers['answer2']; ?>"><?php echo $userAnswers['answer2']; ?>
                    <input name="<?php echo 'answerUser'.$i ?>" type="radio" value="<?php echo $userAnswers['answer3']; ?>"><?php echo $userAnswers['answer3']; ?>
                    <input name="<?php echo 'answerUser'.$i ?>" type="radio" value="<?php echo $userAnswers['answer4']; ?>"><?php echo $userAnswers['answer4']; ?>
                </label>
                </fieldset>
                <?php
                $i++;
                }
                ?>
                <button type="submit">Результат</button>   

                  <?php 
                if (!empty($_POST)) {
                echo  
                "<p> Количество правильных ответов: " . $trueAnswer . "</p>" .
                "<p> Количество НЕ правильных ответов: " . $falseAnswer . "</p>" .
                "<p> Нет ответов на " .$noAnswer. " вопросов </p>";
                }  
                ?>
                                       
            </div>
        </form>
    </body>
</html>