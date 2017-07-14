# AutoGen

# Installation

The preferred way to install this extension is through composer.

Either run
```
$ php composer.phar require "antony-forber/autogen:@dev"
```
or add
```
"antony-forber/autogen": "@dev"
```
to the require section of your composer.json file.

# Config

Update
```
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
];
```
to the next
```
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'generators' => [
        'extendedGenerator' => [
            'class' => 'AntonyForber\gii\model\Generator'
        ],
    ],
];
```
