@extends('app')

@section('title', 'hi you!')

@section('content')
    
    <div class="row mb-3">

        <div class="col-md-4 themed-grid-col">
            <picture>
                <source srcset="{{ $developer->avatar_url }}" type="image/svg+xml">
                <img width="100px" src="{{ $developer->avatar_url }}" class="rounded mx-auto d-block" alt="{{ $developer->fio }} - {{ $developer->profession }}">
            </picture>
        </div>

        <div class="col-md-8 themed-grid-col">

            <div>
                <h1>{{ $developer->fio }}</h1>
                <h2>{{ $developer->profession }}</h2>
                <p>г. {{ $developer->city }}</p>
                <p>
                    <span class="badge rounded-pill bg-primary">  Возраст: {{ $set['age'] }}  </span>
                    <span class="badge rounded-pill bg-success">  Опыт: {{ $set['experience'] }}   </span>
                </p>
            </div>

            <div class="tee-contacts">
                
                <a href="{{ $developer->telegram_url }}" target="_blank" type="button" class="btn btn-info btn-telegram"><i class="bi bi-telegram"></i> Telegram</a>
                <a href="{{ $developer->github_url }}" target="_blank" type="button" class="btn btn-dark btn-github"><i class="bi bi-github"></i> GitHub</a>
                <a href="mailto:{{ $developer->email }}" target="_blank" type="button" class="btn btn-link">{{ $developer->email }}</a>

            </div>

        </div>

    </div>

    <pre>
        <?

            var_dump($developer);
        ?>
    </code>
    
@endsection