@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <nav>
    <div class="nav-wrapper">
    <form action="{{ route('search') }}" method="get">
      <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
      <div class="input-group">
        <input type="search" name="search" class="form-control">
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search</button>
        </span>
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

