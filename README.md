Демо-пример каталога
====================

Демонстрационный пример для [вебинара по связям моделей](http://www.elisdn.ru/blog/89/related-models-on-yii2) в Yii2.

Установка
------

```
git clone https://github.com/ElisDN/yii2-demo-catalog project
cd project
composer global require "fxp/composer-asset-plugin:~1.1.0"
composer install
```

Добавьте файл с настройками базы данных `config/db.php`:

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Выполните миграции:

```
php yii migrate
```

Загрузите демонстрационные данные:

```
php yii fixture/load '*' --namespace='app\fixtures'
```
