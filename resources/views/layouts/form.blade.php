@extends('AutoGen::layouts.main')

@php
    $generators = AntonyForber\AutoGen\Http\Models\Helper::getGeneratorsList();
@endphp

@section('body')
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="list-group">
                @foreach ($generators as $generator)
                    @if (!$generator['disable'])
                        @php
                            $label = '<i class="glyphicon glyphicon-chevron-right"></i>' . $generator['name'];
                            $class = $generator['link'] === Illuminate\Support\Facades\URL::current() ? 'list-group-item active' : 'list-group-item'
                        @endphp
                        <a class="{{$class}}" href="{{$generator['link']}}">{!!$label!!}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-9 col-sm-8">
            @yield('layout-body')
        </div>
    </div>
@endsection