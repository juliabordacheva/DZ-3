<?php

if (empty($argv) || count($argv) < 2) {

    exit('Error. Arguments undefined. Print --today or price and goods' . PHP_EOL);
}

$file = 'money2.csv';
$today = date('d.m.Y');

if ($argv[1] == '--today') {
    $msgNoExpensesToday = 'There are no expenses today' . PHP_EOL;
    if (file_exists($file)) {
        $resource = fopen($file, 'r');


        $todayExpensesValue = 0;

        while ($data = fgetcsv($resource)) {

            if ($data[0] == $today) {
                $todayExpensesValue += $data[1];
            }
        }

        if ($todayExpensesValue === 0) {
            echo $msgNoExpensesToday . 1;
        } else {
            echo "Debt for day ($today): $todayExpensesValue руб." . PHP_EOL;
        }

        fclose($resource);
        //}
    } else {
        exit($msgNoExpensesToday);
    }
} elseif(count($argv) > 2) {

    $resource = fopen($file, 'a+');

    $msg = '';
    $cost = (int) $argv[1];
    $nameArr = array_slice($argv, 2);

    $name = implode(' ', $nameArr);
    $arrForWriteToFile = array($today, $cost, $name);
    fputcsv($resource, $arrForWriteToFile);
    fclose($resource);

    echo "Added expense: $today, $cost руб., $name" . PHP_EOL;
} else {
    exit('Error. Arguments undefined. Print --today or price and goods' . PHP_EOL);
}
?>
