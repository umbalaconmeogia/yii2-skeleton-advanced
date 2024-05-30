# detomo.work development

## Database

* Create DB schema
* Backup DB
* Restore DB

## Install

* Install on development environtment
* Install on production environtment

## Configuration
* Use sqlite
```php
    'dsn' => 'sqlite:@common/../../data/db.sqlite',
```

## Start server in dev environtment

Run command
```shell
   php yii serve --docroot=frontend/web
```
then access to http://localhost:8080/