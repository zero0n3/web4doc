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

<div class="row">
    <div class="col s6"><h5>Visite</h5></div>
    <div class="col s6"><a href="/checkup/{{$athlete->id}}/add" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>AGGIUNGI</a></div>
</div>

<div class="divider"></div>



<div class="divider"></div>
<div class="divider"></div>
<div class="divider"></div>
<div class="divider"></div>

<div class="row">
    <div class="col s12">
        <div class="zui-wrapper">
            <div class="zui-scroller">
                <table class="zui-table">
                    <tbody>
                    @foreach ($visite as $visita)
                                <tr>

                                    @foreach ($visita as $item)
                                        @if ($loop->index === 0)
                                            @if (is_array($item))
                                                <td class="zui-sticky-col">{{$item['name']}}</td>
                                            @else
                                                <td class="zui-sticky-col">{{$item}}</td>
                                            @endif
                                        @else
                                             @if (is_array($item))
                                                <td>{{$item['name']}}</td>
                                            @else
                                                <td>{{$item}}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="divider"></div>





@endsection
