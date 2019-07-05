@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('team.index') }}" method="get">
        <div class="input-field">
          <input id="search" type="search" name="team_name" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


     <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nome team</th>
              <th>Società che possiede il team</th>
              <th>Numero di atleti nel team</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($teams as $team)   
          <tr>
            <td>{{$team->id}}</td>
            <td>{{$team->team_name}}</td>

            <td>
            @if($team->company->company_name)
               {{$team->company->company_name}}
            @endif
            </td>

            <td>
            @if($team->athletes_count)
               {{$team->athletes_count}}
            @endif
            </td>
            <td><a href="/team/{{$team->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>



</form>
{{ $teams->links(vendor.pagination.default) }}
@endsection

@section('footer')
  @parent


@endsection