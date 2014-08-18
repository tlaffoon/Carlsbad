<?php

function runGame() {
	// Set random number for game instance
	$number = rand(1, 100);
	var_dump($number);

	fwrite(STDOUT, "I'm thinking of a number between 1 - 100\n");
	fwrite(STDOUT, "Think you can guess it?\n");

	do {
		fwrite(STDOUT, "Please enter your guess: ");
		$guess = trim(fgets(STDIN));

		if ($guess < $number) {
			fwrite(STDOUT, "Higher\n");
		}

		elseif ($guess > $number) {
			fwrite(STDOUT, "Lower\n");
		}

		else {
			fwrite(STDOUT, 'You are so cool!');
			die();
		}

	} while ($guess != $answer);
}

fwrite(STDOUT, 'What is your first name? ');
$name = trim(fgets(STDIN));

// Output the user's name
fwrite(STDOUT, "Hello {$name}!\n");

fwrite(STDOUT, "Would you like to play a game? ");
$answer = trim(fgets(STDIN));

if ($answer == 'yes' || $answer == 'y') {
	fwrite(STDOUT, "Let's play!\n");
	runGame();
}

else {
	fwrite(STDOUT, "Okie doke.  Maybe later, alligator.\n");
}




?>