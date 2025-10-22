<!--Aaron Gockley
8/13/2024
WEBD-310-45
Final Assignment -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add/Edit a Record</title>
</head>
<body>
    <?php
    include "Utilities.php";
    $Product_Name = $_GET['Product'];
    $link = OpenConn();
    $Query = "SELECT * FROM bugs WHERE Product='$Product_Name'"; //This loads all the information for the row that has the product name sent from Buglist.
    $result = mysqli_query($link, $Query);

    if ($result = mysqli_query($link, $Query)) { //This is identical to the loop that is used to print the table, but only prints one associative array.
        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row['ID'];
            $Product = $row["Product"];
            $Version = $row["Version"];
            $HardwareType = $row["Hardware_Type"];
            $OperatingSystem = $row["Operating_System"];
            $frequency = $row["Frequency"];
            $Solutions = $row["Solutions"];
        }
    }
    ?>
    <!--This is similar to the Add.php form, but has a few extra things, for one it has a hidden input type that is the ID of the SQL product you are updating.
    It also loads the current values into the form.-->
    <form action="Save Record.php" method="post">
    <input type="hidden" value="<?php echo $ID; ?>" name="ID"> <!--This ID value is necessary for the update to work, otherwise it creates a new entry.-->
    Product: <input type="text" name="Product" placeholder="Name" maxlength="30" required
        value="<?php echo $Product; ?>"><br>
    Version: <input type="number" name="Version" placeholder="1.0" step="0.01" required
        value="<?php echo $Version; ?>"><br> <!--This allows decimal points for version number-->
    Hardware Type: <input type="text" name="Hardware" placeholder="Desktop/laptop/server" maxlength="20" required
        value="<?php echo $HardwareType; ?>"><br>
    Operating System: <input type="text" name="OS" placeholder="Linux/Mac/Windows" maxlength="20" required
        value="<?php echo $OperatingSystem; ?>"><br>
    Frequency: <input type="text" name="Frequency" placeholder="Every Minute" maxlength="20" required
        value="<?php echo $frequency; ?>"><br>
    Solutions: <input type="text" name="Solutions" placeholder="Current Solutions" maxlength="400"
        value="<?php echo $Solutions; ?>"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>