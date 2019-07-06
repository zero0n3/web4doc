@extends('templates.default')

@section('title', $title)

@section('content')

  <h4>Modifica Visita codice {{$checkup->id}} dell'atleta <b>{{$checkup->athlete->name}}</b></h4>
  <form action="/checkup/{{$checkup->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">

    <!-- 1° riga -->
    <div class="row">
 
        <!-- data -->
        <div class="col s6">
          <label for="">Data della visita</label>
          <input type="date" name="date" id="date" value="{{$checkup->date}}" class="form-control" placeholder="Data della visita">
        </div>
    </div>

    <!-- 2° riga -->
    <div class="row">
 
        <!-- peso -->
        <div class="col s6">
          <label for="">Altezza</label>
          <input type="number" step="any" name="height" id="height" value="{{$checkup->height}}" class="form-control" placeholder="Altezza">
        </div>

        <!-- altezza -->
        <div class="col s6">
          <label for="">Peso</label>
          <input type="number" step="any" name="weight" id="weight" value="{{$checkup->weight}}" class="form-control" placeholder="Peso">
        </div>
    </div>

  <div class="divider"></div>
    <div class="row">
      <div class="col s6"><h4>VALORI LATO SINISTRO</h4></div>
      <div class="col s6"><h4>VALORI LATO DESTRO</h4></div>
    </div>

    <!-- 3° riga -->
    <div class="row">

        <!-- tricep L -->
        <div class="col s6">
          <label for="">Triceps L</label>
          <input type="number" step="any" name="triceps_L" id="triceps_L" value="{{$checkup->triceps_L}}" class="form-control" placeholder="Triceps L">
        </div>

        <!-- tricep R -->
        <div class="col s6">
          <label for="">Triceps R</label>
          <input type="number" step="any" name="triceps_R" id="triceps_R" value="{{$checkup->triceps_R}}" class="form-control" placeholder="Triceps R">
        </div>
    </div>


    <!-- 4° riga -->
    <div class="row">

        <!-- chest L -->
        <div class="col s6">
          <label for="">Chest L</label>
          <input type="number" step="any" name="chest_L" id="chest_L" value="{{$checkup->chest_L}}" class="form-control" placeholder="Chest L">
        </div>

        <!-- chest R -->
        <div class="col s6">
          <label for="">Chest R</label>
          <input type="number" step="any" name="chest_R" id="nachest_Rme" value="{{$checkup->chest_R}}" class="form-control" placeholder="Chest R">
        </div>
    </div>


  <div class="divider"></div>
    <!-- 5° riga -->
    <div class="row">

        <!-- L -->
        <div class="col s6">
L
        </div>

        <!-- R -->
        <div class="col s6">
R
        </div>
    </div>





      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>
  </form>


@endsection
