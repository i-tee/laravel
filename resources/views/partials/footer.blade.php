<div class="container-fluid">
    <br>
    <br>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="col-md-4 mb-0 text-muted">{{ date('Y') }} &copy; {{ $developer->fio }}</p>
                </div>
                <div class="col">
                    <ul class="nav justify-content-end">
                        <li class="nav-item"><a target="_blank" href="{{ $developer->telegram_url }}" class="nav-link px-2 text-muted">Telegram</a></li>
                        <li class="nav-item"><a target="_blank" href="{{ $developer->github_url }}" class="nav-link px-2 text-muted">GitHub</a></li>
                        <li class="nav-item"><a target="_blank" href="mailto:{{ $developer->email }}" class="nav-link px-2 text-muted">E-mail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>