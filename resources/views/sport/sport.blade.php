@extends('templates.default')

@section('title', $title)

@section('content')
<div class="row">
  <div class="col s9"><h3>{{$title}}</h3></div>
  <div class="col s3">
    <a href="{{ route('sport.create') }}" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">add_box</i>AGGIUNGI</a>
  </div>
</div>

  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('sport.index') }}" method="get">
        <div class="input-field">
          <input id="search" type="search" name="name" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<h6>Sport trovati: {{ $sports->count() }}</h6>  

      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Sport</th>
          </tr>
        </thead>
        <tbody>



    @foreach ($sports as $sport)        
          <tr>
            <td>{{$sport->id}}</td>
            <td>{{$sport->name}}</td>
            <td><a href="/sport/{{$sport->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
             </tr>
    @endforeach

        </tbody>
      </table>




</form>
@endsection

@section('footer')
  @parent


@endsection
