# Secure PHP Symlink Creator

A lightweight, secure PHP utility designed to create symbolic links (symlinks) on shared hosting environments where SSH/terminal access is unavailable. 

Creating symlinks via the web interface can be a security risk if left exposed. This script mitigates that risk by requiring a secret token, validating paths, and providing clear error reporting.

## ✨ Features

- 🔒 **Token Authentication:** Prevents unauthorized access and bot scanning via a secret URL parameter.
- ✅ **Path Validation:** Checks if the target directory exists and ensures the destination isn't already occupied.
- 🐛 **Detailed Error Reporting:** Tells you exactly why a symlink failed (e.g., disabled functions, permission issues).
- 🪶 **Lightweight:** Single-file script, no dependencies or frameworks required.

## ⚠️ Security Warning

**This script is a temporary utility.** It should be uploaded to your server, used exactly once, and **IMMEDIATELY DELETED** via your File Manager or FTP. Leaving this script on your server poses a severe security risk, even with token protection.

## 🚀 Usage

1. **Download** `create_symlink.php` from this repository.
2. **Open the file** in a text editor and change the `$secret_token` variable to a strong, unique password:
   ```php
   $secret_token = 'ChangeThisToSomethingStrongAndUnique!';
