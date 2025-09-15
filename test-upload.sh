#!/bin/bash

# Livewire File Upload Test Script for SSH
# Run this script on your shared hosting server to test file upload functionality

echo "=== Livewire File Upload Test ==="
echo "Testing on: $(hostname)"
echo "Date: $(date)"
echo ""

# Change to your Laravel project directory
cd ~/public_html/artgarden || {
    echo "❌ Error: Could not change to Laravel project directory"
    echo "Please update the path in this script"
    exit 1
}

echo "📁 Current directory: $(pwd)"
echo ""

# Check if Laravel is properly installed
if [ ! -f "artisan" ]; then
    echo "❌ Error: artisan file not found. Are you in the Laravel root directory?"
    exit 1
fi

echo "🔧 Clearing caches..."
php83-cli artisan config:clear
php83-cli artisan cache:clear
php83-cli artisan route:clear
php83-cli artisan view:clear

# Check if livewire:clear-cached command exists
if php83-cli artisan list | grep -q "livewire:clear-cached"; then
    php83-cli artisan livewire:clear-cached
    echo "✓ Livewire cache cleared"
else
    echo "⚠️  livewire:clear-cached command not available"
fi

echo ""

# Run the comprehensive upload test
echo "🧪 Running Livewire upload tests..."
php83-cli artisan test tests/Feature/LivewireUploadTest.php --verbose

echo ""
echo "📊 Additional System Information:"

# Check PHP configuration
echo "PHP Version: $(php -v | head -n 1)"
echo "upload_max_filesize: $(php -r 'echo ini_get("upload_max_filesize");')"
echo "post_max_size: $(php -r 'echo ini_get("post_max_size");')"
echo "max_execution_time: $(php -r 'echo ini_get("max_execution_time");')"
echo "memory_limit: $(php -r 'echo ini_get("memory_limit");')"

echo ""

# Check storage permissions
echo "📁 Storage directory permissions:"
ls -la storage/
echo ""
ls -la storage/app/

echo ""

# Check if livewire-tmp directory exists and its permissions
if [ -d "storage/app/livewire-tmp" ]; then
    echo "📁 Livewire temp directory exists:"
    ls -la storage/app/livewire-tmp/
else
    echo "📁 Creating livewire-tmp directory..."
    mkdir -p storage/app/livewire-tmp
    chmod 755 storage/app/livewire-tmp
    echo "✓ Directory created"
fi

echo ""

# Test file creation in temp directory
echo "🔧 Testing file creation in temp directory..."
TEST_FILE="storage/app/livewire-tmp/test-$(date +%s).txt"
echo "test content" > "$TEST_FILE"

if [ -f "$TEST_FILE" ]; then
    echo "✓ Can create files in temp directory"
    rm "$TEST_FILE"
    echo "✓ Can delete files from temp directory"
else
    echo "❌ Cannot create files in temp directory - check permissions"
fi

echo ""

# Check disk space
echo "💾 Disk space:"
df -h .

echo ""

# Test a simple PHP upload simulation
echo "🧪 Testing PHP file upload simulation..."
php -r '
$tempFile = tempnam(sys_get_temp_dir(), "upload_test");
file_put_contents($tempFile, str_repeat("x", 1024 * 1024)); // 1MB file

$uploadedFile = [
    "name" => "test.jpg",
    "type" => "image/jpeg", 
    "tmp_name" => $tempFile,
    "error" => UPLOAD_ERR_OK,
    "size" => filesize($tempFile)
];

echo "Simulated upload file size: " . round($uploadedFile["size"] / 1024, 2) . " KB\n";

// Test against PHP limits
$maxFilesize = ini_get("upload_max_filesize");
$maxPost = ini_get("post_max_size");

echo "Max filesize limit: $maxFilesize\n";
echo "Max post size limit: $maxPost\n";

// Clean up
unlink($tempFile);
echo "✓ PHP upload simulation completed\n";
'

echo ""
echo "=== Test Complete ==="
echo "If you see any errors above, they indicate the source of your upload issues."
echo "Focus on fixing permission issues, PHP limits, or directory creation problems."
