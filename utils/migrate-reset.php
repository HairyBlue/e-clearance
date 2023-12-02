<?php
const MIGRATE_PATH = __DIR__;
$config = require_once "config.php";
function runMigration($script, $connection)
{
    $sql = file_get_contents($script);
    if ($connection->multi_query($sql)) {
        echo "Migration reset successfully applied: " . $script . "\n";
    } else {
        echo "Error applying migration: " . $connection->error . "\n";
    }
}

$db = new mysqli($host, $user, $password, $database, $port);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}
$migrationFolder = MIGRATE_PATH . "/migration-reset/";
$migrationFiles = glob($migrationFolder . "*.sql");

foreach ($migrationFiles as $migrationFile) {
    runMigration($migrationFile, $db);
}
$db->close();
