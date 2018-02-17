<?php
$test_number = ($_GET['test_number']);
$testDir = "./tests/";
$tests_list = scandir($testDir);
$numFiles=count(scandir($testDir))-1;
if ($test_number < 1 || !ctype_digit($test_number) || $test_number > count($tests_list) - 2) {
   echo "Такого теста не существует. Выберите существующий номер теста. <a href='admin.php'> Назад </a>";
   exit();
}
$test = $tests_list[$test_number+1];
$contents = file_get_contents(__DIR__ . $testDir.DIRECTORY_SEPARATOR.$test);
$tests = json_decode($contents, true);
echo "<pre>";
print_r($tests);

$userAnswers = [];
$trueAnswers = [];
$trueCount = 0;
$falseCount = 0;
$userAnswers = $_POST['answer$i'];

foreach ($tests as $tkey => $test) {
    for ($i = 0; $i < count($test['answers']); $i++) {
        $trueAnswer[] = $test['correct-answer'];
        $userAnswers [] = $_POST['answer$i'];
    }
}
print_r($trueAnswer);
print_r($userAnswers);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <body>
        <h1>Вы проходите тест: <?php echo '<i><span style="color: blue;">'.$tests['title'].'</span></i>' ?> </h1>
        <form action="" method="POST">
            <div>
                <?php 
                $i = 0;
                foreach ($tests as $tkey => $test) {
                ?>    
                <h2><?php echo $test['question']; ?></h2>                               
                <?php for ($i = 0; $i < count($test['answers']); $i++) { ?>
                <input name="<?php 'answer'.$i ?>" type="radio" value="<?php echo $test['answers'][$i]; ?>"> 
                <?php echo $test['answers'][$i] ?><br>
                <?php  
                      }                 
                }
                ?>

                <button type="submit">Результат</button>   
                                       
            </div>
        </form>
    </body>
</html>
