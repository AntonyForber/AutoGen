<?php

use yii\gii\generators\model\Generator;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\model\Generator */

$this->registerJs("
    $('#extendedGenerator-generator #generator-tablename').on('blur', function () {
        var tableName = $(this).val();
        var tablePrefix = $(this).attr('table_prefix') || '';
        if (tablePrefix.length) {
            // if starts with prefix
            if (tableName.slice(0, tablePrefix.length) === tablePrefix) {
                // remove prefix
                tableName = tableName.slice(tablePrefix.length);
            }
        }
        if ($('#generator-modelclass').val() === '' && tableName && tableName.indexOf('*') === -1) {
            var modelClass = '';
            $.each(tableName.split('_'), function() {
                if(this.length>0)
                    modelClass+=this.substring(0,1).toUpperCase()+this.substring(1);
            });
            $('#generator-modelclass').val(modelClass).blur();
        }
    });
    $('#extendedGenerator-generator #generator-modelclass').on('blur', function () {
        var modelClass = $(this).val();
        if (modelClass !== '') {
            var queryClass = $('#generator-queryclass').val();
            if (queryClass === '') {
                queryClass = modelClass + 'Query';
                $('#generator-queryclass').val(queryClass);
            }
        }
    });
    $('#extendedGenerator-generator #generator-ns').on('blur', function () {
        var stickyValue = $('#extendedGenerator-generator .field-generator-queryns .sticky-value');
        var input = $('#extendedGenerator-generator #generator-queryns');
        if (stickyValue.is(':visible') || !input.is(':visible')) {
            var ns = $(this).val();
            stickyValue.html(ns);
            input.val(ns);
        }
    });
    $('#generator-usemoduletranslates').on('change', function () {
        if ($(this).is(':checked')) {
            $('.module-translate-fields').fadeIn();
            $('.module-translate-fields input').attr('disabled', false);
        } else {
            $('.module-translate-fields').fadeOut();
            $('.module-translate-fields input').attr('disabled', true);
        }
    });
");

echo $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]);
echo $form->field($generator, 'modelClass');
echo $form->field($generator, 'ns');
echo $form->field($generator, 'baseClass');
echo $form->field($generator, 'db');
echo $form->field($generator, 'useTablePrefix')->checkbox();
echo $form->field($generator, 'generateRelations')->dropDownList([
    Generator::RELATIONS_NONE => 'No relations',
    Generator::RELATIONS_ALL => 'All relations',
    Generator::RELATIONS_ALL_INVERSE => 'All relations with inverse',
]);
echo $form->field($generator, 'generateLabelsFromComments')->checkbox();
echo $form->field($generator, 'generateQuery')->checkbox();
echo $form->field($generator, 'queryNs');
echo $form->field($generator, 'queryClass');
echo $form->field($generator, 'queryBaseClass');
    echo $form->field($generator, 'enableI18N')->checkbox();
echo $form->field($generator, 'messageCategory');
echo $form->field($generator, 'useSchemaName')->checkbox();

echo $form->field($generator, 'useModuleTranslates')->checkbox([
//    'id' => 'useModuleTranslates-checkbox',
]);
echo '<div class="panel panel-default module-translate-fields" style="display:none; padding: 15px;">';
echo $form->field($generator, 'moduleNamespace')->textInput(['disabled' => true]);
echo $form->field($generator, 'moduleTranslateFileName')->textInput(['disabled' => true]);
echo '</div>';
