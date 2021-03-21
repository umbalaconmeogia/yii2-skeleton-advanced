# Directory structure

This document describes about:
1. The new structure of the source code.
1. Where to download the new source code.
1. Working with this new directory structure

## Create new directory structure from original yii2-advanced-template

All action below can be performed by running script `genAppStructure.php`
```
php genAppStructure.php
```

### Move *vendor* diretory outside *app* directory

* Create *yii2* directory at the same level of *app* directory.
* Move *composer.json*, *composer.lock* and *vendor* from *app* into this *yii2* directory.
* Also move *.bowerrc*, *LICENSE.md*, *README.md* from *app* into this *yii2* directory.
* Copy *.gitignore* from *app* to *yii2* directory.
* Update path to *vendor* directory in relative files as described below.

### Update path to *vendor* directory
Update path of */vendor* directory to */../yii2/vendor* in files below.

You can perform this work by running *genAppStructure.2.0.36.php*, which is put in the same directory with this README.md file.

1. File *src/app/backend/tests/_bootstrap.php*
    ```php
    require_once YII_APP_BASE_PATH . '/../yii2/vendor/autoload.php';
    require_once YII_APP_BASE_PATH . '/../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/common/config/main.php*
    ```php
    'vendorPath' => dirname(dirname(__DIR__)) . '/../yii2/vendor',
    ```
1. File *src/app/common/tests/_bootstrap.php*
    ```php
    require_once __DIR__ .  '/../../../yii2/vendor/autoload.php';
    require_once __DIR__ .  '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/backend/web/index-test.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/backend/web/index.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/frontend/web/index-test.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/frontend/web/index.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/yii*
    ```php
    require __DIR__ . '/../yii2/vendor/autoload.php';
    require __DIR__ . '/../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/dev/yii_test*
    ```php
    require __DIR__ . '/../yii2/vendor/autoload.php';
    require __DIR__ . '/../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/prod/backend/web/index.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/prod/frontend/web/index.php*
    ```php
    require __DIR__ . '/../../../yii2/vendor/autoload.php';
    require __DIR__ . '/../../../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/environments/prod/yii*
    ```php
    require __DIR__ . '/../yii2/vendor/autoload.php';
    require __DIR__ . '/../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/frontend/tests/_bootstrap.php*
    ```php
    require_once YII_APP_BASE_PATH . '/../yii2/vendor/autoload.php';
    require_once YII_APP_BASE_PATH . '/../yii2/vendor/yiisoft/yii2/Yii.php';
    ```
1. File *src/app/requirements.php*
    ```php
        $frameworkPath = dirname(__FILE__) . '/vendor/yiisoft/yii2';
		dirname(__FILE__) . '/../yii2/vendor/yiisoft/yii2',
		dirname(__FILE__) . '/../../../yii2/vendor/yiisoft/yii2',
    ```

## Source code of new directory structure

You can download the source code of new directory structure from this [src](./src) folder.

To keep the source code small, it does not contain the *vendor* directory. Run the commands bellow to make it download necessary dependencies.
```shell
composer global require "fxp/composer-asset-plugin"
composer install
```

If it's difficult to install dependencies via *composer*, you can extract the *vendor* directory from the [yii2 advanced application template archive file](https://github.com/yiisoft/yii2/releases/download/2.0.36/yii-advanced-app-2.0.36.tgz), and copy it to *yii2* directory.

## Working with this new directory structure

* Go into *yii2* directory and run
  ```shell
  composer install
  ```
  to create *vendor* directory and download dependencies (if you use the source code download from this repository). If you extract the *vendor* directory from archive file, running `composer install` is not necessary.
* If you want to install new dependencies, invoke `composer` commands in *yii2* directory, not in *app* directory.
* Before developing with yii2 advanced application template, run `init` command in *app* directory (select environment such as Development etc). Refer [installation document](https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation) for another configuration.
* When create a PHP project in Eclipse IDE, it's good to select *src* directory as project location, so that Eclipse can refer to the code in *vendor*. The *.gitignore* in *src* will prevent the commiting of eclipse project files to git repository.