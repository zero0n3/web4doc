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
                    <!-- CICLO RIGHE, SEMPRE LO STESSO NUMERO IN BASE ALLE MISURAZIONI -->
                    @forelse ($visite as $check)

                            <tr>
                              @foreach ($check as $item)

                                @if ($loop->first)
                                    <!-- colonna testi fissi iniziale -->
                                        <td class="zui-sticky-col"><b>{{$item}}</b></td>
                                @else
                                    <!-- colonne valori -->
                                    @if (is_array($item))
                                      <td><b>{{$item['name']}}</b></td>
                                    @else

                                      @if($loop->last)
                                        <td>
                                            @if($loop->parent->index === 2)
                                                <a href="/checkup/{{$item}}/edit"/>
                                            @endif
                                            {{$item}}</td>
                                      @else

                                          @if ($loop->parent->index < 4)
                                            <!-- prime 4 righe - non faccio alcun controllo numerico ma stampo e basta -->
                                            <td><b>
                                                    @if($loop->parent->index === 2)
                                                        <a href="/checkup/{{$item}}/edit"/>
                                                    @endif
                                                    {{$item}}</b></td>
                                          @else
                                            <td>
                                              @if($item > $check[$loop->index+1]) <span class="blue-text text-darken-2"><b/>
                                              @elseif($item < $check[$loop->index+1]) <span class="red-text text-darken-2">
                                              @else <span class="black-text text-darken-2"><i/>
                                              @endif
                                              {{number_format($item, 2, ',', '.')}}</span></td>
                                          @endif


                                      @endif

                                    @endif

                                @endif

                              @endforeach
                            </tr>

                    @empty
                          <tr>
                            <td colspan="4"><b>Nessuna visita inserita</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                    @endforelse



                  

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="divider"></div>





@endsection
