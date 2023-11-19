<?php
/**
 * This tool is to help generate application directory structure from original yii2 advanced application template.
 * It contains function:
 * + Generate directory structure (not done).
 * + Change some code to new structure.
 * Usage
 * 1. First, copy original yii2-advanced-template into src/app (rename original folder *advanced* to *app*)
 * 2. Run this script from scr/../tools `php genAppStructure.php`
 */

$appDir = '../src/app';

copyDirectory('app', $appDir);

/**
 * Source: https://www.tutorialspoint.com/copy-the-entire-contents-of-a-directory-to-another-directory-in-php
 */
function copyDirectory($source, $destination) {
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    $files = scandir($source);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $sourceFile = $source . '/' . $file;
            $destinationFile = $destination . '/' . $file;
            if (is_dir($sourceFile)) {
                copyDirectory($sourceFile, $destinationFile);
            } else {
                copy($sourceFile, $destinationFile);
            }
        }
    }
}
