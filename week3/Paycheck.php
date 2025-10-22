<html>
    <head>
        <title>PaycheckCalculator</title>
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
    function redisplayForm($HoursWorked, $Wage) { //This function redisplays the page. It also loads any values that you did enter in the form.
        ?>
        <form name="Paycheck" action="Paycheck.php" method="post">
            <p>Hours Worked: <input type="number" name="HoursWorked"
                                    value="<?php echo $HoursWorked; ?>" /></p>
            <p>Hourly Wage: <input type="number" name="Wage"
                                   value="<?php echo $Wage; ?>" /></p>
            <p><input type="submit" value="Calculate"/></p>
        </form>
        <?php //It recreates the main page.
    }

    $HoursWorked = validateInput($_POST['HoursWorked'], "Hours Worked"); //This validates the Hours worked
    $Wage = validateInput($_POST['Wage'], "Hourly Wage"); //this validates the Wage.

    if ($errorCount > 0) { //If the errorcount is over 0, it redisplays the form.
        echo "Please re-enter the information below.<br />\n";
        redisplayForm($HoursWorked, $Wage);
    } else { //otherwise it runs this if else statement.
        if ($HoursWorked > 40) { //if hours worked is over 40
            $Paycheck = ((40 * $Wage) + (($HoursWorked - 40) * ($Wage * 1.5))); //you multiply 40 by the wage, then subtract 40 from hours worked, then multiply that by wage times 1.5
                echo $Paycheck; //echoes the paycheck.
        } else {
            $Paycheck = $Wage*$HoursWorked; //else just multiplies them together.
            echo $Paycheck;
        }
    }
    ?>
    </body>
</html>