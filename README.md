Yii Woocommerce Catalog
=======================
Create a PDF catalog of your store to send to your clients through whatsapp

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist inquid/yii-woocommerce-catalog "dev-master"
```

or add

```
"inquid/yii-woocommerce-catalog": "dev-master"
```

to the require section of your `composer.json` file.

Configure in your config file:
```
$config = [
     // ...
    'components' => [
        'yiiwoocatalog' => [
            'class' => 'inquid\yiiwoocatalog\CreateCatalog',
            'domain' => 'DOMAIN...',
            'key' => 'KEY...',
            'secret' => 'SECRET...',
        ],
```

Usage
-----

Once the extension is installed, simply use it in your controller action  :

```php
<?= Yii::$app->yiiwoocatalog->getPdf(); ?>
```