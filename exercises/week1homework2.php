<?php 
// 2) hw_wk1_p2.php
// Create an array that represents a quiz. In the top level array, the keys should be the question numbers and the values should be an associative array. The associative array should have the following keys: 'question', 'answers', 'correct_answer'. The 'question' is a string. The 'answers' is as associative array with alphabetical keys and string values. The 'correct_answer' is a string representing the letter of the correct answer. Make sure your quiz has at least 3 questions.

$quiz = [
	'1' => ['question' => 'What color is the sky?',
			'answers' => [
						'A' => 'blue', 
						'B' => 'green', 
						'C' => 'red', 
						'D' => 'sunshine'
			], 
			'correct_answer' => 'A'
			],
	'2' => ['question' => 'What noise does a duck make?',
			'answers' => [
						'A' => 'squeak', 
						'B' => 'quack', 
						'C' => 'rofl', 
						'D' => 'ruff'
			], 
			'correct_answer' => 'B'
			],
	'3' => ['question' => 'How many Phil\'s does it take to screw in a lightbulb?',
			'answers' => [
						'A' => '1', 
						'B' => '2', 
						'C' => '3', 
						'D' => '0'
			], 
			'correct_answer' => 'A'
			],
	'4' => ['question' => 'What is the correct representation of water as chemical compound?',
			'answers' => [
						'A' => 'NaCl', 
						'B' => 'Nas', 
						'C' => 'CO2', 
						'D' => 'H20'
			], 
			'correct_answer' => 'D'
			]
];

// Loop through the array and produces the following output:

// 1. Question goes here.

//    a. Answer one.
//    b. Answer two.
//   *c. Answer three. (Star before answer denotes that it is correct)
//    d. Answer four.

// Loop through each quiz item
foreach ($quiz as $questionNum => $value) {

	// Output question # and string value of question
	echo "$questionNum. {$value['question']}\n";
	
	// Assign the correct_answer value to a variable, to use in our interior loop
	$correctAnswer = "{$value['correct_answer']}";

	// Loop through each one of the answers for each quiz item
	foreach ($value['answers'] as $answerChoice => $answerContent) {

		// Evaluate whether or not the current answerChoice is the correctAnswer from above
		if ($answerChoice == $correctAnswer) {
			echo "\t*$answerChoice)  $answerContent\n";		
		}

		// Output normally if not the correct answer
		else {
			echo "\t $answerChoice)  $answerContent\n";
		}

	} // end inner foreach loop
}  // end outer foreach loop

 ?>