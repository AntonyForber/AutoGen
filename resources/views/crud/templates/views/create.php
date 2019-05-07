@php
    /** @var \CustomForm\Builder\Form $form */
    $form->buttons->showCloseButton(route('admin.<?= $routeName ?>.index'))
@endphp

@extends('admin.layouts.main')

@section('content-no-row')
    {!! Form::open(['route' => 'admin.<?= $routeName ?>.store', 'files' => true]) !!}
    {!! $form->render() !!}
    {!! Form::close() !!}
@stop
