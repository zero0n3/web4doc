@extends('templates.default')

@section('title', $title)

@section('content')

<table>
  <tr>
    <th colspan="3"><h4>Dashboard {{$team->name}}</h4></th>
    <th><a href="/team/{{$team->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></th>
  </tr>
  <tr>
    <td>  <div class="section">
    ciao


    
    </td>  
  </tr>
</table>

 <div class="divider"></div>

 <table>
  <tr>
    th
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

@endsection
