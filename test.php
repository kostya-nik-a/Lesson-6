<?php
$test_number = ($_GET['test_number']);
$testDir = "./tests/";
$tests_list = scandir($testDir);
$numFiles=count(scandir($testDir))-1;
if ($test_number < 1 || !ctype_digit($test_number) || $test_number > count($tests_list) - 2) {
   echo "Такого теста не существует. Выберите существующий номер теста на <a href='list.php'> предыдущей странице </a>";
   exit();
}
$test = $tests_list[$test_number+1];
$contents = file_get_contents(__DIR__ . $testDir.DIRECTORY_SEPARATOR.$test);
$tests = json_decode($contents, true);
echo "<pre>";
//print_r($tests);
print_r($_POST);


$userAnswers = [];
$trueAnswers = [];
$trueCount = 0;
$falseCount = 0;

$i = 0;
$x = 0;
foreach ($tests as $tkey => $test) {
    $trueAnswer['answerUser'.$i] = $test['correct-answer'];
    $i++;
        foreach ($_POST as $ukey => $Answers) {
            $userAnswers['answerUser'.$x] = $Answers;
            $x++;
}
}
print_r($trueAnswer);
print_r($userAnswers);


    /*if (!in_array("answerUser$i", $userAnswers) || $userAnswers[$zkey] > count($tests['correct-answer']) ) 
    {  
        echo "Вы ответили не на все вопросы";   
        //exit(); 
    } 

    elseif ($_POST["answerUser$i"] == $userAnswers['correct-answer']) 
    {
            $trueCount++;            
    } 
    else {
            $falseCount++;            
    }
            $i++; */



/*$x=0;
if (empty($userAnswers[$x])) {
    $falseCount++;
    echo "Вы ответили не на все вопросы";
    exit();
}
    elseif ($userAnswers[$x] == $trueAnswer[$x+1]) {
        $trueCount++;
    }*/

echo "Количество правильных ответов:".$trueCount;
echo "<br>";
echo "Количество НЕ правильных ответов:".$falseCount;

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
            <div style="border: 1px solid red; text-align: left;">
                <?php 
                    $i = 0;
                    foreach ($tests as $tkey => $test) {
                ?>
                <fieldset>
                    <legend>
                        <h2><?php echo $test['question'] ?></h2>
                    </legend>
                <?php
                    for ($i = 0; $i < count($test['answers']); $i++) {
                ?>
                <label>
                    <input name="<?php echo 'answerUser'.$i ?>" type="radio" value="<?php echo $test['answers'][$i]; ?>"><?php echo $test['answers'][$i]; ?>
                </label>
                <?php
                    }
                ?>
                </fieldset>
                <?php
                }
                ?>

                <label> Введите свое имя и фамилию <input  name="user_name" type="text" value=""></label><br> 
                <button type="submit">Результат</button>   
                                       
            </div>
        </form>
    </body>
</html>
