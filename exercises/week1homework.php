<?php 

// Create an array of people. Each person should have a 'name', 'phone_number', and 'address'. The 'name' should be an associative array with keys 'first' and 'last'. Make sure there are at least 3 people in the array.

// Loop through the array and produces the following output:
// 1. First Last
//    Phone: 123-123-1234
//    Address: 123 Somewhere Dr. SA, TX 12345

// 2. First Last
//    Phone: 123-123-1234
//    Address: 123 Somewhere Dr. SA, TX 12345
// -------------------------------------------

$people = array(
	array(
		'name' => array('first' => 'James', 'last' => 'Franco'),
		'phone' => '(897) 555-5567',
		'address' => '15 RichGuy Lane, Hollywood CA 90210'),
	array(
		'name' => array('first' => 'Bruce', 'last' => 'Willis'),
		'phone' => '(897) 555-5568',
		'address' => '16 RichGuy Lane, Hollywood CA 90210'),
	array(
		'name' => array('first' => 'Sandra', 'last' => 'Bullock'),
		'phone' => '(897) 555-5569',
		'address' => '7 RichLady Lane, Hollywood CA 90210')
	); // end main array

foreach ($people as $entry => $attributes) {

	// Add 1 to the numerical index of the entry, and output
	echo ($entry + 1) . ". ";

	foreach ($attributes as $key => $value) {

		// If $value is an array, then vardump it
		if (is_array($value)) {
			echo "{$value['first']} {$value['last']}\n";	
		}

		else {
			// Echo Out Attributes of Person
			echo "   " . ucfirst($key) . ": $value\n";
		}

	} // End interior foreach loop

	echo "\n";

} // End exterior foreach loop

 ?>