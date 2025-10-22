<!--
Aaron Gockley
WEBD-310-45
8/2/2024
Assignment 5 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest-Book</title>
</head>
<body>
    <form action="SaveGuests.php" method="post">
      Name: <input type="text" name="Name" required><br> <!--The required keyword does all the checking for me. Including reloading with completed forms-->
      Email: <input type="email" name="Email" required><br>
      <input type="submit" value="Submit">
    </form>
    <h2>Current Guests</h2>
    <?php include "Display.php"; rewriteGuestBook(); displayGuestBook(); ?> <!--This allows me to keep this nice and simple. All the complicated stuff is in other files.-->
</body>
</html>