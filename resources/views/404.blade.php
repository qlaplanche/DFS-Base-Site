<!-- ATTENTION CE FICHIER EST CODÉ AVEC LE CUL -->

@extends ("layouts.app")
@section('content')
 <!-- Jumbotron Header -->
      <header class="jumbotron my-4" id="header404">
        <h1 class="display-3">404!</h1>
        <a id="playButton" class="btn btn-outline-danger btn-lg">Let's play a game</a>
      </header>

      <!-- Page Features -->
      <canvas id="game-canvas" style="width:100%;height:100%"></canvas>  


      <!-- HIDDEN RES -->
      <img src="{{ asset('img/car.png') }}" id="res_car" style="display:none"\>
      <img src="{{ asset('img/beer.png') }}" id="res_beer" style="display:none"\>
      <img src="{{ asset('img/wall.png') }}" id="res_wall" style="display:none"\>

      <script type="text/javascript">
        var sfx = {
          'coldOne': new Audio("{{ asset('sfx/coldOne.mp3') }}"),
          'crash': new Audio("{{ asset('sfx/crash.mp3') }}")
        }
      </script>
      <script type="text/javascript" src="{{ asset('js/404.js') }}"></script>
      <!-- /.row -->
@endsection