## Update SiteController

### Add '/auth' action in function actions()

```php
'auth' => [
    'class' => 'yii\authclient\AuthAction',
    'successCallback' => ['umbalaconmeogia\systemuser\helpers\AuthHandler', 'onAuthSuccess'],
],
```

### Change view file of actionLogin()

```php
return $this->render('@vendor/umbalaconmeogia/yii2-systemuser/src/views/login', [
    'model' => $model,
]);
```