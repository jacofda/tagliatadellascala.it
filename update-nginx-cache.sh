#!/bin/bash
# Script to update nginx configuration with FPC on the server

echo "🔧 Updating nginx configuration with Full Page Cache..."

# Create cache directory
sudo mkdir -p /var/cache/nginx/tagliatadellascala
sudo chown -R www-data:www-data /var/cache/nginx/tagliatadellascala

# Copy new config
sudo cp /var/www/tagliatadellascala.it/nginx-reverse-proxy.conf /etc/nginx/sites-available/tagliatadellascala.it

# Test configuration
sudo nginx -t

if [ $? -eq 0 ]; then
    echo "✅ Config valid, reloading nginx..."
    sudo systemctl reload nginx
    echo "✅ Cache enabled!"
    echo ""
    echo "📊 Check cache status with: curl -I https://tagliatadellascala.it"
    echo "   Look for 'X-Cache-Status' header (HIT/MISS/BYPASS)"
    echo ""
    echo "🗑️  Clear cache with: sudo rm -rf /var/cache/nginx/tagliatadellascala/*"
else
    echo "❌ Config test failed!"
    exit 1
fi
