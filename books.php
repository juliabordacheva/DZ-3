<?php

$filecontent = file_get_contents('https://www.googleapis.com/books/v1/volumes?q={query}');
$result = json_decode($filecontent, true);
print_r($result);

$resource = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'out.csv', 'w');
	if (!$resource) {
	echo 'Cant read file';
	exit;
}
?>