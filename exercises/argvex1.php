<?php

	if ($argc > 1 && $argc < 4) {
		foreach ($argv as $argument) {
			if (is_numeric($argument)) {
				$onlyNumbers[] = $argument;
			}
		}

		$min = min($onlyNumbers);
		$max = max($onlyNumbers);

		echo "min is $min - max is $max\n";
	}

	else {
		echo "You've either set too many, or too little arguments.\n";
	}

?>