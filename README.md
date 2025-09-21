<p align="center"><h1 align="center">Web-Based Decision Support System</h1><br /></p>

<b>The Decision Support System (DSS)</b> is a web-based application for decision support making using classical multi criteria methods (e.g., ARAMIS).

DSS is based on the [PHP 7](https://www.php.net/releases/7_0_0.php) and the [Yii 2 Framework](http://www.yiiframework.com/).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers) for creation of langs and users by default
      components/         contains basic components for a language engine and a solver (ARAMIS method) class
      config/             contains application configurations (db, web)
      messages/           contains localization files for Russian and English
      migrations/         contains all migrations for database
      modules/            contains single main module:
          main/           contains models, views and controllers for DSS
      web/                contains the css-scripts, images and other web resources


REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports <b>PHP 7.0</b> and <b>PostgreSQL 9.0</b>.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=dssproject;',
    'username' => 'postgres',
    'password' => 'root',
    'charset' => 'utf8',
    'tablePrefix' => 'dssproject_',
    'schemaMap' => [
        'pgsql'=> [
            'class'=>'yii\db\pgsql\Schema',
            'defaultSchema' => 'public'
        ]
    ],
];
```

**NOTES:**
- DSS won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.