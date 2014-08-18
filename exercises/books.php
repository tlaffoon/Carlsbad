<?php

$books = array(
    'The Hobbit' => array(
        'published' => 1937,
        'author' => 'J. R. R. Tolkien',
        'pages' => 310
    ),
    'Game of Thrones' => array(
        'published' => 1996,
        'author' => 'George R. R. Martin',
        'pages' => 835
    ),
    'The Catcher in the Rye' => array(
        'published' => 1951,
        'author' => 'J. D. Salinger',
        'pages' => 220
    ),
    'A Tale of Two Cities' => array(
        'published' => 1859,
        'author' => 'Charles Dickens',
        'pages' => 544
    )
);

fwrite(STDOUT, "Please enter the year: ");
$year = fgets(STDIN);

foreach ($books as $title => $values) {

    if ($values['published'] > $year) {
        echo "---------------------\n";

        echo "$title\n";
        
        echo "\tAuthor: {$values['author']}\n";
        echo "\tPublished: {$values['published']}\n";
        echo "\tPages: {$values['pages']}\n";

        echo "---------------------\n";
    }
}

?>