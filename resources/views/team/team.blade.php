@extends('templates.default')

@section('title', $title)

@section('content')
<div class="row">
  <div class="col s9"><h3>{{$title}}</h3></div>
  <div class="col s3">
    <a href="{{ route('team.create') }}" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">add_box</i>AGGIUNGI</a>
  </div>
</div>

 
  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('team.index') }}" method="get">
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
<h6>Società trovate: {{ $teams->count() }}</h6>

      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nome Team</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($teams as $team)     
          <tr>
            <td>{{$team->id}}</td>
            <td>{{$team->name}}</td>
          </tr>
    @endforeach
        </tbody>
      </table>


</form>
{{-- $teams->links('vendor.pagination.default') --}}
@endsection

@section('footer')
  @parent


@endsection
