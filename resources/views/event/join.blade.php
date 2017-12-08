@extends ("layouts.app")
@section('content')
    <h1 class="jumbotron">Rejoindre {{$event->name}}</h1>
    <div class="text-center">
        <span class="font-weight-bold text-success" id="role">Rôle</span><span
                style="font-size: 2rem"> &rarr; </span><span id="details">Détails</span>
    </div>
    <br>

    <form action="route('event.join')" method="POST" id="myForm">
        <div id="step1" class="text-center">
            <h2>Peux-tu être un SAM ?</h2>
            <button onclick="onNo();" type="button" class="btn btn-danger" style="margin: 0 10px" id="no">Non</button>
            <button onclick="onYes();" type="button" class="btn btn-success" style="margin: 0 10px" id="yes">Oui
            </button>
            <input id="isSam" value="-1" style="display:none">
        </div>
        <div id="step2Sam" class="text-center col-md-offset-4 col-md-4" style="display: none">
            <div class="form-group">
                <label for="nbPlaces">Combien de places peux-tu proposer ?</label>
                <input type="number" class="form-control" id="nbPlaces" min="0" value="0">
            </div>
            <div class="form-group">
                <label for="coche">Personnes que j'emmène : </label>
                <div><input class="form-check-input" type="checkbox" id="coche" value="pers1"
                            onchange="checkedCoche(this)">personne 1
                </div>
                <div><input class="form-check-input" type="checkbox" id="coche" value="pers2"
                            onchange="checkedCoche(this)">personne 2
                </div>
                <div><input class="form-check-input" type="checkbox" id="coche" value="pers3"
                            onchange="checkedCoche(this)">personne 3
                </div>
            </div>

        </div>
        <div id="step2NoSam" class="text-center" style="display:none">
            <h2>As-tu besoin d'un SAM ?</h2>
            <div style="margin-bottom: 5px">Si tu réponds non tu t'engages à ne pas prendre le volant et valider ton
                arrivée
                chez toi
            </div>
            <button onclick="onNoSam();" type="button" class="btn btn-danger" style="margin: 0 10px 5px;" id="noSam">Non
            </button>
            <button onclick="onYesSam();" type="button" class="btn btn-success" style="margin: 0 10px 5px;" id="yesSam">
                Oui
            </button>
            <input id="needsSam" value="-1" style="display:none">


            <div class="form-group" style="display:none" id="listeSAM">
                <label for="samChoisi">Je choisis mon SAM : </label>
                <div><input class="form-check-input" type="radio" id="samChoisi" value="pers1" onchange="checkedSam()"
                            name="radio">personne 1
                </div>
                <div><input class="form-check-input" type="radio" id="samChoisi" value="pers2" onchange="checkedSam()"
                            name="radio">personne 2
                </div>
                <div><input class="form-check-input" type="radio" id="samChoisi" value="pers3" onchange="checkedSam()"
                            name="radio">personne 3
                </div>
                <div><input class="form-check-input" type="radio" id="samChoisi" value="plus-tard"
                            onchange="checkedSam()" name="radio">Choisir mon SAM plus tard
                </div>
            </div>
        </div>

        <br>
        <div class="text-center col-md-offset-4 col-md-4">
            <button onclick="onPrec();" type="button" class="btn btn-primary disabled" style="margin: 0 10px" id="prec">
                Précédent
            </button>
            <button onclick="onSuiv();" type="button" class="btn btn-primary disabled" style="margin: 0 10px" id="suiv">
                Suivant
            </button>
            <button onclick="onFin();" type="button" class="btn btn-primary disabled"
                    style="margin: 0 10px; display: none" id="fin">Fini
            </button>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script>
        var choice = -1;
        var nbCases = 0;
        var besoinSam = -1;

        function checkedCoche(elem) {
            if (elem.checked) {
                nbCases++;
            } else {
                nbCases--;
            }
            if (nbCases > document.getElementById("nbPlaces").value) {
                elem.checked = false;
                nbCases--;
            }
        }

        function checkedSam() {
            document.getElementById("fin").classList.remove("disabled");
        }

        function onYes() {
            document.getElementById("yes").classList.add("disabled");
            document.getElementById("no").classList.remove("disabled");
            choice = 1;
            document.getElementById("suiv").classList.remove("disabled");
        }

        function onNo() {
            document.getElementById("no").classList.add("disabled");
            document.getElementById("yes").classList.remove("disabled");
            choice = 0;
            document.getElementById("suiv").classList.remove("disabled");
        }

        function onYesSam() {
            document.getElementById("yesSam").classList.add("disabled");
            document.getElementById("noSam").classList.remove("disabled");
            besoinSam = 1;
            document.getElementById("listeSAM").style.display = "block";
        }

        function onNoSam() {
            document.getElementById("noSam").classList.add("disabled");
            document.getElementById("yesSam").classList.remove("disabled");
            besoinSam = 0;
            document.getElementById("fin").classList.remove("disabled");
            document.getElementById("listeSAM").style.display = "none";
        }

        function onPrec() {
            if (document.getElementById("prec").classList.contains("disabled"))
                return;
            document.getElementById("prec").classList.add("disabled");
            document.getElementById("suiv").classList.remove("disabled");
            document.getElementById("step2NoSam").style.display = "none";
            document.getElementById("step2Sam").style.display = "none";
            document.getElementById("step1").style.display = "block";
            document.getElementById("fin").style.display = "none";
            document.getElementById("suiv").style.display = "inline-block";
            document.getElementById("role").className = "font-weight-bold text-success";
            document.getElementById("details").className = "";
        }

        function onSuiv() {
            if (document.getElementById("suiv").classList.contains("disabled"))
                return;
            document.getElementById("suiv").classList.add("disabled");
            document.getElementById("prec").classList.remove("disabled");
            document.getElementById("step1").style.display = "none";
            if (choice) {
                document.getElementById("step2Sam").style.display = "block";
                document.getElementById("fin").classList.remove("disabled");
            } else {
                document.getElementById("step2NoSam").style.display = "block";
            }
            document.getElementById("suiv").style.display = "none";
            document.getElementById("fin").style.display = "inline-block";
            document.getElementById("details").className = "font-weight-bold text-success";
            document.getElementById("role").className = "";
        }

        function onFin() {
            if (document.getElementById("fin").classList.contains("disabled"))
                return;
            //remplir champs cachés
            document.getElementById("isSam").value = choice;
            if (document.getElementById("noSam").classList.contains("disabled"))
                document.getElementById("needsSam").value = 0;
            else
                document.getElementById("needsSam").value = 1;
            document.getElementById("myForm").submit();
        }
    </script>
@endsection