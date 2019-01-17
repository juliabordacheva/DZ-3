<?php 

$resource = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'money.csv', 'a');
	if (!$resource) {
	echo 'Cant read file';
	exit;
}


    
  fputcsv($resource, $argv, '|');
  $row = 0;
    while ($data = fgetcsv($resource, 0, ';')) {
        $row++;
        echo "Row #" . $row . " contains " . count($data) . " fields" . PHP_EOL;
        $strData = print_r($data, true);
        $encodedStrData = iconv('CP1251', 'UTF-8', $strData);
        print_r($encodeStrData);
        echo PHP_EOL;
    }

if ($argv = 'money.php') {
    echo 'Error. Arguments undefined. Print --today or price and goods ';
}

 

if ($argv = ['--today']) {
	fclose($resource);
}

$resource = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'money.csv', 'r');
if (!$resource) {
	echo 'Cant read file';
	exit;
}
$csv_list = [];
while (($data = fgetcsv($resource, 0, "|")) !== FALSE) {
    $csv_list[] = $data;
    /*var_dump($csv_list);*/
}

$today = date('Y-m-d');
$total_pay = 0;

foreach ($csv_list as $key) {        
    if ($key[0] === $today){
        $total_pay += $key[2];
    }    
}
echo 'Debt for day' . $total_pay;
 ?>


