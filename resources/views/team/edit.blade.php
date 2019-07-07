@extends('templates.default')

@section('title', $title)

@section('content')

  <form action="/team/{{$team->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">

    <div class="row">
      <div class="col s12"><h4>Modifica {{$team->team_name}}</h4></div>

      <div class="col s6">
        <div class="form-group">
          <label for="">Nome Team</label>
          <input type="text" name="name" id="name" value="{{$team->team_name}}" class="form-control">
        </div>
      </div>
      

      <div class="input-field col s6">
        <select name="company_id">
        @foreach($companys as $company)
            <option value="{{ $company->id }}" {{$company->id == $team->company_id  ? 'selected' : ''}}>{{ $company->company_name}}</option>
        @endforeach
        </select>
        <label>Società di riferimento</label>
      </div>

    
    </div>


    <div class="row">
      <div class="col s6 offset-s9"><span class="flow-text">
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiorna
        <i class="material-icons right">send</i>
      </button>

      </span></div>
    </div>
      

  </form>



@endsection
