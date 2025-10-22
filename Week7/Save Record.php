<!--Aaron Gockley
8/13/2024
WEBD-310-45
Final Assignment -->
<?php


include 'Utilities.php';
/**
 * This begins by loading all the values sent from the form. Since the ID is not set for a new entry it is practically NULL
 */
    $ID = ($_POST['ID']);
    $Product = ($_POST['Product']);
    $Version = ($_POST['Version']);
    $Hardware = ($_POST['Hardware']);
    $OS = ($_POST['OS']);
    $Frequency = ($_POST['Frequency']);
    $Solutions = ($_POST['Solutions']);
/**
 * This if statement first checks to see if ID is set to 0. If it is set, it will use an insert statement to add the entry to the database.
 */
    if ($ID==0){
        $Connection = OpenConn();
        $SQLstring = "INSERT INTO bugs SET
            Product = '$Product',
            Version = '$Version',
            Hardware_Type = '$Hardware',
            Operating_System = '$OS',
            Frequency = '$Frequency',
            Solutions = '$Solutions'";

        if (!mysqli_query($Connection, $SQLstring)) {
            Echo "There was an error inserting your record: " . mysqli_error($Connection);

            exit();}
        echo "New record created successfully<br>";

        mysqli_close($Connection); //It then asks if you want to Add another one or Update an existing report.
        ?> <a href="Add.php">Add New Bug Report <br></a>
        <a href="Buglist.php">Update an Existing Bug Report</a><?php } else {

        /**
         * If ID is anything else, it instead uses an update statement to update the values
         */
        $Connection = OpenConn();
        $SQLstring = "UPDATE bugs SET
            Product = '$Product',
            Version = '$Version',
            Hardware_Type = '$Hardware',
            Operating_System = '$OS',
            Frequency = '$Frequency',
            Solutions = '$Solutions'
            WHERE ID = $ID";

        if (!mysqli_query($Connection, $SQLstring)) {
            Echo "There was an error updating your record: " . mysqli_error($Connection);

            exit();}
        echo "The record was successfully updated.<br>";
        //Asks the same question when you successfully update a record
        mysqli_close($Connection);
        ?> <a href="Add.php">Add New Bug Report <br></a>
        <a href="Buglist.php">Update an Existing Bug Report</a><?php
        }

?>