<?php

function validateInput($input) {

    // shorten menu choice input to one character
    $input = $input[0];

    // check for alpha type
    if (ctype_alpha($input)) {

        // change character to uppercase
        $input = strtoupper($input);

        // check for valid menu choice
        if ($input == 'N' || $input == 'R' || $input == 'Q') {
                $validatedInput = $input;
                return $validatedInput;
        } // end menu choice check

        else {
            echo "Please enter a valid menu choice." . PHP_EOL;
        }
    }

    else {
        echo "Please enter only letters." . PHP_EOL;
    }

} // end validateInput()

function saveListToFile($list, $filename = './data/list.txt') {

    $handle = fopen($filename, 'w');
    foreach ($list as $item) {
        fwrite($handle, $item);
    }
}

/* -------------------------------------------- */

// Create array to hold list of todo items
$items = array();

// The loop!
do {

    if (empty($items)) {
        echo PHP_EOL . "  No items to display." . PHP_EOL . PHP_EOL;
    }

    else {
        // Provide header
        echo "ToDo List" . PHP_EOL . "----------" . PHP_EOL;

        // Iterate through list items
        foreach ($items as $key => $item) {
            // Set displayKey offset by 1 for sanity
            $displayKey = $key + 1;

            // Output displayKey and list item
            echo " {$displayKey}. {$item}" . PHP_EOL;
        }

        // Additional new line for readability
        echo PHP_EOL;
    }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Use trim() to remove whitespace and newlines
    // Run validation function on captured input
    // Assign output of validateInput to $validatedInput
    $validatedInput = validateInput(trim(fgets(STDIN)));

    // Check for actionable input
    if ($validatedInput == 'N') {
        
        // Ask for entry
        echo 'Enter item: ';
        
        // Add entry to list array
        $items[] = trim(fgets(STDIN));
    } 

    elseif ($validatedInput == 'R') {
        
        // Remove which item?
        echo 'Enter item number to remove: ';
        
        // Assign array key from user input
        $key = trim(fgets(STDIN));
        
        if (isset($items[$key - 1])) {
            // Offset key and remove correct item from array
            unset($items[$key - 1]);
            // Reindex numeric array of values
            $items = array_values($items);
        }

        else {
            echo "Please enter a valid item to remove." . PHP_EOL;
        }
    }

    // Add sleep delay for one second before clear
    usleep(1000000);

    // Run clear to provide clean interface upon each iteration
    echo shell_exec('clear');

// Exit when input is (Q)uit
} while ($validatedInput != 'Q');

// Say Goodbye!
echo "Goodbye!" . PHP_EOL;

// Exit with 0 errors
exit(0);