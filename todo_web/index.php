<?php  

// This was written for our Carlsbad Cohort.
// Related Gist(w/out bootstrap): https://gist.github.com/tlaffoon/b360c359ee8f188d7a33

// Define constant for filename to read/write
define('FILENAME', 'list.txt');

/* -------------------------------------- */

// OPEN FILE TO POPULATE LIST

function open_file($filename = FILENAME) {

	if (filesize($filename) == 0) {
		$filesize = 100;
	} 

	else {
		$filesize = filesize($filename);
	}
	

    $handle = fopen($filename, 'r');
    $contents = trim(fread($handle, $filesize));
    $list = explode("\n", $contents);
    fclose($handle);
    return $list;
}

/* -------------------------------------- */

// SAVE LIST TO FILENAME

function save_to_file($list, $filename = FILENAME) {

    $handle = fopen($filename, 'w');
    foreach ($list as $item) {
        fwrite($handle, $item . PHP_EOL);
    }
    fclose($handle);        
}

/* -------------------------------------- */

// Initialize variable as an empty array for list items
$items = []; 

// Populate array with items from file
$items = open_file();

?>

<html>
<head>
	<title>Todo List App</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container col-lg-6 pull-left">

	<h3>List of Items: </h3>

	<ol>

		<?php

			//var_dump($_GET);
			//var_dump($_POST);

			// Check for key 'additem' in POST request
			if (isset($_POST['additem'])) {
				// Add item from POST to array $items
				$items[] = $_POST['additem'];
				// Save array of items to file
				save_to_file($items);
			}

			// Check for key 'remove' in GET request
			if (isset($_GET['remove'])) {
				// Define variable $keyToRemove according to value
				$keyToRemove = $_GET['remove'];
				// Remove item from array according to key specified
				unset($items[$keyToRemove]);
				// Numerically reindex values in array after removing item
				$items = array_values($items);
				// Save to file
				save_to_file($items);
			}

			// Loop through array $items and output key => value pairs
			foreach ($items as $key => $item) {
				// Include anchor tag and link to perform GET request, according to $key 
				echo '<li> <a href=' . "?remove=$key" . '>Complete</a> - ' . "$item</li>";
			}
		?>

	</ol>

		<!-- Form to allow items to be added -->
		<form role="form" class="form-inline" name="additem" method="POST" action="/todo/index.php">

			<div class="form-group">
				<button class="btn btn-default" type="submit">Add Item</button>
				<input class="form-control" type="text" id="additem" name="additem">
			</div>

		</form>

	</div> <!-- end column -->

</body>
</html>