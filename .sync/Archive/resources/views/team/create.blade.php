@extends('templates.default')

@section('title', $title)

@section('content')


    <div class="row">
      <div class="col s12"><h4>Aggiungi Team</h4></div>

      <div class="col s6">6-columns (one-half)</div>
      <div class="col s6">6-columns (one-half)</div>
    </div>






  <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}



        <div class="form-group">
          <label for="">Nome Team</label>
          <input type="text" name="team_name" id="team_name" value="" class="form-control">
        </div>

      


        <select name="company_id">
          @foreach($companys as $company)
            <option value="{{ $company->id }}">{{ $company->company_name}}</option>
          @endforeach
        </select>
        <label>Società di riferimento</label>






      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Aggiungi
        <i class="material-icons right">add</i>
      </button>
  </form>


@endsection