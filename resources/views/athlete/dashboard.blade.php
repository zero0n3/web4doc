@extends('templates.default')

@section('title', $title)

@section('content')

<style type="text/css">
.blue {
  color: blue;
}
.red {
  color: red;
}
.black {
  color: yellow;
}
</style>

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
                    
                    @foreach ($visite as $check)
                        <tr>
                          @foreach ($check as $item)
                            
                            @if ($loop->first)
                                <!-- colonna testi fissi iniziale -->
                                <td class="zui-sticky-col">{{$item}}</td>
                            @else
                                <!-- colonne valori -->
                                @if (is_array($item))
                                  <td>{{$item['name']}}
                                @else

                                  @if($loop->last)
                                    <td>{{$item}}</td>
                                  @else
                                    <td
                                      @if($item > $check[$loop->index+1]) class="blue" 
                                      @elseif($item < $check[$loop->index+1]) class="red" 
                                      @else class="black"
                                      @endif
                                    >{{$item}}</td>
                                  @endif

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
