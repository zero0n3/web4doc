@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('athlete.index') }}" method="get">
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
<h6>Atleti trovati: {{ $athletes->count() }}</h6>

      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Nome atleta</th>
              <th>Data di nascita</th>
              <th>Sesso</th>
              <th>Società</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($athletes as $athlete)        
          <tr>
            <td>{{$athlete->id}}</td>
            <td>{{$athlete->name}}</td>
            <td>{{date('d-m-Y', strtotime($athlete->dob))}}</td>
            <td>{{$athlete->sex}}</td>
            <td>
            @if($athlete->company->company_name)
              {{$athlete->company->company_name}}
            @endif
            </td>
             <td><a href="/athlete/{{$athlete->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>



</form>
@endsection

@section('footer')
  @parent


@endsection