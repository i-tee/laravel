@extends('app')

@section('title', $developer->fio.': '.$developer->profession)

@section('content')
    
    <br>
    <div class="row mb-3">

        <div class="col-md-4 themed-grid-col tee-avatar">
            <picture>
                <source srcset="{{ $developer->avatar_url }}" type="image/svg+xml">
                <img src="{{ $developer->avatar_url }}" class="rounded mx-auto d-block" alt="{{ $developer->fio }} - {{ $developer->profession }}">
            </picture>
            <br>
        </div>

        <div class="col-md-8 themed-grid-col">

            <div class="tee-main-info">
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

            <br>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Компетенции</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Средства</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Образование</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-section">

                        @foreach ($skillgroups as $key => $skillgroup)
                        
                            <br>
                            <h3>{{ $skillgroup }}</h3>

                            @foreach ($skills as $skill)
                            
                                @if ($skill->category_id == $key)
                                
                                    <p>{{ $skill->name }}</p>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped {{ $bootstrap_colors[$key] }}" role="progressbar" style="width: {{ $skill->percent }}%" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                @endif
                            
                            @endforeach

                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-section tee-orchid-ol-correct">
                        {!! $developer->content !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="tab-section">
                        <br>
                        {!! $developer->education !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
    
@endsection