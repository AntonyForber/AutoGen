@extends('AutoGen::layouts.form')

@section('layout-body')
    




    <div class="default-view">
        <h1>Генератор моделей</h1>

        <p>Этот генератор создает модели для указанных таблиц базы данных.</p>

        {!! Form::open() !!}
            
            <div class="row">
                <div class="col-lg-8 col-md-10" id="form-fields">
                    <div class="module-form">
                        
                        <div class="form-group">
                            {!! Form::label('table_name', 'Название таблицы в БД', ['class' => 'control-label']) !!}
                            {!! Form::text('table_name', null, ['class' => 'form-control']) !!}
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::label('table_translates_name', 'Название таблицы переводов в БД', ['class' => 'control-label']) !!}
                            {!! Form::text('table_translates_name', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('module', 'Модуль', ['class' => 'control-label']) !!}
                            {!! Form::text('module', null, ['class' => 'form-control']) !!}
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::label('model', 'Название модели', ['class' => 'control-label']) !!}
                            {!! Form::text('model', null, ['class' => 'form-control']) !!}
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::label('fillable', 'Заполняемые поля', ['class' => 'control-label']) !!}
                            {!! Form::text('fillable', null, ['class' => 'form-control']) !!}
                        </div> 
                        <div class="form-group">
                            {!! Form::label('fillable_translates', 'Заполняемые поля (таблицы переводов)', ['class' => 'control-label']) !!}
                            {!! Form::text('fillable_translates', null, ['class' => 'form-control']) !!}
                        </div> 
                        
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('image', null) !!}
                                    <b>Необходима загрузка изображения?</b>
                                </label>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::label('image_field', 'Аттрибут name для формы', ['class' => 'control-label']) !!}
                            {!! Form::text('image_field', null, ['class' => 'form-control']) !!}
                        </div> 
                        <div class="form-group">
                            {!! Form::label('image_folder', 'Имя папки для изображений', ['class' => 'control-label']) !!}
                            {!! Form::text('image_folder', null, ['class' => 'form-control']) !!}
                        </div> 
<!--                        
                        <div class="form-group">
                            {!! Form::label('alias', 'Алиас модуля', ['class' => 'control-label']) !!}
                            {!! Form::text('alias', null, ['class' => 'form-control']) !!}
                        </div> 
                        @foreach (config('langs.list-for-admin', []) as $slug => $data)
                            <div class="form-group">
                                {!! Form::label('alias', 'Имя для страницы доступов по ролям (' . $data['name'] . ')', ['class' => 'control-label']) !!}
                                {!! Form::text('permissions['.$slug.']', null, ['class' => 'form-control']) !!}
                            </div> 
                        @endforeach
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('site_parts', null, true) !!}
                                    <b>Будут ли в модуле front-составляющие части?</b>
                                </label>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('migrations', null, true) !!}
                                    <b>Будут ли у модуля миграции?</b>
                                </label>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('seeders', null) !!}
                                    <b>Будут ли в модуле seeder'ы?</b>
                                </label>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('config_file', null) !!}
                                    <b>Создать файл конфигурации config.php?</b>
                                </label>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('setting', null, true) !!}
                                    <b>Модуль будет иметь настройки?</b>
                                </label>
                            </div>
                        </div> 
                        @foreach (config('langs.list-for-admin', []) as $slug => $data)
                            <div class="form-group">
                                {!! Form::label('alias', 'Имя для пункта настроек (' . $data['name'] . ')', ['class' => 'control-label']) !!}
                                {!! Form::text('settings['.$slug.']', null, ['class' => 'form-control']) !!}
                            </div> 
                        @endforeach
                        -->
                        
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="preview">Предпросмотр</button>
                        <?php if (isset($files)): ?>
                            <button type="submit" class="btn btn-success" name="generate">Сгенерировать</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        
        
       

            
        
    </div>




@endsection