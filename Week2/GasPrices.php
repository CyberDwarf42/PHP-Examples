<!--Aaron Gockley
WEBD-310-45
7/11/2024
Assignment 2 --!>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <title>Gas Prices</title>
</head>
<body>
<?php
    $GasPrice=2.57; //initializes variable
    if ($GasPrice>=2 && $GasPrice<=3) { //if the gas price exists between these values,
        echo "<p>Gas prices are between $2.00 and $3.00</p>"; //it prints this
    }
    else {
        echo "<p>Gas prices are not between $2.00 and $3.00</p>"; //otherwise it prints this.
    }
?>
</body>
</html>