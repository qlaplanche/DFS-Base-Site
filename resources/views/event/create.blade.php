@extends ("layouts.app")
@section('content')


    <h1 class="jumbotron"><span class="text-center">Creation événement<br></span></h1>
    <div class="text-center"><span class="text-success"><strong>Généralités </strong> </span> &rarr; Participants &rarr;
        Compléments
    </div>
    <div id="step1" class="container">
        <div class="row">

            <label for="text" class="form-control col-md-offset-4">Nom</label>
            <input type="text" class="form-control col-md-offset-4 col-md-4" id="name" placeholder="Entrez votre nom">
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="date" class="form-control col-md-offset-1">Date de début</label>
                <input type="date" class="form-control col-md-offset-1 col-md-8" id="date" placeholder="Date de début">

            </div>

            <div class="col-md-3">
                <label for="time" class="form-control col-md-offset-1">Heure de début</label>
                <input type="time" class="form-control col-md-offset-1 col-md-4" id="time" placeholder="Heure de début">
            </div>

            <div class="col-md-3">
                <label for="date" class="form-control col-md-offset-1">Date de fin</label>
                <input type="date" class="form-control col-md-offset-1 col-md-8" id="location"
                       placeholder="Date de fin">
            </div>

            <div class="col-md-3">
                <label for="time" class="form-control col-md-offset-1">Heure de fin</label>
                <input type="time" class="form-control col-md-offset-1 col-md-4" id="time" placeholder="Heure de fin">
            </div>

        </div>


    </div>



    <div id="step2" class="container">
        <div class="row">
            <div class="col-md-3">
                <label for="email" class="form-control">Nom</label>
                <input onchange="addParticipant()" type="email" class="form-control " id="name1"
                       placeholder="Adresse mail du particiapant">
            </div>
        </div>


    </div>
    <div id="step3" class="container" style="display: none;">
        <div class="row ">
            <div class="col-md-4 col-md-offset-2">
                <label for="file" class="form-control-file col-md-offset-1">Photo</label>
                <input type="file" class="form-control-file col-md-offset-1" id="img" placeholder="Photo">


            </div>

            <div class="col-md-4 col-md-offset-1">
                <h2>Visibilité</h2>
                <button onclick="onNo();" type="button" class="btn btn-danger" style="margin: 0 10px" id="no">Privé
                </button>
                <button onclick="onYes();" type="button" class="btn btn-success" style="margin: 0 10px" id="yes">
                    Public
                </button>
            </div>

        </div>

    </div>
    <br>
    <br>
    <div class="text-center">
        <button type="button" class="btn btn-info disabled" style="margin: 0 10px;">Précédent</button>

        <button type="button" class="btn btn-info" style="margin: 0 10px;"> Suivant</button>


    </div>


    <script>
        function onYes() {
            document.getElementById("yes").classList.add("disabled");
            document.getElementById("no").classList.remove("disabled");
            document.getElementById("suiv").classList.remove("disabled");
        }

        function onNo() {
            document.getElementById("no").classList.add("disabled");
            document.getElementById("yes").classList.remove("disabled");
            document.getElementById("suiv").classList.remove("disabled");
        }

        function addParticipant() {

        }
    </script>

@endsection