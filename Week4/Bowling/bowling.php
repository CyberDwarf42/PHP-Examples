<!--
Aaron Gockley
WEBD-310-45
7/25/2024
Assignment 4 -->
<html>
    <head>
        <title>BowlingForm</title>
    </head>
    <body>
    <?php
    function displayRequired($fieldName) { //This shows you which field needs filled out.
        echo "The field \"$fieldName\" is required.";
    }
    function PositiveOnly($fieldName) { //This tells you which field needs to be positive.
        echo "The field \"$fieldName\" must be positive.";
    }
    function validateInput($data, $fieldName) {
        global $errorCount; //This calls errorcount
        if (empty($data)) { //If the data is
            displayRequired($fieldName); //calls the displayrequired function to tell you which field needs filled
            ++$errorCount; //increments error count
            $retval = ""; //returns a blank string as the value.
        } elseif ($data <= 0) {
            PositiveOnly($fieldName); //checks if number is positive.
            ++$errorCount; //Increments error
            $retval = "";
        } else {
            $retval = $data; //returns the value if the above tests are not true.
        }
        return($retval); //This returns whatever the retval is.
    }
    $errorCount = 0; //creates the errorcount variable.
    function redisplayForm($FirstName, $LastName, $Age, $Average){
        ?>
        <form action="bowling.php" method="post"><!--This calls the php form-->
            <p>First: <input type="text" name="FirstName"
                value="<?php echo $FirstName; ?>"</p>
            <p>Last: <input type="text" name="LastName"
                value="<?php echo $LastName; ?>"</p>
            <p>Age: <input type="number" name="Age"
                value="<?php echo $Age; ?>"</p>
            Average: <input type="number" name="Average"
                value="<?php echo $Average; ?>"</p>
            <input type="submit" value="Submit">
        </form>
        <?php
    }
    $FirstName = validateInput($_POST["FirstName"], "First"); //Validates the Firstname
    $LastName = validateInput($_POST["LastName"], "Last"); //Validates the last name.
    $Age = validateInput($_POST["Age"], "Age");
    $Average = validateInput($_POST["Average"], "Average");
    if ($errorCount > 0) {
        echo "Please re-enter the information below.<br />\n";
        redisplayForm($FirstName, $LastName, $Age, $Average);
    }
        else
            if ((is_readable("C:/wamp64/www/Week4/Bowling"))==1 && (is_writeable("C:/wamp64/www/Week4/Bowling"))==1) { //checks if the directory is both readable and writeable.
                $Bowling_league = fopen("BowlingLeague.txt", "a+"); //opens the file at the end, creates it if it does not exist
                $Entrant_name = $FirstName . " " . $LastName; //combines first and last name into full name.
                $Entrant = "$Entrant_name, $Age, $Average\n"; //generates the entry.
                fwrite($Bowling_league, $Entrant); //enters the entry into the file.
                fclose($Bowling_league); //closes the file.
                echo "Welcome to the Bowling league!<br />\n"; //prints a message letting the user know that it was entered.
            }
            else
                echo "There was an error. <br />\n"; //prints an error if the directory was not readable or writeable.
    ?>
    </body>
</html>
