<!--Aaron Gockley
8/13/2024
WEBD-310-45
Main Page
Final Assignment -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    include "Utilities.php";

    echo "Select a bug report if you would like to edit it";
    $Link = OpenConn();
    $Query = "SELECT * FROM bugs"; //This query selects everything from bugs


    echo "<table width='100%' border='1'><br>";
    echo "<tr><td>Product</td><td>Version</td><td>Hardware_Type</td><td>Operating_System</td>
    <td>Frequency</td></tr>"; //This sets up the table structure.

    if ($result = mysqli_query($Link, $Query)) { //This runs the query
        while ($row = mysqli_fetch_assoc($result)) { //This prints out the array of information using an associative array.
            $Product = $row["Product"];
            $Version = $row["Version"];
            $HardwareType = $row["Hardware_Type"];
            $OperatingSystem = $row["Operating_System"];
            $frequency = $row["Frequency"];

            echo "<tr><td><a href='Update.php?Product=$Product'>" .$Product. '</a></td><td>'.$Version.'</td><td>'.$HardwareType.'</td>
            <td>'.$OperatingSystem.'</td><td>'.$frequency.'</td></tr>'; //This prints out the array, one row for each entry. The href loads
            //sends the product that you click to the Update.php page.
        }
    }

    mysqli_close($Link);
    ?>
</body>
</html>