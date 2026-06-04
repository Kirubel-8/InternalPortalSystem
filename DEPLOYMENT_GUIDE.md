# Quick Start Guide for Production Deployment

## ⚡ Critical Steps Before Going Live

### Step 1: Update Environment Configuration
Edit `.env` file:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
FILESYSTEM_DISK=public
```

### Step 2: Create Storage Symlink
Run this command to ensure images display properly:
```bash
php artisan storage:link
```

This creates: `public/storage → storage/app/public`

### Step 3: Clear and Cache Configuration
```bash
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 4: Run Migrations
If this is a fresh deployment:
```bash
php artisan migrate --force
```

### Step 5: Set Proper Permissions
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
chmod 755 public/storage
```

## 🔒 Security Checklist

- [ ] APP_DEBUG is set to false
- [ ] APP_KEY is set and strong
- [ ] Database password is strong
- [ ] HTTPS/SSL is enabled
- [ ] File permissions are correct
- [ ] .env file is not in version control
- [ ] Sensitive files are not publicly accessible

## 📸 Image Upload & Display

### How It Works:
1. User uploads image → File stored in `storage/app/public/images/`
2. Database stores: `images/uuid-filename.ext` (relative path)
3. Display in Blade: `{{ asset('storage/' . $post->image) }}`
4. Result: URL becomes `https://domain.com/storage/images/uuid-filename.ext`

### If Images Don't Display:
1. Verify symlink exists: `ls -la public/storage`
2. Check permissions: `chmod 755 storage/app/public`
3. Verify APP_URL is correct
4. Check browser console for 404 errors

## 👤 Authentication

### Login Improvements:
- Email validation
- Password hashing with Laravel's built-in encryption
- CSRF protection on all forms
- Remember me functionality
- Session management

### Registration Improvements:
- Strong password requirements (8+ chars, uppercase, lowercase, numbers, special chars)
- Email uniqueness validation
- Name validation (letters and spaces only)
- Password confirmation
- Password strength indicator

## 📝 Announcements & Services

### Features:
- Create announcements with optional images
- Edit announcements and images
- Delete with automatic image cleanup
- Bulk delete functionality
- Image preview in modals
- Proper pagination
- Success/error messages

### File Limits:
- Max 5MB per image
- Allowed formats: JPEG, PNG, GIF, WebP

## 🚀 Deployment Commands Checklist

```bash
# 1. Update environment
nano .env  # or edit via your hosting control panel

# 2. Install/update dependencies
composer install --optimize-autoloader --no-dev

# 3. Create storage symlink
php artisan storage:link

# 4. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Run migrations (if needed)
php artisan migrate --force

# 6. Set permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
chmod 755 public/storage

# 7. Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📊 Database

Ensure these tables exist:
- `users` - Authentication
- `posts` - Announcements
- `systems` - Services

Check migrations are run:
```bash
php artisan migrate:status
```

## 🔍 Testing in Production

1. **Test Login**: Try logging in with test credentials
2. **Test Registration**: Create a new account
3. **Test Announcements**: 
   - Create announcement with image
   - Verify image displays
   - Edit and verify changes
   - Delete and verify cleanup
4. **Test Services**:
   - Add service with image
   - Verify URL is clickable
   - Test edit and delete

## 📞 Support & Troubleshooting

### Common Issues:

**Issue**: Images not displaying
- Solution: Run `php artisan storage:link`

**Issue**: 404 errors on images
- Solution: Check APP_URL in .env, verify symlink exists

**Issue**: Permission denied when uploading
- Solution: `chmod 775 storage/`

**Issue**: Form submission errors
- Solution: Clear browser cache, check CSRF token

## 🎯 Next Steps

1. Deploy code to production server
2. Update database connection in .env
3. Run migrations
4. Create storage symlink
5. Set proper permissions
6. Test all functionality
7. Monitor logs for errors

## 📚 Additional Resources

- Production Configuration: `PRODUCTION_IMPROVEMENTS.md`
- Laravel Documentation: https://laravel.com/docs/10
- Security Best Practices: https://laravel.com/docs/10/security

---

**Last Updated**: June 2, 2026
**Version**: 1.0
