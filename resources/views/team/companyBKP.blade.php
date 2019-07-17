@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('search') }}" method="POST">
        @csrf
        <div class="input-field">
          <input id="search" type="search" required name="query" >
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
              <th>Nome società</th>
              <th>Numero di atleti</th>
              <th>Numero di team</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($companys as $company)     
          <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>

            <td>
            @if($company->athletes_count)
               {{$company->athletes_count}}
            @endif
            </td>

            <td>
            @if($company->teams_count)
               {{$company->teams_count}}
            @endif
            </td>
            <td><a href="/company/{{$company->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>


</form>
@endsection

@section('footer')
  @parent


@endsection