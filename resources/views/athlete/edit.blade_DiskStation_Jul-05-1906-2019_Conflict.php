@extends('templates.default')

@section('title', $title)

@section('content')

  <h3>Modifica {{$athlete->name}}</h3>
  <form action="/athlete/{{$athlete->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">


    <div class="row">
      <div class="col s12">
               <label for="">Nome Atleta</label>
          <input type="text" name="name" id="name" value="{{$athlete->name}}" class="form-control" placeholder="Nome Atleta">
      </div>
      <div class="col s3">
        <label for="">Data di nascita</label>
        <input type="date" name="dob" id="dob" value="{{$athlete->dob}}" class="form-control" placeholder="Data di nascita">
      </div>
      <div class="col s3">
        <div class="input-field col s3">
      <select>
        <option value="" disabled selected>Choose your option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>
      <label>Materialize Select</label>
    </div>
  </div>
    </div>
      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>
  </form>


@endsection
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });