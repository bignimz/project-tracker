<?php
require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);

    $sql_db = file_get_contents("data/database.sql");
    $sql_structure = file_get_contents("data/structure.sql");
    $sql_content = file_get_contents("data/content.sql");

    $connection->exec($sql_db);
    $connection->exec($sql_structure);
    $connection->exec($sql_content);

    echo "<p>Database created and populated successfully. <br><a href='./'>Home</a></p>";
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}