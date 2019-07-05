@extends('templates.default')

@section('title', $title)

@section('content')

  <h3>MODIFICA</h3>
  <form action="/company/{{$company->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
          <label for="">Nome Società</label>
          <input type="text" name="name" id="name" value="{{$company->company_name}}" class="form-control" placeholder="Nome Società">
      </div>

      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>
  </form>


@endsection
