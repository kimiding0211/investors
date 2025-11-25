<?php
/**
 * Create CKFinder required directories
 * Run this file once to create all necessary directories
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Creating CKFinder Directories</h2>";

$baseDir = __DIR__;
$directories = [
    '.ckfinder',
    '.ckfinder/tags',
    '.ckfinder/logs',
    '.ckfinder/cache',
    '.ckfinder/cache/thumbs',
    'upload',
    'upload/files',
    'upload/images'
];

foreach ($directories as $dir) {
    $fullPath = $baseDir . '/' . $dir;
    
    if (!is_dir($fullPath)) {
        if (mkdir($fullPath, 0777, true)) {
            echo "<p style='color: green;'>✓ Created: $dir</p>";
            chmod($fullPath, 0777);
        } else {
            echo "<p style='color: red;'>✗ Failed to create: $dir</p>";
        }
    } else {
        echo "<p style='color: blue;'>→ Already exists: $dir</p>";
        chmod($fullPath, 0777);
    }
}

echo "<h3>Verification</h3>";
foreach ($directories as $dir) {
    $fullPath = $baseDir . '/' . $dir;
    $exists = is_dir($fullPath);
    $writable = is_writable($fullPath);
    
    echo "<p>$dir: ";
    echo "Exists: " . ($exists ? 'YES' : 'NO') . " | ";
    echo "Writable: " . ($writable ? 'YES' : 'NO');
    echo "</p>";
}

echo "<h3>Done!</h3>";
echo "<p><a href='environmental_sustainability_edit.php?id=1'>Go back to edit page</a></p>";
?>
