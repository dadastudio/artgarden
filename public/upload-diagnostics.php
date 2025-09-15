<?php
/**
 * Upload Diagnostics Script for home.pl Shared Hosting
 * Upload this file to your home.pl server and run it to diagnose upload issues
 */

echo "<h2>PHP Upload Configuration</h2>";
echo "PHP Version: " . PHP_VERSION . "<br>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "post_max_size: " . ini_get('post_max_size') . "<br>";
echo "max_execution_time: " . ini_get('max_execution_time') . "<br>";
echo "max_input_time: " . ini_get('max_input_time') . "<br>";
echo "memory_limit: " . ini_get('memory_limit') . "<br>";
echo "file_uploads: " . (ini_get('file_uploads') ? 'Enabled' : 'Disabled') . "<br>";
echo "max_file_uploads: " . ini_get('max_file_uploads') . "<br>";

echo "<h2>Directory Permissions</h2>";
$paths = [
    'public/images' => __DIR__ . '/images',
    'public/images/avatars' => __DIR__ . '/images/avatars',
    'storage/app' => dirname(__DIR__) . '/storage/app',
    'storage/framework/cache' => dirname(__DIR__) . '/storage/framework/cache',
];

foreach ($paths as $name => $path) {
    echo "$name: ";
    if (is_dir($path)) {
        echo "EXISTS ";
        echo (is_writable($path) ? "WRITABLE" : "NOT WRITABLE");
        echo " (perms: " . substr(sprintf('%o', fileperms($path)), -4) . ")";
    } else {
        echo "DOES NOT EXIST";
    }
    echo "<br>";
}

echo "<h2>Test File Creation</h2>";
$testFile = __DIR__ . '/images/avatars/test-upload.txt';
$testContent = "Test upload at " . date('Y-m-d H:i:s');

try {
    if (!is_dir(dirname($testFile))) {
        mkdir(dirname($testFile), 0755, true);
        echo "Created avatars directory<br>";
    }
    
    if (file_put_contents($testFile, $testContent)) {
        echo "✓ Successfully created test file: $testFile<br>";
        unlink($testFile); // Clean up
        echo "✓ Successfully deleted test file<br>";
    } else {
        echo "✗ Failed to create test file<br>";
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "<br>";
}

echo "<h2>Laravel Environment Check</h2>";
if (file_exists(dirname(__DIR__) . '/artisan')) {
    echo "✓ Laravel detected<br>";
    
    // Check if we can load Laravel
    try {
        require_once dirname(__DIR__) . '/vendor/autoload.php';
        $app = require_once dirname(__DIR__) . '/bootstrap/app.php';
        $app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();
        
        echo "✓ Laravel bootstrapped successfully<br>";
        echo "App Environment: " . config('app.env') . "<br>";
        echo "App Debug: " . (config('app.debug') ? 'true' : 'false') . "<br>";
        
        // Test filesystem disk
        $disk = \Storage::disk('avatars');
        echo "✓ Avatars disk accessible<br>";
        echo "Avatars disk root: " . $disk->path('') . "<br>";
        
    } catch (Exception $e) {
        echo "✗ Laravel bootstrap error: " . $e->getMessage() . "<br>";
    }
} else {
    echo "✗ Laravel not found<br>";
}

echo "<h2>Server Information</h2>";
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "<br>";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "<br>";
echo "Script Path: " . __FILE__ . "<br>";
echo "Working Directory: " . getcwd() . "<br>";

if (function_exists('apache_get_modules')) {
    echo "Apache Modules: " . implode(', ', apache_get_modules()) . "<br>";
}
?>
