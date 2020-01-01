@extends('templates.default')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col s12"><h3>{{$title}}</h3></div>
    </div>

    <div class="row">
        <div class="col s3">
            <h6>Ricerca per ID</h6>
        </div>
        <div class="col s3">
            <h6>Ricerca per Nome atleta</h6>
        </div>
        <div class="col s3">
            <h6>Ricerca per Team</h6>
        </div>
        <div class="col s3">
            <h6>Ricerca per sport</h6>
        </div>
    </div>
    <div class="row">
        <div class="col s3">
            <nav>
                <div class="nav-wrapper">
                    <form action="{{ route('checkup.index') }}" method="get">
                        <div class="input-field">
                            <input id="search" type="search" name="id" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="col s3">
            <nav>
                <div class="nav-wrapper">
                    <form action="{{ route('checkup.index') }}" method="get">
                        <div class="input-field">
                            <input id="search" type="search" name="name" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="col s3">
            <nav>
                <div class="nav-wrapper">
                    <form action="{{ route('checkup.index') }}" method="get">
                        <div class="input-field">
                            <input id="search" type="search" name="team" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="col s3">
            <nav>
                <div class="nav-wrapper">
                    <form action="{{ route('checkup.index') }}" method="get">
                        <div class="input-field">
                            <input id="search" type="search" name="sport" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>





  <form>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">


      <table class="responsive-table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Data</th>
              <th>Nome atleta</th>
              <th>Team</th>
              <th>Sport</th>
              <th>Azioni</th>
          </tr>
        </thead>
        <tbody>

    @forelse ($checkups as $checkup)  
          <tr>
            <td>{{$checkup->id}}</td>
            <td>{{ date('d-m-Y', strtotime($checkup->date)) }}</td>
            <td>{{$checkup->athlete->name}}</td>
            <td>{{$checkup->team->name}}</td>
            <td>{{$checkup->sport->name}}</td>
            <td><a href="/checkup/{{$checkup->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a>
                <a href="{{route('checkup.destroy',$checkup->id)}}" class="waves-effect waves-light btn-small is-danger"><i class="tiny material-icons left">delete</i>DELETE</a></td>
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
{{ $checkups->links('vendor.pagination.default') }}
@endsection

@section('footer')
  @parent

    <script>

     $('document').ready(function () {
        $('div.notification').fadeOut(2500);
        
        $('table').on('click', 'a.is-danger',function (ele) {
          var confirmation = confirm("Sei sicuro di voler rimuovere la visita?");
          ele.preventDefault();
          var urlImg =   $(this).attr('href');
          var tr = ele.target.parentNode.parentNode;

          if (confirmation) {
            $.ajax(
              urlImg,
              {
                method: 'DELETE',
                data : {
                  '_token' : '{{csrf_token()}}'
                },
                complete : function (resp) {
                  console.log(resp);
                  if(resp.responseText == 1){
                    tr.parentNode.removeChild(tr);


                    
                  } else {
                    alert('Problem contacting server');
                  }
                }
              }
            )
          }
        });
      });



    </script>

@endsection

