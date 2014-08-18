<?php

// Create array to hold list of todo items
$items = ['dog', 'cat', 'lizard'];

// The loop!
do {
    // Iterate through list items
        foreach ($items as $key => $item) {
            // Display each item and a newline
            echo ($key + 1) . ". {$item}" . PHP_EOL;
        }

    // Show the menu options
        echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
        // Use trim() to remove whitespace and newlines
        // Use ucfirst to uppercase any letters input
        $inputToValidate = ucfirst(trim(fgets(STDIN)));

        // Check for valid letters
        if (ctype_alnum($inputToValidate)) {
            $input = $inputToValidate;
        }

        else {
            echo "Please enter only letters." . PHP_EOL;
        }

    // Check for actionable input
        if ($input == 'N') {
            // Ask for entry
            echo 'Enter item: ';
            // Add entry to list array
            $items[] = trim(fgets(STDIN));
        } elseif ($input == 'R') {
            // Remove which item?
            echo 'Enter item number to remove: ';
            // Get array key
            $key = trim(fgets(STDIN));
            // Remove from array
            unset($items[$key - 1]);
            $items = array_values($items);
        }

    // Exit when input is (Q)uit
    } while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
