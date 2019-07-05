@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>


  <nav>
    <div class="nav-wrapper">
      <form action="{{ route('search') }}" method="get">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
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
@yield('body')
@endsection

