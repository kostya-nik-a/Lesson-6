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
                foreach ($tests as $tkey => $test) {
                ?>    
                <h2><?php echo $test['question'] ?></h2>                               
                <label>
                    <input  name="answer1" type="radio" value="<?php echo $test['answers'][0]; ?>"> 
                    <?php echo $test['answers'][0] ?>
                </label>
                <br>
                <label>
                    <input  name="answer2" type="radio" value="<?php echo $test['answers'][1]; ?>"> 
                    <?php echo $test['answers'][1]; ?>
                </label>
                <br>
                <label>
                    <input  name="answer3" type="radio" value="<?php echo $test['answers'][2]; ?>"> 
                    <?php echo $test['answers'][2]; ?>
                </label>
                <label>
                    <input  name="answer4" type="radio" value="<?php echo $test['answers'][3]; ?>"> 
                    <?php echo $test['answers'][3]; ?>
                </label>


                <br>
                <?php                   
                }
                ?>
                <label> Введите свое имя и фамилию <input  name="user_name" type="text" value=""></label><br> 
                <button type="submit">Результат</button>   
                                       
            </div>
        </form>
    </body>
</html>
