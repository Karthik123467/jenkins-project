<?php
// Establish the connection
$connect = mysqli_connect(
    'db',           // service name
    'php_docker',   // username
    'password',     // password
    'php_docker'    // database name
);

$table_name = "php_docker_table1";
$query = "SELECT * FROM $table_name";
$response = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Entries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 2.5em;
        }
        .entry {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
        }
        .entry h3 {
            color: #333;
            font-size: 1.5em;
        }
        .entry p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }
        .entry .date {
            font-style: italic;
            color: #888;
        }
        .entry hr {
            border: 1px solid #eee;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Database Entries</h1>
    <?php
    echo "<strong>$table_name: </strong>";
    while($i = mysqli_fetch_assoc($response)) {
        echo "<div class='entry'>";
        echo "<h3>".$i['title1']."</h3>";
        echo "<p>".$i['body1']."</p>";
        echo "<p class='date'>Created on: ".$i['date_created1']."</p>";
        echo "<hr>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
