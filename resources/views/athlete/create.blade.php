@extends('templates.default')

@section('title', $title)

@section('content')

  <form action="{{route('athlete.store')}}" method="POST" enctype="multipart/form-data">
      @include('partials.inputerrors')
    {{csrf_field()}}



    <div class="row">
      <div class="col s12"><h4>Aggiungi Atleta</h4></div>

    </div>

    <div class="row">
      <div class="col s12">
          <label for="">Nome Atleta</label>
          <input required type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="col s3">
        <label for="">Data di nascita</label>
        <input required type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
      </div>

      <div class="input-field col s3">
        <select name="sex">
            <option value="M" selected>Maschio</option>
            <option value="F">Femmina</option>
        </select>
        <label>Sesso</label>
      </div>


    </div>

    <div class="row">
      <div class="col s6 offset-s9"><span class="flow-text">
        <button class="btn waves-effect waves-light btn-small" type="submit" id="submit" name="action">Aggiungi
          <i class="material-icons right">add</i>
        </button>

      </span></div>
    </div>
      

  </form>


@endsection

@section('validazione')

    $(document).ready(function() {
        $("#submit").click(function(event) {
            if( !confirm('Confermi l\'inserimento dell\'atleta?') ){
                event.preventDefault();
            }
        });
    });


@endsection
