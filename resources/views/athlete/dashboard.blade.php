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

<br>

  <div class="row">
      <div class="col s12">
          <!--<div class="zui-wrapper">-->
              <div id="table-scroll" class="table-scroll">
                  <table id="main-table" class="main-table">
                      <tbody>
                      <!-- CICLO RIGHE, SEMPRE LO STESSO NUMERO IN BASE ALLE MISURAZIONI -->
                      @forelse ($visite as $check)

                              <tr>
                                @foreach ($check as $item)

                                  @if ($loop->first)
                                      <!-- colonna testi fissi iniziale -->
                                          <th><b>{{$item}}</b></th>
                                  @else
                                      <!-- colonne valori -->
                                      @if (is_array($item))

                                        <td><b>{{$item['name']}}</b></td>

                                      @else

                                        @if($loop->last)

                                          <td>
                                              @if($loop->parent->index === 2) <b><a href="/checkup/{{$item}}/edit">{{$item}}</a></b>
                                              @elseif($loop->parent->index >= 4) {{number_format($item, 2, ',', '.')}}
                                              @else <b>{{$item}}</b>
                                              @endif
                                              
                                          </td>

                                        @else

                                            @if ($loop->parent->index < 4)
                                              <!-- prime 4 righe - non faccio alcun controllo numerico ma stampo e basta -->
                                              <td><b>
                                                      @if($loop->parent->index === 2)
                                                          <a href="/checkup/{{$item}}/edit"/>
                                                      @endif
                                                      {{$item}}</b></td>
                                            @else
                                              <!-- da altezza in poi - check valori -->
                                              
                                              <td>
                                                @if($item === $check[$loop->index+2])
                                                  <span class="black-text text-darken-2"><i/>
                                                @else
                                                  @if($item > $check[$loop->index+2])
                                                    @if ($loop->parent->index === 4 or ($loop->parent->index > 19 and $loop->parent->index < 28) or ($loop->parent->index > 32 and $loop->parent->index < 36))
                                                      <span class="blue-text text-darken-2"><b/>
                                                    @else 
                                                      <span class="red-text text-darken-2">
                                                    @endif
                                                  @else
                                                    @if ($loop->parent->index === 4 or ($loop->parent->index > 19 and $loop->parent->index < 28) or ($loop->parent->index > 32 and $loop->parent->index < 36))
                                                      <span class="red-text text-darken-2">
                                                    @else 
                                                      <span class="blue-text text-darken-2"><b/>
                                                    @endif 
                                                  @endif
                                                @endif
                                                {{number_format($item, 2, ',', '.')}}</span>
                                              
                                              </td>

                                            @endif


                                        @endif

                                      @endif

                                  @endif

                                @endforeach
                              </tr>

                      @empty
                            <tr>
                              <td><b>Nessuna visita inserita</b></td>
                            </tr>
                      @endforelse



                    

                      </tbody>
                  </table>
              </div>
          <!--</div>-->
      </div>
  </div>

<div class="divider"></div>





@endsection
