<?php

/* -------------------------------------------- */
// Define Constants

define('LISTFILE', './data/list.txt');

/* -------------------------------------------- */
// Define Functions

function checkForListFile() {
    // Checks for ./data/list.txt and creates if necessary
}

function openList($filename = LISTFILE) {
    // Checks for data in file
    if (file_exists($filename) && filesize($filename) > 0) {
        // Opens file handle
        $handle = fopen($filename, 'r');

        // Creates a string from file contents
        $contents = trim(fread($handle, filesize($filename)));

        // Creates an array from that string
        $list = explode("\n", $contents);

        // Closes file handle
        fclose($handle);
        
        // Returns array
        return $list;
    }

    else {
        $list = array();
        return $list;
    }
    
}

function validateInput($input) {
    // Validates input for main menu choice

    // shorten menu choice input to one character
    $input = $input[0];

    // check for alpha type
    if (ctype_alpha($input)) {

        // change character to uppercase
        $input = strtoupper($input);

        // check for valid menu choice
        if ($input == 'N' || $input == 'R' || $input == 'K' || $input == 'S' || $input == 'Q') {
                $validatedInput = $input;
                return $validatedInput;
        } // end menu choice check

        else {
            echo "Please enter a valid menu choice." . PHP_EOL;

            // Sleep for one second
            usleep(1000000);
        }
    }

    else {
        echo "Please enter only letters." . PHP_EOL;

        // Sleep for one second
        usleep(1000000);
    }

} // end validateInput()

function outputList($items) {
// Takes in an array, and outputs a block of strings.
    if (empty($items)) {
        return PHP_EOL . "  No items to display." . PHP_EOL . PHP_EOL;
    }

    else {

        // Provide header
        $list .= "ToDo List" . PHP_EOL . "----------" . PHP_EOL;

        // Iterate through list items
        foreach ($items as $key => $item) {
            // Offset array key by 1 for sanity
            $displayKey = $key + 1;

            // Output offset array key and list item
            $list .= " {$displayKey}. {$item}" . PHP_EOL;
        }

        // Additional new line for readability
        $list .= PHP_EOL;

        // Return Block O' Strings
        return $list;
    }
}

function displayPrompt() {
    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ave, (Q)uit : ';
}

function saveList($list, $filename = './data/list.txt') {
    // Saves list to file
    $handle = fopen($filename, 'w');
    foreach ($list as $item) {
        fwrite($handle, $item . PHP_EOL);
    }
    fclose($handle);
    
    // Output success message
    echo "Saved successfully." . PHP_EOL;

    // Sleep for one second
    usleep(1000000);
}

function addItem($list) {
    // Ask for entry
    echo 'Enter item: ';
    
    // Add entry to list array
    $list[] = trim(fgets(STDIN));

    return $list;
}

function removeItem($list) {
    // Remove which item?
    echo 'Enter item number to remove: ';
    
    // Assign array key from user input
    $key = trim(fgets(STDIN));
    
    if (isset($list[$key - 1])) {
        // Offset key and remove correct item from array
        unset($list[$key - 1]);
        // Reindex numeric array of values
        $list = array_values($list);
        
        return $list;
    }

    else {
        echo "Please enter a valid item to remove." . PHP_EOL;
        usleep(1000000);
    }
}

/* -------------------------------------------- */
// Perform Main Logic

// Initialize array to hold list of todo items
$items = openList();

// The loop!
do {

    // Output list if exists
    echo outputList($items);

    // Display user prompt
    echo displayPrompt();

    // Clean up user input for menu choices.
    $validatedInput = validateInput(trim(fgets(STDIN)));

    // Perform relevant action on validated input
    switch ($validatedInput) {
        case 'N':
            // Add Item
            $items = addItem($items);
            break;

        case 'R':
            // Remove Item
            $items = removeItem($items);
            break;

        case 'K':
            // Sort List
            sort($items);
            break;

        case 'S':
            // Save list to file.
            saveList($items);
            break;
        
        default:
            // echo "This shouldn't run." . PHP_EOL;
            break;
    }

    //  Run clear to provide clean interface upon each iteration;
    // and give the user a feeling of real interactivity.
    echo shell_exec('clear');

// Exit when input is (Q)uit
} while ($validatedInput != 'Q');

// Say Goodbye!
echo "Goodbye!" . PHP_EOL;

// Exit with 0 errors
exit(0);