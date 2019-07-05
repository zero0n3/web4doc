@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
  

      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Sport</th>
              <th>Numero di atleti che lo praticano</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($sports as $sport)  
          <tr>
            <td>{{$sport->id}}</td>
            <td>{{$sport->name}}</td>

            <td>
            @if($sport->athletes_count)
               {{$sport->athletes_count}}
            @endif
            </td>
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