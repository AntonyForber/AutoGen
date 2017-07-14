<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

$sluggable_field = 'num';

$extParams = [
    'timestamp' => false,
    'sluggable' => false,
];
foreach ($tableSchema->columns as $column) {
    if ($column->name == 'created_at' || $column->name == 'updated_at') {
        $extParams['timestamp'] = true;
    }
    if ($column->name == $sluggable_field) {
        $extParams['sluggable'] = true;
    }
}

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
<?php if ($extParams['timestamp']) :?>
use yii\behaviors\TimestampBehavior;
<?php endif; ?>
<?php if ($extParams['sluggable']) :?>
use yii\behaviors\SluggableBehavior;
<?php endif; ?>
<?php if ($moduleNamespace) :?>
use <?= $moduleNamespace?>\Module;
<?php endif; ?>

/**
 * This is the extended model from base class for table "<?= $generator->generateTableName($tableName) ?>".
 */
class <?= $className ?> extends base\Base<?= $className . "\n" ?>
{
<?php if ($extParams['timestamp'] || $extParams['sluggable']): ?>
    public function behaviors()
    {
        return [
<?php if ($extParams['timestamp']) :?>
            TimestampBehavior::className(),
<?php endif; ?>
<?php if ($extParams['sluggable']) :?>
            [
                'class'        => SluggableBehavior::className(),
                'attribute'    => ['name'],
                'immutable'    => true, // don't generate new slug in existing model
                'ensureUnique' => true, // make unique slug
            ],
<?php endif; ?>
        ];
    }
<?php endif; ?>
    
<?php if ($moduleNamespace) :?>
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => Module::t('$moduleTranslateFileName', '" . strtoupper( $className . '_ATTRIBUTE_' . $name . '_LABEL') . "'),\n"?>
<?php endforeach; ?>
        ];
    }
<?php endif; ?>
}
