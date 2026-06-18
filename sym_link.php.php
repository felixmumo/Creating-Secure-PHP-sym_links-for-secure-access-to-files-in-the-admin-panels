<?php
// 1. SECURITY: Set a secret token. You will need to pass this in the URL.
$secret_token = 'MySuperSecretPassword123!'; 

// Check if the token is provided and correct
if (!isset($_GET['token']) || $_GET['token'] !== $secret_token) {
    die('Unauthorized access. Please provide a valid token.');
}

$target = $_SERVER['DOCUMENT_ROOT'] . '/admin/uploads';
$link   = $_SERVER['DOCUMENT_ROOT'] . '/uploads';

// 2. CHECK: Does the target folder actually exist?
if (!file_exists($target)) {
    die("Error: The target directory ($target) does not exist.");
}

// 3. CHECK: Does the link destination already exist?
if (file_exists($link) || is_link($link)) {
    die("Error: The destination ($link) already exists as a file or folder. Please delete or rename it first.");
}

// 4. ATTEMPT: Create the symlink
if (symlink($target, $link)) {
    echo "<h3>Symlink created successfully!</h3>";
    echo "<p><strong>Target:</strong> $target</p>";
    echo "<p><strong>Link:</strong> $link</p>";
    echo "<p style='color:red;'><strong>IMPORTANT:</strong> Delete this script from your server immediately via your File Manager!</p>";
} else {
    echo "<h3>Failed to create symlink.</h3>";
    echo "<p>This usually happens because your hosting provider has disabled the <code>symlink()</code> function for security reasons, or due to folder permission issues.</p>";
    
    // Show the specific PHP error for debugging
    $error = error_get_last();
    if ($error) {
        echo "<p><strong>Error Details:</strong> " . htmlspecialchars($error['message']) . "</p>";
    }
}
?>