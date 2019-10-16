@extends('templates.default')

@section('title', $title)

@section('content')

    <h4>Aggiungi Visita all'atleta <b>{{$athlete->name}}</b></h4>
    @include('partials.inputerrors')
    <form action="{{route('checkup.store')}}" method="POST" enctype="multipart/form-data" name="addcheckup" id="addcheckup">
        <input type="hidden" id="age" name="age" value="{{date("Y")-date('Y', strtotime($athlete->dob))}}">
        <input type="hidden" id="name" name="name" value="{{$athlete->name}}">
        <input type="hidden" id="athlete_id" name="athlete_id" value="{{$athlete->id}}">
        <!--<input type="hidden" id="date" name="date" value="{{date('Y-m-d')}}">-->
        {{csrf_field()}}

        <!-- 1° riga -->
        <div class="row">

            <!-- data -->
            <div class="col s6">
                <label for="readonly">Data della visita</label>
                <!--<input readonly type="text" step="any" name="data" id="data" value="{{date('d-m-Y')}}" class="form-control">-->
                <input type="date" step="any" name="date" id="date" value="{{date('d-m-Y')}}" class="form-control">
            </div>
            <div class="input-field col s3">
                <select name="team_id">
                    @foreach ($teams as $team)
                        <option value="{{$team->id}}" @if($loop->first)selected @endif>{{$team->name}}</option>
                    @endforeach
                </select>
                <label>Team</label>
            </div>
            <div class="input-field col s3">
                <select name="sport_id">
                    @foreach ($sports as $sport)
                        <option value="{{$sport->id}}" @if($loop->first)selected @endif>{{$sport->name}}</option>
                    @endforeach
                </select>
                <label>Sport</label>
            </div>
        </div>

        <!-- 2° riga -->
        <div class="row">

            <!-- peso -->
            <div class="col s6">
                <label for="">Altezza</label>
                <input required type="number" step="any" name="altezza" id="altezza" class="form-control" placeholder="Altezza">
            </div>

            <!-- altezza -->
            <div class="col s6">
                <label for="">Peso</label>
                <input required type="number" step="any" name="peso" id="peso" class="form-control" placeholder="Peso">
            </div>
        </div>


        <div class="row">
            <div class="col s6"><h4>VALORI LATO SINISTRO</h4></div>
            <div class="col s6"><h4>VALORI LATO DESTRO</h4></div>
        </div>

        <!-- 3° riga -->
        <div class="row">

            <!-- tricep L -->
            <div class="col s6">
                <label for="">Tricipite SX</label>
                <input required type="number" step="any" name="tricipite_L" id="tricipite_L" class="form-control" placeholder="Tricipite SX">
            </div>

            <!-- tricep R -->
            <div class="col s6">
                <label for="">Tricipite DX</label>
                <input required type="number" step="any" name="tricipite_R" id="tricipite_R" class="form-control" placeholder="Tricipite DX">
            </div>
        </div>


        <!-- 4° riga -->
        <div class="row">

            <!-- chest L -->
            <div class="col s6">
                <label for="">Petto SX</label>
                <input required type="number" step="any" name="petto_L" id="petto_L" class="form-control" placeholder="Petto SX">
            </div>

            <!-- chest R -->
            <div class="col s6">
                <label for="">Petto DX</label>
                <input required type="number" step="any" name="petto_R" id="petto_R" class="form-control" placeholder="Petto DX">
            </div>
        </div>

        <!-- 5° riga -->
        <div class="row">

            <!-- ascella L -->
            <div class="col s6">
                <label for="">Ascella SX</label>
                <input required type="number" step="any" name="ascella_L" id="ascella_L" class="form-control" placeholder="Ascella SX">
            </div>

            <!-- ascella R -->
            <div class="col s6">
                <label for="">Ascella DX</label>
                <input required type="number" step="any" name="ascella_R" id="ascella_R" class="form-control" placeholder="Ascella DX">
            </div>
        </div>

        <!-- 6° riga -->
        <div class="row">

            <!-- iliaca L -->
            <div class="col s6">
                <label for="">Iliaca SX</label>
                <input required type="number" step="any" name="iliaca_L" id="iliaca_L" class="form-control" placeholder="Iliaca SX">
            </div>

            <!-- iliaca R -->
            <div class="col s6">
                <label for="">Iliaca DX</label>
                <input required type="number" step="any" name="iliaca_R" id="iliaca_R" class="form-control" placeholder="Iliaca DX">
            </div>
        </div>


        <!-- 7° riga -->
        <div class="row">

            <!-- addominale L -->
            <div class="col s6">
                <label for="">Addominale SX</label>
                <input required type="number" step="any" name="addominale_L" id="addominale_L" class="form-control" placeholder="Addominale SX">
            </div>

            <!-- addominale R -->
            <div class="col s6">
                <label for="">Addominale DX</label>
                <input required type="number" step="any" name="addominale_R" id="addominale_R" class="form-control" placeholder="Addominale DX">
            </div>
        </div>


        <!-- 8° riga -->
        <div class="row">

            <!-- coscia L -->
            <div class="col s6">
                <label for="">Coscia SX</label>
                <input required type="number" step="any" name="coscia_L" id="coscia_L" class="form-control" placeholder="Coscia SX">
            </div>

            <!-- coscia R -->
            <div class="col s6">
                <label for="">Coscia DX</label>
                <input required type="number" step="any" name="coscia_R" id="coscia_R" class="form-control" placeholder="Coscia DX">
            </div>
        </div>

        <!-- 9° riga -->
        <div class="row">

            <!-- L -->
            <div class="col s6">
                <label for="">Braccio SX</label>
                <input required type="number" step="any" name="braccio_L" id="braccio_L" class="form-control" placeholder="Braccio SX">
            </div>

            <!-- R -->
            <div class="col s6">
                <label for="">Braccio DX</label>
                <input required type="number" step="any" name="braccio_R" id="braccio_R" class="form-control" placeholder="Braccio DX">
            </div>
        </div>


        <!-- 10° riga -->
        <div class="row">

            <!-- L -->
            <div class="col s6">
                <label for="">Gamba SX</label>
                <input required type="number" step="any" name="gamba_L" id="gamba_L" class="form-control" placeholder="Gamba SX">
            </div>

            <!-- R -->
            <div class="col s6">
                <label for="">Gamba DX</label>
                <input required type="number" step="any" name="gamba_R" id="gamba_R" class="form-control" placeholder="Gamba DX">
            </div>
        </div>

        <div class="divider"></div>

        <div class="row">

            <div class="col s4">
                <label for="">Spalle</label>
                <input required type="number" step="any" name="spalle" id="spalle" class="form-control" placeholder="Spalle">
            </div>

            <div class="col s4">
                <label for="">Petto</label>
                <input required type="number" step="any" name="petto" id="petto" class="form-control" placeholder="Petto">
            </div>

            <div class="col s4">
                <label for="">Anche</label>
                <input required type="number" step="any" name="anche" id="anche" class="form-control" placeholder="Anche">
            </div>
        </div>

        <!-- 11° riga -->
        <div class="row">


            <div class="col s3">
                <label for="">Spirometria</label>
                <input required type="number" step="any" name="spirometria" id="spirometria" class="form-control" placeholder="Spirometria">
            </div>

            <div class="col s3">
                <label for="">Frequenza a riposo</label>
                <input required type="number" step="any" name="frq_riposo" id="frq_riposo" class="form-control" placeholder="Frequenza a riposo">
            </div>

            <div class="col s3">
                <label for="">Frequenza dopo stress</label>
                <input required type="number" step="any" name="frq_stress" id="frq_stress" class="form-control" placeholder="Frequenza dopo stress">
            </div>

            <div class="col s3">
                <label for="">Frequenza dopo 1 min</label>
                <input required type="number" step="any" name="frq_1min" id="frq_1min" class="form-control" placeholder="Frequenza dopo 1 min">
            </div>
        </div>


        <!-- 12° riga -->
        <div class="row">

            <div class="col s4">
                <label for="">Step 1</label>
                <input required type="number" step="any" name="step1" id="step1" class="form-control" placeholder="Step 1">
            </div>

            <!-- L -->
            <div class="col s4">
                <label for="">Step 2</label>
                <input required type="number" step="any" name="step2" id="step2" class="form-control" placeholder="Step 2">
            </div>

            <!-- R -->
            <div class="col s4">
                <label for="">Step 3</label>
                <input required type="number" step="any" name="step3" id="step3" class="form-control" placeholder="Step 3">
            </div>
        </div>


        <!-- 13° riga -->
        <div class="row">

            <!-- L -->
            <div class="col s6">
                <label for="readonly">Massa Grassa (precalcolato)</label>
                <input readonly type="number" step="any" name="massa_grassa" id="massa_grassa" class="form-control" >
            </div>

            <!-- R -->
            <div class="col s6">
                <label for="readonly">BMI (precalcolato)</label>
                <input readonly type="number" step="any" name="bmi" id="bmi" class="form-control" >
            </div>
        </div>

        <button class="btn waves-effect waves-light btn-small" type="submit" name="action" id="submit">Inserisci
            <i class="material-icons right">send</i>
        </button>
    </form>

@endsection

@section('calc')

    var fat_mass;
    var bmi;
    $('input').keyup(function(){ // run anytime the value changes
        var peso  = Number($('#peso').val());   // get value of field
        var altezza = Number($('#altezza').val()); // convert it to a float
        var r1 = Number($('#petto_R').val());
        var l1 = Number($('#petto_L').val());
        var r2 = Number($('#addominale_R').val());
        var l2 = Number($('#addominale_L').val());
        var r3 = Number($('#coscia_R').val());
        var l3 = Number($('#coscia_L').val());

        somma = ((r1 + l1) / 2) + ((r2 + l2) / 2) + ((r3 + l3) / 2);
        age = Number($('#age').val());
        delta = 1.10938 - (0.0008267 * somma) + (0.0000016 * Math.pow(somma,2)) - (0.0002574 * age);
        fat_mass = ((4.95 / delta)-4.50)*100;

        //bmi
        bmi = peso / (altezza/100 * altezza/100);

        //$('#total_expenses1').html(firstValue + secondValue + thirdValue + fourthValue); // questo serve in una label se non vuoi avere un textbox tipo <span id="total_expenses1"></span>
        document.getElementById('bmi').value = bmi;
        document.getElementById('massa_grassa').value = fat_mass;
        // add them and output it

    });


@endsection




@section('validazione')


    $(document).ready(function() {
        $("#submit").click(function(event) {
            if( !confirm('Confermi l\'inserimento della visita?') ){
                event.preventDefault();
            }
        });
    });


// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='addcheckup']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            altezza: "required",
            peso: "required",
            tricipite_R: "required",
            tricipite_L: "required",
            petto_R: "required",
            petto_L: "required",
            ascella_R: "required",
            ascella_L: "required",
            iliaca_R: "required",
            iliaca_L: "required",
            addominale_R: "required",
            addominale_L: "required",
            coscia_R: "required",
            coscia_L: "required",
            braccio_R: "required",
            braccio_L: "required",
            gamba_R: "required",
            gamba_L: "required",
            spalle: "required",
            petto: "required",
            anche: "required",
            spirometria: "required",
            frq_riposo: "required",
            frq_stress: "required",
            frq_1min: "required",
            step1: "required",
            step2: "required",
            step3: "required",

        },
        // Specify validation error messages
        messages: {
            altezza: "Campo obbligatorio",
            peso: "Campo obbligatorio",
            tricipite_R: "Campo obbligatorio",
            tricipite_L: "Campo obbligatorio",
            petto_R: "Campo obbligatorio",
            petto_L: "Campo obbligatorio",
            ascella_R: "Campo obbligatorio",
            ascella_L: "Campo obbligatorio",
            iliaca_R: "Campo obbligatorio",
            iliaca_L: "Campo obbligatorio",
            addominale_R: "Campo obbligatorio",
            addominale_L: "Campo obbligatorio",
            coscia_R: "Campo obbligatorio",
            coscia_L: "Campo obbligatorio",
            braccio_R: "Campo obbligatorio",
            braccio_L: "Campo obbligatorio",
            gamba_R: "Campo obbligatorio",
            gamba_L: "Campo obbligatorio",
            spalle: "Campo obbligatorio",
            petto: "Campo obbligatorio",
            anche: "Campo obbligatorio",
            spirometria: "Campo obbligatorio",
            frq_riposo: "Campo obbligatorio",
            frq_stress: "Campo obbligatorio",
            frq_1min: "Campo obbligatorio",
            step1: "Campo obbligatorio",
            step2: "Campo obbligatorio",
            step3: "Campo obbligatorio",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
@endsection
