<!DOCTYPE html>
<html>
<head>
    <title>Hello, Azure!</title>
</head>
<body>
    <h1>Hello, Azure!</h1>
    <p>This is a sample PHP web app deployed to Azure App Service using PHP 8.0.</p>

    <?php
    // Database connection code
    $serverName = "137.116.132.116";
    $connectionOptions = array(
        "Database" => "master",
        "Uid" => "sqladmin",
        "PWD" => "password@123"
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if (!$conn) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Query the database
    $sql = "SELECT * FROM your-table";
    $query = sqlsrv_query($conn, $sql);

    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Display data from the database
    echo "<h2>Data from SQL Server:</h2>";
    echo "<ul>";
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        echo "<li>Name: " . $row['Name'] . "</li>";
        // Add more fields as needed
    }
    echo "</ul>";

    // Close the connection
    sqlsrv_close($conn);
    ?>
</body>
</html>
