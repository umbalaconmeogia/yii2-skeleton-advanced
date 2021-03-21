<?php
/**
 * This tool is to help generate application directory structure from original yii2 advanced application template.
 * It contains function:
 * + Generate directory structure (not done).
 * + Change some code to new structure.
 * Usage
 * 1. First, copy original yii2-advanced-template into src/app (rename original folder *advanced* to *app*)
 * 2. Run this cript from outside of src `php genAppStructure.php`
 */
$appDir = 'src/app';
$yii2Dir = 'src/yii2';

$moveFiles = [
    'composer.json' => 'move',
    'composer.lock' => 'move',
    'vendor' => 'move',
    '.bowerrc' => 'move',
    'LICENSE.md' => 'move',
    'README.md' => 'move',
    '.gitignore' => 'copy',
];
mkdir($yii2Dir);
foreach ($moveFiles as $file => $action) {
    if ($action == 'move') {
        rename("$appDir/$file", "$yii2Dir/$file");
    } else if ($action == 'copy') {
        copy("$appDir/$file", "$yii2Dir/$file");
    } else {
        throw new Exception("Unknown action $action");
    }
}

// Update code path.
$filesToUpdate = [
    'src/app/backend/tests/_bootstrap.php' => [
        "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
        "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/common/config/main.php' => [
        "'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',"
    ],
    'src/app/common/tests/_bootstrap.php' => [
        "require_once __DIR__ .  '/../../vendor/autoload.php';",
        "require_once __DIR__ .  '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/backend/web/index-test.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/backend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/frontend/web/index-test.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/frontend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/yii' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/yii_test' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/backend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/frontend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/yii' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/frontend/tests/_bootstrap.php' => [
        "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
        "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/requirements.php' => [
        "frameworkPath = dirname(__FILE__) . '/vendor/yiisoft/yii2';",
        "dirname(__FILE__) . '/vendor/yiisoft/yii2',",
        "dirname(__FILE__) . '/../../vendor/yiisoft/yii2',",
    ],
];

foreach ($filesToUpdate as $file => $patterns) {
    $fileContent = file_get_contents($file);
    foreach ($patterns as $searchText) {
        $replaceText = str_replace('/vendor', '/../yii2/vendor', $searchText);
        $fileContent = str_replace($searchText, $replaceText, $fileContent, $count);
        if (!$count) {
            echo "ERROR: Don't find $searchText in $file\n";
        }
    }
    file_put_contents($file, $fileContent);
}