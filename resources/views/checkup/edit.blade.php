@extends('templates.default')

@section('title', $title)

@section('content')

  <h4>Modifica Visita codice {{$checkup->id}} dell'atleta <b>{{$checkup->athlete->name}}</b></h4>
  <form action="/checkup/{{$checkup->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">


      <input type="hidden" id="age" name="age" value="{{date("Y")-date('Y', strtotime($checkup->athlete->dob))}}">
          {{csrf_field()}}

          <!-- 1° riga -->
              <div class="row">

                  <!-- data -->
                  <div class="col s6">
                      <label for="">Data della visita</label>
                      <input type="date" step="any" name="date" id="date" value="{{date('Y-m-d', strtotime($checkup->date))}}" class="form-control">
                  </div>
                  <div class="input-field col s3">
                      <select name="team_id">
                          @foreach ($teams as $team)
                              <option value="{{$team->id}}" @if($team->id === $checkup->team->id)selected @endif>{{$team->name}}</option>
                          @endforeach
                      </select>
                      <label>Team</label>
                  </div>
                  <div class="input-field col s3">
                      <select name="sport_id">
                          @foreach ($sports as $sport)
                              <option value="{{$sport->id}}" @if($sport->id === $checkup->sport->id)selected @endif>{{$sport->name}}</option>
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
                      <input type="number" step="any" name="altezza" id="altezza" class="form-control" placeholder="Altezza" value="{{$checkup->altezza}}">
                  </div>

                  <!-- altezza -->
                  <div class="col s6">
                      <label for="">Peso</label>
                      <input type="number" step="any" name="peso" id="peso" class="form-control" placeholder="Peso" value="{{$checkup->peso}}">
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
                      <input type="number" step="any" name="tricipite_L" id="tricipite_L" class="form-control" placeholder="Tricipite SX" value="{{$checkup->tricipite_L}}">
                  </div>

                  <!-- tricep R -->
                  <div class="col s6">
                      <label for="">Tricipite DX</label>
                      <input type="number" step="any" name="tricipite_R" id="tricipite_R" class="form-control" placeholder="Tricipite DX" value="{{$checkup->tricipite_R}}">
                  </div>
              </div>


              <!-- 4° riga -->
              <div class="row">

                  <!-- chest L -->
                  <div class="col s6">
                      <label for="">Petto SX</label>
                      <input type="number" step="any" name="petto_L" id="petto_L" class="form-control" placeholder="Petto SX" value="{{$checkup->petto_L}}">
                  </div>

                  <!-- chest R -->
                  <div class="col s6">
                      <label for="">Petto DX</label>
                      <input type="number" step="any" name="petto_R" id="petto_R" class="form-control" placeholder="Petto DX" value="{{$checkup->petto_R}}">
                  </div>
              </div>

              <!-- 5° riga -->
              <div class="row">

                  <!-- ascella L -->
                  <div class="col s6">
                      <label for="">Ascella SX</label>
                      <input type="number" step="any" name="ascella_L" id="ascella_L" class="form-control" placeholder="Ascella SX" value="{{$checkup->ascella_L}}">
                  </div>

                  <!-- ascella R -->
                  <div class="col s6">
                      <label for="">Ascella DX</label>
                      <input type="number" step="any" name="ascella_R" id="ascella_R" class="form-control" placeholder="Ascella DX" value="{{$checkup->ascella_R}}">
                  </div>
              </div>

              <!-- 6° riga -->
              <div class="row">

                  <!-- iliaca L -->
                  <div class="col s6">
                      <label for="">Iliaca SX</label>
                      <input type="number" step="any" name="iliaca_L" id="iliaca_L" class="form-control" placeholder="Iliaca SX" value="{{$checkup->iliaca_L}}">
                  </div>

                  <!-- iliaca R -->
                  <div class="col s6">
                      <label for="">Iliaca DX</label>
                      <input type="number" step="any" name="iliaca_R" id="iliaca_R" class="form-control" placeholder="Iliaca DX" value="{{$checkup->iliaca_R}}">
                  </div>
              </div>


              <!-- 7° riga -->
              <div class="row">

                  <!-- addominale L -->
                  <div class="col s6">
                      <label for="">Addominale SX</label>
                      <input type="number" step="any" name="addominale_L" id="addominale_L" class="form-control" placeholder="Addominale SX" value="{{$checkup->addominale_L}}">
                  </div>

                  <!-- addominale R -->
                  <div class="col s6">
                      <label for="">Addominale DX</label>
                      <input type="number" step="any" name="addominale_R" id="addominale_R" class="form-control" placeholder="Addominale DX" value="{{$checkup->addominale_R}}">
                  </div>
              </div>


              <!-- 8° riga -->
              <div class="row">

                  <!-- coscia L -->
                  <div class="col s6">
                      <label for="">Coscia SX</label>
                      <input type="number" step="any" name="coscia_L" id="coscia_L" class="form-control" placeholder="Coscia SX" value="{{$checkup->coscia_L}}">
                  </div>

                  <!-- coscia R -->
                  <div class="col s6">
                      <label for="">Coscia DX</label>
                      <input type="number" step="any" name="coscia_R" id="coscia_R" class="form-control" placeholder="Coscia DX" value="{{$checkup->coscia_R}}">
                  </div>
              </div>

              <!-- 9° riga -->
              <div class="row">

                  <!-- L -->
                  <div class="col s6">
                      <label for="">Braccio SX</label>
                      <input type="number" step="any" name="braccio_L" id="braccio_L" class="form-control" placeholder="Braccio SX" value="{{$checkup->braccio_L}}">
                  </div>

                  <!-- R -->
                  <div class="col s6">
                      <label for="">Braccio DX</label>
                      <input type="number" step="any" name="braccio_R" id="braccio_R" class="form-control" placeholder="Braccio DX" value="{{$checkup->braccio_R}}">
                  </div>
              </div>


              <!-- 10° riga -->
              <div class="row">

                  <!-- L -->
                  <div class="col s6">
                      <label for="">Gamba SX</label>
                      <input type="number" step="any" name="gamba_L" id="gamba_L" class="form-control" placeholder="Gamba SX" value="{{$checkup->gamba_L}}">
                  </div>

                  <!-- R -->
                  <div class="col s6">
                      <label for="">Gamba DX</label>
                      <input type="number" step="any" name="gamba_R" id="gamba_R" class="form-control" placeholder="Gamba DX" value="{{$checkup->gamba_R}}">
                  </div>
              </div>

              <div class="divider"></div>

              <div class="row">

                  <div class="col s4">
                      <label for="">Spalle</label>
                      <input type="number" step="any" name="spalle" id="spalle" class="form-control" placeholder="Spalle" value="{{$checkup->spalle}}">
                  </div>

                  <div class="col s4">
                      <label for="">Petto</label>
                      <input type="number" step="any" name="petto" id="petto" class="form-control" placeholder="Petto" value="{{$checkup->petto}}">
                  </div>

                  <div class="col s4">
                      <label for="">Anche</label>
                      <input type="number" step="any" name="anche" id="anche" class="form-control" placeholder="Anche" value="{{$checkup->anche}}">
                  </div>
              </div>

              <!-- 11° riga -->
              <div class="row">


                  <div class="col s3">
                      <label for="">Spirometria</label>
                      <input type="number" step="any" name="spirometria" id="spirometria" class="form-control" placeholder="Spirometria" value="{{$checkup->spirometria}}">
                  </div>

                  <div class="col s3">
                      <label for="">Frequenza a riposo</label>
                      <input type="number" step="any" name="frq_riposo" id="frq_riposo" class="form-control" placeholder="Frequenza a riposo" value="{{$checkup->frq_riposo}}">
                  </div>

                  <div class="col s3">
                      <label for="">Frequenza dopo stress</label>
                      <input type="number" step="any" name="frq_stress" id="frq_stress" class="form-control" placeholder="Frequenza dopo stress" value="{{$checkup->frq_stress}}">
                  </div>

                  <div class="col s3">
                      <label for="">Frequenza dopo 1 min</label>
                      <input type="number" step="any" name="frq_1min" id="frq_1min" class="form-control" placeholder="Frequenza dopo 1 min" value="{{$checkup->frq_1min}}">
                  </div>
              </div>


              <!-- 12° riga -->
              <div class="row">

                  <div class="col s4">
                      <label for="">Step 1</label>
                      <input type="number" step="any" name="step1" id="step1" class="form-control" placeholder="Step 1" value="{{$checkup->step1}}">
                  </div>

                  <!-- L -->
                  <div class="col s4">
                      <label for="">Step 2</label>
                      <input type="number" step="any" name="step2" id="step2" class="form-control" placeholder="Step 2" value="{{$checkup->step2}}">
                  </div>

                  <!-- R -->
                  <div class="col s4">
                      <label for="">Step 3</label>
                      <input type="number" step="any" name="step3" id="step3" class="form-control" placeholder="Step 3" value="{{$checkup->step3}}">
                  </div>
              </div>


              <!-- 13° riga -->
              <div class="row">

                  <!-- L -->
                  <div class="col s6">
                      <label for="readonly">Massa Grassa (precalcolato)</label>
                      <input readonly type="number" step="any" name="massa_grassa" id="massa_grassa" class="form-control" value="{{$checkup->massa_grassa}}">
                  </div>

                  <!-- R -->
                  <div class="col s6">
                      <label for="readonly">BMI (precalcolato)</label>
                      <input readonly type="number" step="any" name="bmi" id="bmi" class="form-control" value="{{$checkup->bmi}}">
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
          var r1  = Number($('#petto_R').val());
          var l1 = Number($('#petto_L').val());
          var r2  = Number($('#addominale_R').val());
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


          $(document).ready(function() {
          $("#submit").click(function(event) {
          if( !confirm('Confermi l\'inserimento della visita?') ){
          event.preventDefault();
          }
          /*
          $("<input />").attr("type", "hidden")
          .attr("name", "massa_grassa")
          .attr("value", fat_mass)
          .appendTo("#addcheckup");
          $("<input />").attr("type", "hidden")
          .attr("name", "bmi")
          .attr("value", bmi)
          .appendTo("#addcheckup");
          */
          });
          });





@endsection
