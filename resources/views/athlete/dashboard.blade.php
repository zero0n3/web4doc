@extends('templates.default')

@section('title', $title)

@section('content')

<table>
  <tr>
    <th colspan="3"><h4>Dashboard {{$athlete->name}}</h4></th>
    <th><a href="/athlete/{{$athlete->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></th>
  </tr>
  <tr>
    <td>  <div class="section">
    <h5><h5>Data di nascita</h5>
    <p><h6>{{date('d-m-Y', strtotime($athlete->dob))}}</h6></p>
  </div></td>
    <td>  <div class="section">
    <h5><h5>Sesso</h5>
    <p><h6>{{$athlete->sex}}</h6></p>
  </div></td>
    <td>  <div class="section">
    <h5><h5>Società</h5>
    <p><h6>{{$athlete->company->company_name}}</h6></p>
  </div></td></td>
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
