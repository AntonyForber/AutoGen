@php
    /** @var \App\Modules\<?= $moduleName ?>\Models\<?= $modelName ?>[] $models */
    $className = \App\Modules\<?= $moduleName ?>\Models\<?= $modelName ?>::class;
@endphp

@extends('admin.layouts.main')

@section('content')
    <div class="col-xs-12">
        <div class="dd pageList" id="myNest" data-depth="1">
            <ol class="dd-list">
                @include('<?= strtolower($moduleName) ?>::admin.items', ['models' => $models])
            </ol>
        </div>
        <span id="parameters" data-url="{{ route('admin.<?= $routeName ?>.sortable', ['class' => $className]) }}"></span>
        <input type="hidden" id="myNestJson">
    </div>
@stop
