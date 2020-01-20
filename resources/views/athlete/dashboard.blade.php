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


<button onclick="myFunction()">Beta</button>

<div id="myDIV">
        <table class="responsive-table">
        <thead>
          <tr>
              <th class="rotate"><div><span>Team</span></div></th>
              <th class="rotate"><div><span>Sport</span></div></th>
              <th class="rotate"><div><span>iD Visita</span></div></th>
              <th class="rotate"><div><span>Data visita</span></div></th>
              <th class="rotate"><div><span>Altezza</span></div></th>
              <th class="rotate"><div><span>Peso</span></div></th>
              <th class="rotate"><div><span>Tricipite Sx</span></div></th>
              <th class="rotate"><div><span>Tricipite Dx</span></div></th>
              <th class="rotate"><div><span>Petto Sx</span></div></th>
              <th class="rotate"><div><span>Petto Dx</span></div></th>
              <th class="rotate"><div><span>Ascella Sx</span></div></th>
              <th class="rotate"><div><span>Ascella Dx</span></div></th>
              <th class="rotate"><div><span>Scapola Sx</span></div></th>
              <th class="rotate"><div><span>Scapola Dx</span></div></th>
              <th class="rotate"><div><span>Iliaca Sx</span></div></th>
              <th class="rotate"><div><span>Iliaca Dx</span></div></th>
              <th class="rotate"><div><span>Addominale Sx</span></div></th>
              <th class="rotate"><div><span>Addominale Dx</span></div></th>
              <th class="rotate"><div><span>Coscia Sx</span></div></th>
              <th class="rotate"><div><span>Coscia Dx</span></div></th>
              <th class="rotate"><div><span>Spalle</span></div></th>
              <th class="rotate"><div><span>Petto</span></div></th>
              <th class="rotate"><div><span>Fianchi</span></div></th>
              <th class="rotate"><div><span>Braccio Sx</span></div></th>
              <th class="rotate"><div><span>Braccio Dx</span></div></th>
              <th class="rotate"><div><span>Gamba Sx</span></div></th>
              <th class="rotate"><div><span>Gamba Dx</span></div></th>
              <th class="rotate"><div><span>Spirometria</span></div></th>
              <th class="rotate"><div><span>Massa grassa</span></div></th>
              <th class="rotate"><div><span>BMI</span></div></th>
              <th class="rotate"><div><span>Frq Riposo</span></div></th>
              <th class="rotate"><div><span>Frq Stress</span></div></th>
              <th class="rotate"><div><span>Frq 1min</span></div></th>
              <th class="rotate"><div><span>Step 1</span></div></th>
              <th class="rotate"><div><span>Step 2</span></div></th>
              <th class="rotate"><div><span>Step 3</span></div></th>
          </tr>
        </thead>

        <tbody>
  @forelse ($visite_h as $visita)
          <tr>
            <td>{{$visita->team->name}}</td>
            <td>{{$visita->sport->name}}</td>
            <td><b><a href="/checkup/{{$visita->id}}/edit">{{$visita->id}}</a></b></td>
            <td>{{date('d-m-Y', strtotime($visita->date))}}</td>
            <td>{{number_format($visita->altezza, 2, ',', '.')}}</td>
            <td>{{number_format($visita->peso, 2, ',', '.')}}</td>
            <td>{{number_format($visita->tricipite_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->tricipite_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->petto_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->petto_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->ascella_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->ascella_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->scapola_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->scapola_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->iliaca_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->iliaca_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->addominale_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->addominale_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->coscia_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->coscia_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->spalle, 2, ',', '.')}}</td>
            <td>{{number_format($visita->petto, 2, ',', '.')}}</td>
            <td>{{number_format($visita->anche, 2, ',', '.')}}</td>
            <td>{{number_format($visita->braccio_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->braccio_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->gamba_L, 2, ',', '.')}}</td>
            <td>{{number_format($visita->gamba_R, 2, ',', '.')}}</td>
            <td>{{number_format($visita->spirometria, 2, ',', '.')}}</td>
            <td>{{number_format($visita->massa_grassa, 2, ',', '.')}}</td>
            <td>{{number_format($visita->bmi, 2, ',', '.')}}</td>
            <td>{{number_format($visita->frq_riposo, 2, ',', '.')}}</td>
            <td>{{number_format($visita->frq_stress, 2, ',', '.')}}</td>
            <td>{{number_format($visita->frq_1min, 2, ',', '.')}}</td>
            <td>{{number_format($visita->step1, 2, ',', '.')}}</td>
            <td>{{number_format($visita->step2, 2, ',', '.')}}</td>
            <td>{{number_format($visita->step3, 2, ',', '.')}}</td>
          </tr>
  @empty
        <tr>
          <td><b>Nessuna visita inserita</b></td>
        </tr>
  @endforelse
        </tbody>
      </table>

</div>


@endsection
