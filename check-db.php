<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Database Configuration ===\n";
echo "DB_CONNECTION: " . env('DB_CONNECTION') . "\n";
echo "DB_HOST: " . env('DB_HOST') . "\n";
echo "DB_PORT: " . env('DB_PORT') . "\n";
echo "DB_DATABASE: " . env('DB_DATABASE') . "\n";
echo "DB_USERNAME: " . env('DB_USERNAME') . "\n";
echo "DB_PASSWORD: " . (env('DB_PASSWORD') ? '***hidden***' : '(empty)') . "\n";
echo "\n=== Testing Connection ===\n";

try {
    $pdo = DB::connection()->getPdo();
    echo "✓ Successfully connected to PostgreSQL!\n";
    echo "Driver: " . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . "\n";
    echo "Server version: " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION) . "\n";
} catch (\Exception $e) {
    echo "✗ Connection failed!\n";
    echo "Error: " . $e->getMessage() . "\n";
}
