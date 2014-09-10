<?php

// Define function
function humanizeList($array) {
	$last_array_item = array_pop($array);
	$string = implode(', ', $array);
	return $string . " and " . $last_array_item;
}

$physicists_string = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

// Create an array from the string above
$physicists_array = explode(', ', $physicists_string);

// Create a variable and assign the output of the humanizeList function.
$humanizedList = humanizeList($physicists_array);

// Output sentence
echo "Some of the most famous fictional theoretical physicists are $humanizedList." . PHP_EOL;

?>