<!doctype html>
<html lang="ru">
  
  @include('partials.head')

  <body>

    @include('partials.header')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')
    @include('partials.scripts')

  </body>
</html>