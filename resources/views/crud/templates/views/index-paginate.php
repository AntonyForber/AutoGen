@php
    /** @var \App\Modules\<?= $moduleName ?>\Models\<?= $modelName ?>[] $models */
@endphp

@extends('admin.layouts.main')

@section('content')
    <div class="col-xs-12">
        {!! \App\Core\Modules\<?= $moduleName ?>\Filters\<?= $modelName ?>Filter::showFilter() !!}
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
<?php foreach ($fields as $field) : ?>
                        <th>{{ __('<?= strtolower($moduleName) ?>::general.attributes.<?= $field['name'] ?>') }}</th>
<?php endforeach;?>
<?php if ($active) : ?>
                        <th></th>
<?php endif;?>
                        <th></th>
                    </tr>
                    @foreach($models AS $item)
                        <tr>
<?php foreach ($fields as $field) : ?>
                        <th>{{ __('<?= strtolower($moduleName) ?>::general.attributes.<?= $field['name'] ?>') }}</th>
                            <td>{{ $item-><?= $field['path'] ?><?= $field['name'] ?> }}</td>
<?php endforeach;?>
<?php if ($active) : ?>
                            <td>{!! Widget::active($item) !!}</td>
<?php endif;?>
                            <td>
                                {!! \App\Components\Buttons::edit('admin.<?= $routeName ?>.edit', $item->id) !!}
                                {!! \App\Components\Buttons::delete('admin.<?= $routeName ?>.destroy', $item->id) !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="text-center">{{ $models->appends(request()->except('page'))->links() }}</div>
    </div>
@stop
