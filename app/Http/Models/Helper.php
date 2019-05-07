<?php

namespace AntonyForber\AutoGen\Http\Models;

class Helper
{
    public static function getGeneratorsList()
    {
        return [
            [
                'name' => 'Генератор моделей',
                'description' => 'Этот генератор создает модель для указанной таблицы базы данных.',
                'link' => route('autogen.model.create'),
                'disable' => false,
            ],
            [
                'name' => 'Генератор CRUD',
                'description' => 'Этот генератор создает контроллер, представления и другие файлы, которые реализуют операции CRUD (создание, чтение, обновление, удаление) для указанной модели данных.',
                'link' => route('autogen.crud.create'),
                'disable' => false,
            ],
            [
                'name' => 'Генератор модулей',
                'description' => 'Этот генератор помогает вам создать скелет, необходимый для модуля.',
                'link' => route('autogen.module.create'),
                'disable' => false,
            ],
            [
                'name' => 'Генератор виджетов',
                'description' => 'Этот генератор поможет вам создать файлы, необходимые для front-end виджета',
                'link' => route('autogen.widget.create'),
                'disable' => true,
            ],
        ];
    }
}
