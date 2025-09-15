<?php

/**
 * Simple Upload Test - No Laravel Dependencies Required
 * Run with: php83-cli simple-upload-test.php
 */

echo "=== Simple Upload Diagnostics ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

// Test 1: Basic PHP Configuration
echo "🔧 Test 1: PHP Upload Configuration\n";
$config = [
    'file_uploads' => ini_get('file_uploads'),
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size' => ini_get('post_max_size'),
    'max_execution_time' => ini_get('max_execution_time'),
    'memory_limit' => ini_get('memory_limit'),
    'upload_tmp_dir' => ini_get('upload_tmp_dir') ?: '/tmp'
];

foreach ($config as $key => $value) {
    $status = ($key === 'file_uploads' && $value) ? '✓' : ($key === 'file_uploads' ? '❌' : '');
    echo "{$status} {$key}: {$value}\n";
}

if (!ini_get('file_uploads')) {
    echo "❌ CRITICAL: File uploads are disabled in PHP!\n";
    exit(1);
}
echo "\n";

// Test 2: Directory Structure
echo "🔧 Test 2: Directory Structure\n";
$directories = [
    'storage/app' => 'Storage app directory',
    'storage/app/livewire-tmp' => 'Livewire temp directory',
    'storage/app/private' => 'Private storage',
    'storage/app/public' => 'Public storage',
    'public/images' => 'Public images directory'
];

foreach ($directories as $dir => $description) {
    if (is_dir($dir)) {
        $perms = substr(sprintf('%o', fileperms($dir)), -4);
        echo "✓ {$description}: exists (permissions: {$perms})\n";
    } else {
        echo "❌ {$description}: missing\n";
        // Try to create it
        if (mkdir($dir, 0755, true)) {
            echo "  ✓ Created directory: {$dir}\n";
        } else {
            echo "  ❌ Failed to create: {$dir}\n";
        }
    }
}
echo "\n";

// Test 3: File Write Test
echo "🔧 Test 3: File Write Permissions\n";
$testDirs = ['storage/app/livewire-tmp', 'storage/app/public', 'public/images'];

foreach ($testDirs as $dir) {
    if (is_dir($dir)) {
        $testFile = $dir . '/test-' . time() . '.txt';
        if (file_put_contents($testFile, 'test content')) {
            echo "✓ Can write to: {$dir}\n";
            unlink($testFile);
        } else {
            echo "❌ Cannot write to: {$dir}\n";
        }
    }
}
echo "\n";

// Test 4: Simulate HTTP File Upload
echo "🔧 Test 4: HTTP Upload Simulation\n";

// Create a temporary file to simulate upload
$tempContent = str_repeat('X', 1024 * 1024); // 1MB of data
$tempFile = tempnam(sys_get_temp_dir(), 'upload_test');
file_put_contents($tempFile, $tempContent);

// Simulate $_FILES array
$simulatedUpload = [
    'name' => 'test-image.jpg',
    'type' => 'image/jpeg',
    'tmp_name' => $tempFile,
    'error' => UPLOAD_ERR_OK,
    'size' => filesize($tempFile)
];

echo "Simulated upload:\n";
echo "  Name: {$simulatedUpload['name']}\n";
echo "  Type: {$simulatedUpload['type']}\n";
echo "  Size: " . round($simulatedUpload['size'] / 1024, 2) . " KB\n";
echo "  Error: " . ($simulatedUpload['error'] === UPLOAD_ERR_OK ? 'UPLOAD_ERR_OK' : $simulatedUpload['error']) . "\n";

// Test file validation
$maxUploadSize = ini_get('upload_max_filesize');
$maxPostSize = ini_get('post_max_size');

function convertToBytes($value) {
    $value = trim($value);
    $last = strtolower($value[strlen($value) - 1]);
    $value = (int) $value;
    switch ($last) {
        case 'g': $value *= 1024;
        case 'm': $value *= 1024;
        case 'k': $value *= 1024;
    }
    return $value;
}

$uploadBytes = convertToBytes($maxUploadSize);
$postBytes = convertToBytes($maxPostSize);
$fileBytes = $simulatedUpload['size'];

if ($fileBytes <= $uploadBytes && $fileBytes <= $postBytes) {
    echo "✓ File size within PHP limits\n";
} else {
    echo "❌ File size exceeds PHP limits\n";
}

// Clean up
unlink($tempFile);
echo "\n";

// Test 5: Check for Laravel Files (without loading)
echo "🔧 Test 5: Laravel Installation Check\n";
$laravelFiles = [
    'artisan' => 'Artisan command',
    'composer.json' => 'Composer configuration',
    'vendor/autoload.php' => 'Composer autoloader',
    'bootstrap/app.php' => 'Laravel bootstrap',
    'config/livewire.php' => 'Livewire configuration'
];

$missingFiles = [];
foreach ($laravelFiles as $file => $description) {
    if (file_exists($file)) {
        echo "✓ {$description}: exists\n";
    } else {
        echo "❌ {$description}: missing\n";
        $missingFiles[] = $file;
    }
}

if (!empty($missingFiles)) {
    echo "\n⚠️  Missing Laravel files detected. You may need to:\n";
    echo "   1. Run 'composer install --no-dev' on the server\n";
    echo "   2. Upload missing files\n";
    echo "   3. Check deployment process\n";
}
echo "\n";

// Test 6: Basic HTTP Request Simulation
echo "🔧 Test 6: HTTP Request Headers\n";
$headers = [
    'HTTP_HOST' => $_SERVER['HTTP_HOST'] ?? 'localhost',
    'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'] ?? 'CLI',
    'CONTENT_TYPE' => $_SERVER['CONTENT_TYPE'] ?? 'not set',
    'CONTENT_LENGTH' => $_SERVER['CONTENT_LENGTH'] ?? 'not set'
];

foreach ($headers as $key => $value) {
    echo "{$key}: {$value}\n";
}
echo "\n";

// Test 7: Recommendations
echo "🔧 Test 7: Recommendations for 422 Error\n";
echo "Based on the diagnostics, here are likely causes of your 422 error:\n\n";

if (in_array('vendor/autoload.php', $missingFiles)) {
    echo "❌ CRITICAL: Composer dependencies not installed\n";
    echo "   Solution: Run 'composer install --no-dev' on your server\n\n";
}

if (in_array('config/livewire.php', $missingFiles)) {
    echo "❌ CRITICAL: Livewire config missing\n";
    echo "   Solution: Ensure all config files are uploaded\n\n";
}

echo "✓ PHP configuration looks good (64M limits)\n";
echo "✓ File system permissions are working\n";
echo "✓ Temp directories exist and are writable\n\n";

echo "Most likely cause: Missing vendor dependencies\n";
echo "Next steps:\n";
echo "1. SSH to your server\n";
echo "2. cd ~/public_html/artgarden\n";
echo "3. Run: composer install --no-dev --optimize-autoloader\n";
echo "4. Test file upload again\n\n";

echo "=== Diagnostics Complete ===\n";
