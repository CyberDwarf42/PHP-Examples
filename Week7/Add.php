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

    <form action="Save Record.php" method="post"> <!--This form collects the information for a new entry -->
        <input type="hidden" name="ID" value=0> <!--Since I need a value for ID for the checking to work I set the value to be 0, since there is not a primary key 0-->
        Product: <input type="text" name="Product" placeholder="Name" maxlength="30" required><br>
        Version: <input type="number" name="Version" placeholder="1.0" step="0.01" required><br> <!--This allows decimal points for version number-->
        Hardware Type: <input type="text" name="Hardware" placeholder="Desktop/laptop/server" maxlength="20" required><br>
        Operating System: <input type="text" name="OS" placeholder="Linux/Mac/Windows" maxlength="20" required><br>
        Frequency: <input type="text" name="Frequency" placeholder="Every Minute" maxlength="20" required><br>
        Solutions: <input type="text" name="Solutions" placeholder="Current Solutions" maxlength="400"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>