# yii2-skeleton-advanced

Application skeleton based on yii2 framework advanced template version 2.0.41.

## Overview

This is the source code template of yii2 application, modified from the original yii2 advanced application template.

What I do in this modified version is moving the vendor folder outsite of the main application directory.

Why do this?

The main reason is for faster searching text while developing.
When we search for text in files of the application, we don't want to search in the yii2 core and dependencies' code, which are put in *vendor* directory in the application root.
So we want to move the *vendor* directory outside the main application directory.

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