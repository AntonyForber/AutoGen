@extends('AutoGen::layouts.main')

@section('body')
    <div class="default-index">
        <div class="page-header">
            <h1>Welcome to AutoGen <small>волшебный инструмент, который может написать код для вас</small></h1>
        </div>

        <p class="lead">Начните веселье со следующими генераторами кода:</p>

        <div class="row">
            <?php 
            //$generators = [];
            ?>
            @php
                $generators = AntonyForber\AutoGen\Http\Models\Helper::getGeneratorsList();
            @endphp
            @foreach ($generators as $generator)
                <div class="generator col-lg-4">
                    <h3>{{ $generator['name'] }}</h3>
                    <p>{{ $generator['description'] }}</p>
                    @if ($generator['disable'])
                        <p><a href="{{ $generator['link'] }}" class="btn btn-default disabled">Under Construction</a></p>
                    @else
                        <p><a href="{{ $generator['link'] }}" class="btn btn-default">Старт &raquo;</a></p>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
    
@endsection