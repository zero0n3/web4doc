@extends('templates.default')

@section('title', $title)

@section('content')
 <h3>{{$title}}</h3>

  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Data</th>
              <th>Nome atleta</th>
              <th>Altezza</th>
              <th>Peso</th>
          </tr>
        </thead>
        <tbody>

    @forelse ($checkups as $checkup)  
          <tr>
            <td>{{$checkup->id}}</td>
            <td>{{ date('d-m-Y', strtotime($checkup->date)) }}</td>
            <td>{{$checkup->athlete->name}}</td>
            <td>{{$checkup->height}}</td>
            <td>{{$checkup->weight}}</td>
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


 

  </ul>
</form>
@endsection

@section('footer')
  @parent


@endsection

{{ $checkups->links() }}