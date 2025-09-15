<?php

echo "=== Server Diagnostics ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

// Test 1: PHP Configuration
echo "✓ Test 1: PHP Configuration\n";
echo "PHP Version: " . phpversion() . "\n";
echo "file_uploads: " . (ini_get('file_uploads') ? 'enabled' : 'disabled') . "\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "\n";
echo "max_input_time: " . ini_get('max_input_time') . "\n\n";

// Test 2: Directory Structure
echo "✓ Test 2: Directory Structure\n";
$storageDir = __DIR__ . '/storage/app';
$tempDir = $storageDir . '/livewire-tmp';

echo "Storage directory: " . ($storageDir) . "\n";
echo "Storage exists: " . (is_dir($storageDir) ? 'yes' : 'no') . "\n";
echo "Storage writable: " . (is_writable($storageDir) ? 'yes' : 'no') . "\n";

echo "Temp directory: " . ($tempDir) . "\n";
echo "Temp exists: " . (is_dir($tempDir) ? 'yes' : 'no') . "\n";

// Create temp directory if it doesn't exist
if (!is_dir($tempDir)) {
    if (mkdir($tempDir, 0755, true)) {
        echo "✓ Created temp directory\n";
    } else {
        echo "❌ Failed to create temp directory\n";
    }
} else {
    echo "✓ Temp directory exists\n";
}

echo "Temp writable: " . (is_writable($tempDir) ? 'yes' : 'no') . "\n\n";

// Test 3: File Operations
echo "✓ Test 3: File Operations\n";
$testFile = $tempDir . '/test-' . time() . '.txt';
$testContent = 'Test file content for upload validation';

if (file_put_contents($testFile, $testContent)) {
    echo "✓ Can write files to temp directory\n";
    
    if (file_get_contents($testFile) === $testContent) {
        echo "✓ Can read files from temp directory\n";
    } else {
        echo "❌ Cannot read files from temp directory\n";
    }
    
    if (unlink($testFile)) {
        echo "✓ Can delete files from temp directory\n";
    } else {
        echo "❌ Cannot delete files from temp directory\n";
    }
} else {
    echo "❌ Cannot write files to temp directory\n";
}

echo "\n";

// Test 4: Disk Space
echo "✓ Test 4: Disk Space\n";
$freeBytes = disk_free_space(__DIR__);
$totalBytes = disk_total_space(__DIR__);

if ($freeBytes !== false && $totalBytes !== false) {
    $freeMB = round($freeBytes / 1024 / 1024, 2);
    $totalMB = round($totalBytes / 1024 / 1024, 2);
    echo "Free space: {$freeMB} MB\n";
    echo "Total space: {$totalMB} MB\n";
} else {
    echo "Cannot determine disk space\n";
}

echo "\n";

// Test 5: Laravel Files Check
echo "✓ Test 5: Laravel Files Check\n";
$laravelFiles = [
    'vendor/autoload.php',
    'bootstrap/app.php',
    'config/app.php',
    'config/livewire.php'
];

foreach ($laravelFiles as $file) {
    $path = __DIR__ . '/' . $file;
    echo "{$file}: " . (file_exists($path) ? 'exists' : 'missing') . "\n";
}

echo "\n";

// Test 6: Basic Autoloader Test
echo "✓ Test 6: Basic Autoloader Test\n";
$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    echo "Autoloader exists\n";
    try {
        require_once $autoloadPath;
        echo "✓ Autoloader loaded successfully\n";
        
        // Test if basic Laravel classes are available
        if (class_exists('Illuminate\Foundation\Application')) {
            echo "✓ Laravel Foundation classes available\n";
        } else {
            echo "❌ Laravel Foundation classes not available\n";
        }
    } catch (Exception $e) {
        echo "❌ Autoloader failed: " . $e->getMessage() . "\n";
    }
} else {
    echo "❌ Autoloader missing\n";
}

echo "\n=== Diagnostics Complete ===\n";
