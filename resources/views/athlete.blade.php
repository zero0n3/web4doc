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
              <th>Nome atleta</th>
              <th>Società</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($athletes as $athlete)        
          <tr>
            <td>{{$athlete->id}}</td>
            <td>{{$athlete->name}}</td>
            <td>
            @if($athlete->company->company_name)
              {{$athlete->company->company_name}}
            @endif
            </td>
          </tr>
    @endforeach
        </tbody>
      </table>



</form>
@endsection

@section('footer')
  @parent


@endsection