@extends('app')

@section('title', 'hi you!')

@section('content')
    
    <div class="row mb-3">
        <div class="col-md-4 themed-grid-col">
            <picture>
                <source srcset="{{ $developer->avatar_url }}" type="image/svg+xml">
                <img src="{{ $developer->avatar_url }}" class="rounded mx-auto d-block" alt="{{ $developer->fio }} - {{ $developer->profession }}">
            </picture>
        </div>
        <div class="col-md-8 themed-grid-col"></div>
    </div>

    <pre>
        <?
            var_dump($developer);
        ?>
    </code>
    

@endsection