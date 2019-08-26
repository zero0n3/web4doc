@extends('templates.default')

@section('title', $title)

@section('content')

  <h3>Modifica {{$athlete->name}}</h3>
  @include('partials.inputerrors')
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

      <div class="input-field col s3">
        <select name="sex">

          @if($athlete->sex === 'M')
            <option value="M" selected>Maschio</option>
            <option value="F">Femmina</option>
          @else 
            <option value="M">Maschio</option>
            <option value="F" selected>Femmina</option> 
          @endif

        </select>
        <label>Sesso</label>
      </div>

    </div>
      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>
  </form>


@endsection
