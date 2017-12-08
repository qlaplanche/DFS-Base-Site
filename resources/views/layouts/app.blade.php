<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Name') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/boostrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  </head>

  <body>

    @include('subviews.navbar')
    <div id="alerts">
    @if(Session::has('alert-msg') && Session::has('alert-btn') && Session::has('alert-class'))
      @include('subviews.alert')
    @endif
    </div>

    <div id="content" class="container">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

        @yield('content')

    </div>
    @include('subviews.footer')


    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-1.12.2.min.js')}}"></script>
    <script>
$(".ChatLog").scrollTop(function() { return this.scrollHeight; });
</script>
  </body>

</html>