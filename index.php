<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App with SQL Server</title>
</head>
<body>
    <h1>PHP Web App with SQL Server</h1>
    
    <form method="post">
        <label for="inputData">Enter Data:</label>
        <input type="text" name="inputData" id="inputData">
        <input type="submit" value="Save">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $serverName = "10.10.10.4";
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

        // Retrieve the user's input data from the form
        $inputData = $_POST["inputData"];

        // Insert the data into the database
        $sql = "INSERT INTO UserData (InputData) VALUES (?)";
        $params = array($inputData);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo "Data saved successfully!";
        }

        // Close the connection
        sqlsrv_close($conn);
    }
    ?>
</body>
</html>
