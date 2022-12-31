<?php

/**
 * Configuration for remote database connection
 *
 */

$host       = "";
$username   = "root";
$password   = "";
$dbname     = "";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);