# External packages

## Packages

| Package | Description |
|---|---|
| [yiisoft/yii2-authclient](https://github.com/yiisoft/yii2-authclient) | For login with Google |
| [umbalaconmeogia/yii2-batsg](https://github.com/umbalaconmeogia/yii2-batsg) | Common functions while developing using yii2 |
| [giannisdag/yii2-check-login-attempts](https://github.com/giannisdag/yii2-check-login-attempts) | Prevent brute force login |

## Running migration

### giannisdag/yii2-check-login-attempts

```shell
php yii migrate --migrationPath="@vendor/giannisdag/yii2-check-login-attempts/src/migrations"  --interactive=0
```