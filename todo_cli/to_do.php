<?php

define('LISTFILE', './data/list.txt');

function checkForListFile() {
    // Checks for ./data/list.txt and creates if necessary
}

// function openList($filename = LISTFILE) {
//     //
//     if (file_exists($filename) && filesize($filename) > 0) {
//         $handle = fopen($filename, 'r');
//         $contents = trim(fread($handle, filesize($filename)));
//         $contents = explode('\n', $contents);
//         foreach ($contents as $item) {
//             $list[] = "$item" . PHP_EOL;
//         }
//         fclose($handle);

//         return $list;
//     }

//     else {
//         $list = array();
//         return $list;
//     }
    
// }

function validateInput($input) {
    // Validates input for main menu choice

    // shorten menu choice input to one character
    $input = $input[0];

    // check for alpha type
    if (ctype_alpha($input)) {

        // change character to uppercase
        $input = strtoupper($input);

        // check for valid menu choice
        if ($input == 'N' || $input == 'R' || $input == 'S' || $input == 'Q') {
                $validatedInput = $input;
                return $validatedInput;
        } // end menu choice check

        else {
            echo "Please enter a valid menu choice." . PHP_EOL;
            usleep(1000000);
        }
    }

    else {
        echo "Please enter only letters." . PHP_EOL;
        usleep(1000000);
    }

} // end validateInput()

function outputList($items) {
    if (empty($items)) {
        return PHP_EOL . "  No items to display." . PHP_EOL . PHP_EOL;
    }

    else {

        // Provide header
        $string .= "ToDo List" . PHP_EOL . "----------" . PHP_EOL;

        // Iterate through list items
        foreach ($items as $key => $item) {
            // Set displayKey offset by 1 for sanity
            $displayKey = $key + 1;

            // Output displayKey and list item
            $string .= " {$displayKey}. {$item}" . PHP_EOL;
        }

        // Additional new line for readability
        $string .= PHP_EOL;

        return $string;
    }
}

function saveList($list, $filename = './data/list.txt') {
    // Saves list to file
    $handle = fopen($filename, 'w');
    foreach ($list as $item) {
        fwrite($handle, $item . PHP_EOL);
    }
    fclose($handle);
    return "Saved successfully." . PHP_EOL;
}

/* -------------------------------------------- */

// Create array to hold list of todo items
$items = array();

// The loop!
do {

    echo outputList($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ave List to File, (Q)uit : ';

    // Use trim() to remove whitespace and newlines
    // Run validation function on captured input
    // Assign output of validateInput to $validatedInput
    $validatedInput = validateInput(trim(fgets(STDIN)));

    // Perform corresponding action on validated input
    switch ($validatedInput) {
        case 'N':
            // Ask for entry
            echo 'Enter item: ';
            
            // Add entry to list array
            $items[] = trim(fgets(STDIN));
            
            break;

        case 'R':
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

            break;

        case 'S':
            echo saveList($items);
            break;
        
        default:
            // echo "This shouldn't run." . PHP_EOL;
            break;
    }

    // Run clear to provide clean interface upon each iteration
    echo shell_exec('clear');

// Exit when input is (Q)uit
} while ($validatedInput != 'Q');

// Say Goodbye!
echo "Goodbye!" . PHP_EOL;

// Exit with 0 errors
exit(0);