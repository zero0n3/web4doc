@extends('templates.default')

@section('title', $title)

@section('content')
<div class="row">
  <div class="col s9"><h3>{{$title}}</h3></div>
  <div class="col s3">
    <a href="{{ route('company.create') }}" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">add_box</i>AGGIUNGI</a>
  </div>
</div>

 
  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('company.index') }}" method="get">
        <div class="input-field">
          <input id="search" type="search" name="company_name" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<h6>Società trovate: {{ $companys->count() }}</h6>

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
{{-- $companys->links('vendor.pagination.default') --}}
@endsection

@section('footer')
  @parent


@endsection
