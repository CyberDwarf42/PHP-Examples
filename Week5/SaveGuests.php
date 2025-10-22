<?php
function in_array_r($needle, $haystack, $strict = false) { //this expands the in_array function to work on multidimensional arrays.
    foreach ($haystack as $item) { //f
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) { //it begins by looping through and checking each sub array for the item.
            return true;
        }
    }
    return false;
}

$Name = ($_POST['Name']);
$email = ($_POST['Email']);

$Guest_book = fopen("guestbook.txt", "a+"); //Opens the file at the end
$guests = []; //creates an array for checking.
foreach (file('guestbook.txt') as $line) {
    $guests[] = explode(";", $line); //Loads the file into the array.
}

if (in_array_r($email, $guests)) { //checks to see if the $email that is entered already exists in the file
    echo "This user already exists in the database.";
} else {


    $entrant = "$Name;$email;\n"; //otherwise it writes the entrant to the guestbook.
    fwrite($Guest_book, $entrant);
    fclose($Guest_book);
    echo "Thank you for registering!";
}
