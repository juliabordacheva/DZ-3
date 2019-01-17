<?php 




$resource = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'opendata.csv', 'r');

if (!$resource) {
	echo 'Cant read file';
	exit;
}
	$row = 0;
    while ($data = fgetcsv($resource, 0, ';')) {
        $row++;
        echo "Row #" . $row . " contains " . count($data) . " fields" . PHP_EOL;
        $strData = print_r($data, true);
        $encodedStrData = iconv('CP1251', 'UTF-8', $strData);
        print_r($encodedStrData);
        echo PHP_EOL;
    }



 ?>