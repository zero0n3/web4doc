@extends('templates.default')

@section('title', $title)

@section('content')

<table>
  <tr>
    <th colspan="3"><h4>Dashboard {{$athlete->name}}</h4></th>
    <th><a href="/athlete/{{$athlete->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></th>
  </tr>
  <tr>
    <td>
        <div class="section">
            <h5>Data di nascita</h5>
            <p><h6>{{date('d-m-Y', strtotime($athlete->dob))}}</h6></p>
        </div>
    </td>
    <td>
        <div class="section">
            <h5>Sesso</h5>
            <p><h6>{{$athlete->sex}}</h6></p>
        </div>
    </td>
  </tr>
</table>

 <div class="divider"></div>

<div class="zui-wrapper">
    <div class="zui-scroller">
        <table class="zui-table">
            <tbody>
            @foreach ($visite as $visita)
                <tr>
                    <td class="zui-sticky-col">{{$loop->index}}</td>
                    <td>15</td>
                    <td>C</td>
                    <td>6'11"</td>
                    <td>08-13-1990</td>
                    <td>$4,917,000</td>
                    <td>Kentucky/USA</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="divider"></div>





@endsection
