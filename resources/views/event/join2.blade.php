@extends ("layouts.app")
@section('content')
    <h1 class="jumbotron">Rejoindre {{$event->name}}</h1>
    <div class="text-center">
        <span class="font-weight-bold text-success" id="role">Rôle</span><span
                style="font-size: 2rem"> &rarr; </span><span id="details">Détails</span>
    </div>
    <br>

    <form action="{{route('event.join', ['event_id' => $event->id])}}" method="POST" id="myForm">
        {{ csrf_field() }}
        <div class="form-group">
            <h2>Peux-tu être un SAM ?</h2>
            <input type="radio" name="isSam" value=1 checked> Oui<br>
            <input type="radio" name="isSam" value=0 checked> Non<br>
        </div>
        <div class="form-group">
            <label for="nbPlaces">Combien de places peux-tu proposer ?</label><br>
            <input style="width:75px;" type="number" id="nbPlaces" name="nbPlaces" min="0" value="0">
        </div>
        <div class="form-group">
            <h2>As-tu besoin d'un SAM ?</h2>
            <div style="margin-bottom: 5px">Si tu réponds non, tu t'engages à ne pas prendre le volant et à valider ton arrivée chez toi
            </div>
            <input type="radio" name="needSam" value=1 checked> Oui<br>
            <input type="radio" name="needSam" value=0 checked> Non<br>
        </div>
        </br>
        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </div>
        </div>

    </form>
    <br>

@endsection
