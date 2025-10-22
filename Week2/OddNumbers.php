<!--Aaron Gockley
WEBD-310-45
7/11/2024
Assignment 2 --!>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <title>Odd Numbers</title>
</head>
<body>
<?php
    $Counter = 1; //initializes the variable
    while($Counter <= 100){ //runs the loop as long as it is less than 100
        if ($Counter % 2 == 0) {
            $Counter++; //if the counter is even, it just advances the counter.
        }
        else {
            echo $Counter . "\n"; //otherwise it echos the counter then, progresses the counter.
            $Counter++;
        }
    }
?>
</body>
</html>