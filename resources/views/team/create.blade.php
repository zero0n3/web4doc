@extends('templates.default')

@section('title', $title)

@section('content')

  <h4>Aggiungi Società</h4>
  <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="row">
      <div class="form-group">
          <label for="">Nome Società</label>
          <input type="text" name="name" id="name" value="" class="form-control">
      </div>

      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiungi
        <i class="material-icons right">add</i>
      </button>
    </div>
  </form>


@endsection