<?php

$resource = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'opendata.csv', 'r'
);
if (!$resource) {
echo 'Cant read file';
exit;
}

$row = 0;
while ($data = fgetcsv($resource, 0, ',')) {
    $row++;
    echo "Row #" . $row . " contains " . count($data) . " fields" . PHP_EOL;
    print_r($data);
    echo PHP_EOL;


}





 ?>