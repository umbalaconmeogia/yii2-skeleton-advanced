# yii2-skeleton-advanced

Application skeleton based on yii2 framework advanced template version 2.0.41.

This is for my own development.

## Overview

This is the source code template of yii2 application, modified from the original yii2 advanced application template.

What I do in this modified version is moving the vendor folder outsite of the main application directory.

Why do this?

The main reason is for faster searching text while developing.
When we search for text in files of the application, we don't want to search in the yii2 core and dependencies' code, which are put in *vendor* directory in the application root.
So we want to move the *vendor* directory outside the main application directory.

This skeleton contains the following change from the original code.
1. Change directory structure.
1. Separate menu code from *frontend/views/layouts/main.php* to *frontend/views/layouts/_menu.php*.
1. Allow to change to full width screen by setting `$this->params['fluid'] = TRUE;` in view file.
1. Display message about running environtment at the screen top left corner by setting `environtmentNotice` in *common\config\params-local.php*.

TODO
1. Add Login with google.
2. Move environtmentNotice into yii2-batsg.

## Directory structure

Assume that the yii2 application source code is put in the directory *app*. The *vendor* should be move into the directory *yii2* which is at same level to *app*.

The structure of the source code will be as following:
```
| src/
| -- app/
     | -- backend/
     | -- common/
     | -- console/
     | -- environments/
     | -- frontend/
     | -- vagrant/
     | -- codeception.yml
     | -- init
     | -- init.bat
     | -- requirements.php
     | -- Vagrantfile
     | -- yii.bat
| -- yii2/
     | -- vendor/
     | -- .bowerrc
     | -- .gitignore
     | -- composer.json
     | -- composer.lock
     | -- LICENSE.md
     | -- README.md
```

This directory structure is creation is described [here](docs/directoryStructure.md).