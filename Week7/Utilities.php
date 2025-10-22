<!--Aaron Gockley
8/13/2024
WEBD-310-45
Final Assignment -->
<?php

/**
 *Connect to Database. This is used in pretty much every page.
 */
function OpenConn() {
    $Connection = mysqli_connect("localhost", "root", "", "bug_reports");
    if (!$Connection) {
        echo mysqli_connect_error() . ":" . mysqli_connect_errno();
        exit();
    }

    //database encoding
    if (!mysqli_set_charset($Connection, "utf8")) {
        echo "There was a problem.";
    }

    return $Connection;
}

