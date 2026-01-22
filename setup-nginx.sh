#!/bin/bash

echo "🔧 Setting up Nginx reverse proxy..."

# Install nginx if not present
if ! command -v nginx &> /dev/null; then
    echo "📦 Installing Nginx..."
    sudo apt update
    sudo apt install -y nginx
fi

# Copy nginx configuration
echo "📝 Installing nginx configuration..."
sudo cp nginx-reverse-proxy.conf /etc/nginx/sites-available/tagliatadellascala.it

# Enable site
echo "🔗 Enabling site..."
sudo ln -sf /etc/nginx/sites-available/tagliatadellascala.it /etc/nginx/sites-enabled/

# Remove default site if exists
sudo rm -f /etc/nginx/sites-enabled/default

# Test nginx configuration
echo "✅ Testing nginx configuration..."
sudo nginx -t

# Restart nginx
if [ $? -eq 0 ]; then
    echo "🔄 Restarting nginx..."
    sudo systemctl restart nginx
    sudo systemctl enable nginx
    echo "✅ Nginx reverse proxy setup complete!"
else
    echo "❌ Nginx configuration test failed!"
    exit 1
fi

echo ""
echo "📋 Next steps:"
echo "  1. Make sure your domain points to this server"
echo "  2. Install SSL certificate with: sudo certbot --nginx -d tagliatadellascala.it -d www.tagliatadellascala.it"
