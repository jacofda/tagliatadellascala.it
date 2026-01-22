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
echo "📋 Installing SSL certificate..."

# Install certbot if not present
if ! command -v certbot &> /dev/null; then
    echo "📦 Installing certbot..."
    sudo apt install -y certbot python3-certbot-nginx
fi

# Check if domain resolves to this server
echo "🌐 Checking DNS..."
read -p "Have you pointed tagliatadellascala.it to this server? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    echo "🔒 Obtaining SSL certificate..."
    sudo certbot --nginx -d tagliatadellascala.it -d www.tagliatadellascala.it --non-interactive --agree-tos --email admin@tagliatadellascala.it --redirect
    
    if [ $? -eq 0 ]; then
        echo "✅ SSL certificate installed!"
        
        # Test auto-renewal
        echo "🔄 Testing auto-renewal..."
        sudo certbot renew --dry-run
        
        if [ $? -eq 0 ]; then
            echo "✅ Auto-renewal is configured correctly!"
            echo "📅 Certificates will auto-renew via systemd timer"
            sudo systemctl status certbot.timer --no-pager
        fi
    else
        echo "❌ SSL certificate installation failed!"
        echo "💡 You can manually run: sudo certbot --nginx -d tagliatadellascala.it -d www.tagliatadellascala.it"
    fi
else
    echo "⚠️  Skipping SSL installation."
    echo "💡 When ready, run: sudo certbot --nginx -d tagliatadellascala.it -d www.tagliatadellascala.it"
fi

echo ""
echo "✅ Setup complete!"
echo "📝 Certificate renewal is automatic via certbot.timer"
echo "🔍 Check renewal status: sudo certbot renew --dry-run"
