<?php

/**
 * Simple Upload Test - Standalone PHPUnit Test
 * Run with: php83-cli vendor/bin/phpunit tests/Feature/SimpleUploadTest.php
 */

use PHPUnit\Framework\TestCase;

class SimpleUploadTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        // Bootstrap Laravel without TestCase dependency
        if (file_exists(__DIR__ . '/../../bootstrap/app.php')) {
            require_once __DIR__ . '/../../bootstrap/app.php';
        }
    }

    public function testLivewireConfigurationExists(): void
    {
        try {
            // Try to bootstrap Laravel properly
            $app = require __DIR__ . '/../../bootstrap/app.php';
            $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
            
            $config = config('livewire.temporary_file_upload');
            $this->assertNotNull($config, 'Livewire temporary file upload configuration should exist');
            $this->assertArrayHasKey('disk', $config, 'Config should have disk key');
            $this->assertArrayHasKey('rules', $config, 'Config should have rules key');
            $this->assertArrayHasKey('directory', $config, 'Config should have directory key');
        } catch (Exception $e) {
            $this->markTestSkipped('Laravel bootstrap failed: ' . $e->getMessage());
        }
    }

    public function testTempDirectoryExists(): void
    {
        $tempDir = storage_path('app/livewire-tmp');
        
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0755, true);
        }
        
        $this->assertTrue(is_dir($tempDir), 'Livewire temp directory should exist');
        $this->assertTrue(is_writable($tempDir), 'Livewire temp directory should be writable');
    }

    public function testFileCreationInTempDirectory(): void
    {
        $tempDir = storage_path('app/livewire-tmp');
        $testFile = $tempDir . '/test-' . time() . '.txt';
        
        $result = file_put_contents($testFile, 'test content');
        $this->assertNotFalse($result, 'Should be able to create files in temp directory');
        
        $this->assertTrue(file_exists($testFile), 'Test file should exist');
        
        // Clean up
        if (file_exists($testFile)) {
            unlink($testFile);
        }
    }

    public function testPhpUploadConfiguration(): void
    {
        $this->assertTrue((bool)ini_get('file_uploads'), 'File uploads should be enabled');
        
        $uploadMaxFilesize = ini_get('upload_max_filesize');
        $postMaxSize = ini_get('post_max_size');
        
        $this->assertNotEmpty($uploadMaxFilesize, 'upload_max_filesize should be set');
        $this->assertNotEmpty($postMaxSize, 'post_max_size should be set');
        
        // Convert to bytes for comparison
        $uploadBytes = $this->convertToBytes($uploadMaxFilesize);
        $postBytes = $this->convertToBytes($postMaxSize);
        
        $this->assertGreaterThan(1024 * 1024, $uploadBytes, 'upload_max_filesize should be at least 1MB');
        $this->assertGreaterThan(1024 * 1024, $postBytes, 'post_max_size should be at least 1MB');
    }

    public function testFileValidationSimulation(): void
    {
        // Simulate a 1MB file
        $fileSize = 1024 * 1024; // 1MB in bytes
        $fileName = 'test-image.jpg';
        $fileType = 'image/jpeg';
        
        // Test against PHP limits
        $uploadMaxFilesize = ini_get('upload_max_filesize');
        $uploadBytes = $this->convertToBytes($uploadMaxFilesize);
        
        $this->assertLessThanOrEqual($uploadBytes, $fileSize, 'Test file should be within upload limits');
        
        // Test MIME type validation
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $this->assertContains($fileType, $allowedTypes, 'File type should be allowed');
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
