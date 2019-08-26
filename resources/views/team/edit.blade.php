@extends('templates.default')

@section('title', $title)

@section('content')

  <h3>Modifica {{$team->name}}</h3>
  @include('partials.inputerrors')
  <form action="/team/{{$team->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
          <label for="">Nome Team</label>
          <input type="text" name="name" id="name" value="{{$team->name}}" class="form-control" placeholder="Nome Team">
      </div>

      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>
  </form>


@endsection
