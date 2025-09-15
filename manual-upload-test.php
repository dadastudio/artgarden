<?php

/**
 * Manual Livewire Upload Test for Shared Hosting
 * Run this directly with: php83-cli manual-upload-test.php
 */

echo "=== Manual Livewire Upload Test ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

// Test 1: Check Laravel Bootstrap
echo "🔧 Test 1: Laravel Bootstrap\n";
if (!file_exists('bootstrap/app.php')) {
    echo "❌ Laravel bootstrap not found\n";
    exit(1);
}

require_once 'bootstrap/app.php';
$app = \Illuminate\Foundation\Application::getInstance();
echo "✓ Laravel application loaded\n\n";

// Test 2: Check Livewire Configuration
echo "🔧 Test 2: Livewire Configuration\n";
$livewireConfig = config('livewire.temporary_file_upload');
if (!$livewireConfig) {
    echo "❌ Livewire config not found\n";
    exit(1);
}

echo "Disk: " . ($livewireConfig['disk'] ?? 'null') . "\n";
echo "Directory: " . ($livewireConfig['directory'] ?? 'null') . "\n";
echo "Rules: " . implode(', ', $livewireConfig['rules'] ?? []) . "\n";
echo "✓ Livewire configuration loaded\n\n";

// Test 3: Check Storage Disk
echo "🔧 Test 3: Storage Disk Access\n";
try {
    $disk = \Illuminate\Support\Facades\Storage::disk($livewireConfig['disk']);
    $tempDir = $livewireConfig['directory'];
    
    // Create temp directory if it doesn't exist
    if (!$disk->exists($tempDir)) {
        $disk->makeDirectory($tempDir);
        echo "✓ Created temp directory: {$tempDir}\n";
    } else {
        echo "✓ Temp directory exists: {$tempDir}\n";
    }
    
    // Test write permissions
    $testFile = $tempDir . '/test-' . time() . '.txt';
    $disk->put($testFile, 'test content');
    
    if ($disk->exists($testFile)) {
        echo "✓ Can write to temp directory\n";
        $disk->delete($testFile);
        echo "✓ Can delete from temp directory\n";
    } else {
        echo "❌ Cannot write to temp directory\n";
    }
    
} catch (Exception $e) {
    echo "❌ Storage error: " . $e->getMessage() . "\n";
}
echo "\n";

// Test 4: Simulate File Upload Validation
echo "🔧 Test 4: File Upload Validation\n";
try {
    $rules = $livewireConfig['rules'];
    
    // Create a fake file array (simulating $_FILES)
    $fakeFile = [
        'name' => 'test-image.jpg',
        'type' => 'image/jpeg',
        'size' => 1024 * 1024, // 1MB
        'tmp_name' => '/tmp/fake-upload',
        'error' => UPLOAD_ERR_OK
    ];
    
    echo "Simulated file:\n";
    echo "  Name: {$fakeFile['name']}\n";
    echo "  Type: {$fakeFile['type']}\n";
    echo "  Size: " . round($fakeFile['size'] / 1024, 2) . " KB\n";
    
    // Test against max size rule
    $maxSizeRule = null;
    foreach ($rules as $rule) {
        if (strpos($rule, 'max:') === 0) {
            $maxSizeRule = (int) str_replace('max:', '', $rule);
            break;
        }
    }
    
    if ($maxSizeRule) {
        $fileSizeKB = $fakeFile['size'] / 1024;
        if ($fileSizeKB <= $maxSizeRule) {
            echo "✓ File size within limit ({$maxSizeRule} KB)\n";
        } else {
            echo "❌ File size exceeds limit ({$maxSizeRule} KB)\n";
        }
    }
    
    echo "✓ Validation simulation completed\n";
    
} catch (Exception $e) {
    echo "❌ Validation error: " . $e->getMessage() . "\n";
}
echo "\n";

// Test 5: PHP Configuration
echo "🔧 Test 5: PHP Configuration\n";
$phpConfig = [
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size' => ini_get('post_max_size'),
    'max_execution_time' => ini_get('max_execution_time'),
    'memory_limit' => ini_get('memory_limit'),
    'file_uploads' => ini_get('file_uploads') ? 'enabled' : 'disabled',
    'upload_tmp_dir' => ini_get('upload_tmp_dir') ?: 'system default'
];

foreach ($phpConfig as $key => $value) {
    echo "{$key}: {$value}\n";
}

// Check if file uploads are enabled
if (!ini_get('file_uploads')) {
    echo "❌ File uploads are disabled in PHP\n";
} else {
    echo "✓ File uploads are enabled\n";
}
echo "\n";

// Test 6: Disk Space
echo "🔧 Test 6: Disk Space\n";
$storageRoot = storage_path();
$freeBytes = disk_free_space($storageRoot);
$totalBytes = disk_total_space($storageRoot);

if ($freeBytes !== false && $totalBytes !== false) {
    $freeMB = round($freeBytes / 1024 / 1024, 2);
    $totalMB = round($totalBytes / 1024 / 1024, 2);
    $usedPercent = round((($totalBytes - $freeBytes) / $totalBytes) * 100, 1);
    
    echo "Storage path: {$storageRoot}\n";
    echo "Free space: {$freeMB} MB\n";
    echo "Total space: {$totalMB} MB\n";
    echo "Used: {$usedPercent}%\n";
    
    if ($freeMB < 100) {
        echo "⚠️  Low disk space warning\n";
    } else {
        echo "✓ Sufficient disk space\n";
    }
} else {
    echo "❌ Cannot determine disk space\n";
}
echo "\n";

// Test 7: Livewire Route Check
echo "🔧 Test 7: Livewire Routes\n";
try {
    $routes = \Illuminate\Support\Facades\Route::getRoutes();
    $livewireRoutes = [];
    
    foreach ($routes as $route) {
        if (strpos($route->uri(), 'livewire') !== false) {
            $livewireRoutes[] = $route->uri();
        }
    }
    
    if (!empty($livewireRoutes)) {
        echo "✓ Livewire routes found:\n";
        foreach ($livewireRoutes as $route) {
            echo "  - {$route}\n";
        }
    } else {
        echo "❌ No Livewire routes found\n";
    }
    
} catch (Exception $e) {
    echo "❌ Route check error: " . $e->getMessage() . "\n";
}
echo "\n";

echo "=== Test Complete ===\n";
echo "Review the results above to identify any issues with your file upload setup.\n";
