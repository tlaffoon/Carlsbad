<?php


fwrite(STDOUT, "Please enter starting number: ");
$startNum = trim(fgets(STDIN));

fwrite(STDOUT, "Please enter ending number: ");
$endNum = trim(fgets(STDIN));

// var_dump($startNum);
// var_dump($endNum);

for ($i=$startNum; $i <= $endNum; $i++) { 
	echo "$i\n";
}

?>