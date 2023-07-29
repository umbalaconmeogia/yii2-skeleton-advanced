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
$yii2Dir = '../src/yii2';

$appStructure = new AppStructure($appDir, $yii2Dir);
$appStructure->generate();

class AppStructure
{
    private $moveFiles = [
        'vendor' => 'move',
        'composer.json' => 'move',
        'composer.lock' => 'move',
        '.bowerrc' => 'move',
        'LICENSE.md' => 'move',
        'README.md' => 'move',
        '.gitignore' => 'copy',
    ];

    // Update code path.
    private $filesToUpdate = [
        'requirements.php' => [
            "frameworkPath = dirname(__FILE__) . '/vendor/yiisoft/yii2';",
            "dirname(__FILE__) . '/vendor/yiisoft/yii2',",
            "dirname(__FILE__) . '/../../vendor/yiisoft/yii2',",
        ],
        'backend/tests/_bootstrap.php' => [
            "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
            "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
        ],
        'common/config/main.php' => [
            "'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',"
        ],
        'common/tests/_bootstrap.php' => [
            "require_once __DIR__ .  '/../../vendor/autoload.php';",
            "require_once __DIR__ .  '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/backend/web/index-test.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/backend/web/index.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/frontend/web/index-test.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/frontend/web/index.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/yii' => [
            "require __DIR__ . '/vendor/autoload.php';",
            "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/dev/yii_test' => [
            "require __DIR__ . '/vendor/autoload.php';",
            "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/prod/backend/web/index.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/prod/frontend/web/index.php' => [
            "require __DIR__ . '/../../vendor/autoload.php';",
            "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
        ],
        'environments/prod/yii' => [
            "require __DIR__ . '/vendor/autoload.php';",
            "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
        ],
        'frontend/tests/_bootstrap.php' => [
            "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
            "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
        ],
    ];

    /**
     * @var string
     */
    private $appDir;

    /**
     * @var string
     */
    private $yii2Dir;

    /**
     * @param string $appDir Folder that contain original yii2 advanced template files.
     * @param string $yii2Dir Folder to move yii2 framework file.
     */
    public function __construct($appDir, $yii2Dir)
    {
        $this->appDir = $appDir;
        $this->yii2Dir = $yii2Dir;
    }

    public function generate()
    {
        $this->moveFiles();
        $this->updateFileContent();
    }

    private function moveFiles()
    {
        @ mkdir($this->yii2Dir);
        foreach ($this->moveFiles as $file => $action) {
            $sourceFile = "{$this->appDir}/$file";
            $destFile = "{$this->yii2Dir}/$file";
            if ($action == 'move') {
                rename($sourceFile, $destFile);
            } else if ($action == 'copy') {
                copy($sourceFile, $destFile);
            } else {
                throw new Exception("Unknown action $action");
            }
        }
        $initReverse = 'init-reverse';
        copy($initReverse, "{$this->appDir}/$initReverse");
    }

    private function updateFileContent()
    {
        foreach ($this->filesToUpdate as $fileName => $patterns) {
            $file = "{$this->appDir}/$fileName";
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
    }
}
