<!--
Aaron Gockley
WEBD-310-45
8/2/2024
Assignment 5 -->
<?php

function rewriteGuestBook()
{
    if (!file_exists('guestbook.txt')) {
        echo "File does not exist"; //handles the error of the file not existing.
    } else {

        $guests = []; //creates an array.
        foreach (file('guestbook.txt') as $line) {
            $guests[] = explode(";", $line); //goes through the file and explodes each line into its own array.
        }

        $guests = array_map('unserialize', array_unique(array_map('serialize', $guests))); //This deletes all duplicates.

        sort($guests);

        $guestbook = fopen('guestbook.txt', 'w'); //wipes the file,
        for ($i = 0; $i < count($guests); $i++) { //writes the array without duplicates to the wiped file.
            if (!isset($guests[$i][0])){
               continue;
            } else {
                $name = $guests[$i][0];
                $email = $guests[$i][1];

                $entrant = "$name;$email;\n";
                fwrite($guestbook, $entrant);
            }
        }
        fclose($guestbook);
    }
}
function displayGuestBook()
{
    if (!file_exists('guestbook.txt')) {
        echo "File does not exist"; //handles the error of the file not existing.
    } else {

        $guests = []; //creates an array.
        foreach (file('guestbook.txt') as $line) {
            $guests[] = explode(";", $line); //goes through the file and explodes each line into its own array.
        }

        sort($guests);

        for ($name = 0; $name < count($guests); $name++) { //loops through
            echo $guests[$name][0] . ' ' . $guests[$name][1] . "<br>"; //prints out all the names in the guest book.
        }


    }
}