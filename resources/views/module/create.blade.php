@extends('AutoGen::layouts.form')

@section('layout-body')
    




    <div class="default-view">
        <h1>Генератор модулей</h1>

        <p>Этот генератор поможет вам создать каркас модуля</p>

        <?php //Form::open(['route' => 'admin.pages.store']) ?>
        {!! Form::open() !!}
            
            <div class="row">
                <div class="col-lg-8 col-md-10" id="form-fields">
                    <div class="module-form">
                        
                        <div class="form-group">
                            {!! Form::label('name', 'Название модуля', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div> 
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