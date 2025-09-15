#!/bin/bash

# Livewire File Upload Test Script for SSH
# Run this script on your shared hosting server to test file upload functionality

echo "=== Deploy Script ==="
echo "Deployed on: $(hostname)"
echo "Date: $(date)"
echo ""

# Change to your Laravel project directory
cd ~/public_html/artgarden || {
    echo "❌ Error: Could not change to Laravel project directory"
    echo "Please update the path in this script"
    exit 1
}




echo "🔧 Running git pull..."
git pull origin main


echo "🔧 Running composer install..."
composer install --no-dev --prefer-dist --optimize-autoloader


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
