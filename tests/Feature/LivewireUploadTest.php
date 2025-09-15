<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class LivewireUploadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Clear any existing temporary files
        $this->clearLivewireTempFiles();
    }

    protected function tearDown(): void
    {
        // Clean up after tests
        $this->clearLivewireTempFiles();
        parent::tearDown();
    }

    /** @test */
    public function it_can_validate_livewire_temp_upload_configuration()
    {
        $config = Config::get('livewire.temporary_file_upload');
        
        $this->assertNotNull($config, 'Livewire temporary file upload configuration should exist');
        $this->assertEquals('local', $config['disk'], 'Disk should be set to local');
        $this->assertEquals('livewire-tmp', $config['directory'], 'Directory should be livewire-tmp');
        $this->assertContains('required', $config['rules'], 'Rules should include required');
        $this->assertContains('file', $config['rules'], 'Rules should include file validation');
        
        echo "✓ Livewire configuration is valid\n";
    }

    /** @test */
    public function it_can_create_temp_directory_and_check_permissions()
    {
        $disk = Storage::disk('local');
        $tempDir = 'livewire-tmp';
        
        // Ensure directory exists
        if (!$disk->exists($tempDir)) {
            $disk->makeDirectory($tempDir);
        }
        
        $this->assertTrue($disk->exists($tempDir), 'Livewire temp directory should exist');
        
        // Test write permissions by creating a test file
        $testFile = $tempDir . '/permission-test.txt';
        $disk->put($testFile, 'test content');
        
        $this->assertTrue($disk->exists($testFile), 'Should be able to write to temp directory');
        
        // Clean up test file
        $disk->delete($testFile);
        
        echo "✓ Temp directory exists and is writable\n";
    }

    /** @test */
    public function it_can_simulate_livewire_temp_file_upload()
    {
        // Create a fake image file
        $file = UploadedFile::fake()->image('test-upload.jpg', 800, 600)->size(1024); // 1MB
        
        // Get Livewire temp upload configuration
        $config = Config::get('livewire.temporary_file_upload');
        $disk = Storage::disk($config['disk']);
        $directory = $config['directory'];
        
        // Simulate the temporary file storage process
        $tempFileName = 'temp_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $tempPath = $directory . '/' . $tempFileName;
        
        // Store the file in temp directory
        $storedPath = $file->storeAs($directory, $tempFileName, $config['disk']);
        
        $this->assertNotNull($storedPath, 'File should be stored successfully');
        $this->assertTrue($disk->exists($tempPath), 'Temp file should exist in storage');
        
        // Verify file size and type
        $fileSize = $disk->size($tempPath);
        $this->assertGreaterThan(0, $fileSize, 'File should have content');
        $this->assertLessThan(52288 * 1024, $fileSize, 'File should be within size limit'); // 52288 KB
        
        echo "✓ File uploaded successfully to: {$storedPath}\n";
        echo "✓ File size: " . round($fileSize / 1024, 2) . " KB\n";
        
        // Clean up
        $disk->delete($tempPath);
    }

    /** @test */
    public function it_can_test_file_validation_rules()
    {
        $config = Config::get('livewire.temporary_file_upload');
        $rules = $config['rules'];
        
        // Test with valid image
        $validFile = UploadedFile::fake()->image('valid.jpg', 100, 100)->size(100); // 100KB
        $validator = validator(['file' => $validFile], ['file' => $rules]);
        $this->assertFalse($validator->fails(), 'Valid image should pass validation');
        
        // Test with oversized file (if max rule exists)
        $maxSizeRule = collect($rules)->first(function($rule) {
            return str_starts_with($rule, 'max:');
        });
        
        if ($maxSizeRule) {
            $maxSize = (int) str_replace('max:', '', $maxSizeRule);
            $oversizedFile = UploadedFile::fake()->image('large.jpg', 2000, 2000)->size($maxSize + 1);
            $validator = validator(['file' => $oversizedFile], ['file' => $rules]);
            $this->assertTrue($validator->fails(), 'Oversized file should fail validation');
            
            echo "✓ File size validation working (max: {$maxSize} KB)\n";
        }
        
        echo "✓ Validation rules are working correctly\n";
    }

    /** @test */
    public function it_can_test_server_php_limits()
    {
        $uploadMaxFilesize = ini_get('upload_max_filesize');
        $postMaxSize = ini_get('post_max_size');
        $maxExecutionTime = ini_get('max_execution_time');
        $memoryLimit = ini_get('memory_limit');
        
        echo "=== PHP Configuration ===\n";
        echo "upload_max_filesize: {$uploadMaxFilesize}\n";
        echo "post_max_size: {$postMaxSize}\n";
        echo "max_execution_time: {$maxExecutionTime}\n";
        echo "memory_limit: {$memoryLimit}\n";
        
        // Convert to bytes for comparison
        $uploadBytes = $this->convertToBytes($uploadMaxFilesize);
        $postBytes = $this->convertToBytes($postMaxSize);
        
        $this->assertGreaterThan(1024 * 1024, $uploadBytes, 'upload_max_filesize should be at least 1MB');
        $this->assertGreaterThan(1024 * 1024, $postBytes, 'post_max_size should be at least 1MB');
        
        echo "✓ PHP limits are sufficient for file uploads\n";
    }

    /** @test */
    public function it_can_test_storage_disk_configuration()
    {
        $config = Config::get('livewire.temporary_file_upload');
        $diskName = $config['disk'];
        
        $this->assertNotNull($diskName, 'Disk should be configured');
        
        $diskConfig = Config::get("filesystems.disks.{$diskName}");
        $this->assertNotNull($diskConfig, "Disk '{$diskName}' should be configured in filesystems");
        
        $disk = Storage::disk($diskName);
        
        // Test basic disk operations
        $testFile = 'test-disk-operation.txt';
        $disk->put($testFile, 'test content');
        
        $this->assertTrue($disk->exists($testFile), 'Should be able to write to disk');
        $this->assertEquals('test content', $disk->get($testFile), 'Should be able to read from disk');
        
        $disk->delete($testFile);
        $this->assertFalse($disk->exists($testFile), 'Should be able to delete from disk');
        
        echo "✓ Storage disk '{$diskName}' is working correctly\n";
        echo "✓ Disk root: " . $diskConfig['root'] . "\n";
    }

    private function clearLivewireTempFiles(): void
    {
        $config = Config::get('livewire.temporary_file_upload');
        $disk = Storage::disk($config['disk']);
        $directory = $config['directory'];
        
        if ($disk->exists($directory)) {
            $files = $disk->files($directory);
            foreach ($files as $file) {
                $disk->delete($file);
            }
        }
    }

    private function convertToBytes(string $value): int
    {
        $value = trim($value);
        $last = strtolower($value[strlen($value) - 1]);
        $value = (int) $value;

        switch ($last) {
            case 'g':
                $value *= 1024;
            case 'm':
                $value *= 1024;
            case 'k':
                $value *= 1024;
        }

        return $value;
    }
}
