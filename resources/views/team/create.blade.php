@extends('templates.default')

@section('title', $title)

@section('content')

  <h4>Aggiungi Team</h4>
  @include('partials.inputerrors')
  <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data" name="addteam">
    {{csrf_field()}}
  <div class="row">
      <div class="form-group">
          <label for="">Nome Team</label>
          <input required type="text" name="name" id="name" class="form-control">
      </div>

      

      
      <button class="btn waves-effect waves-light btn-small" type="submit" id="submit" name="action">Aggiungi
        <i class="material-icons right">add</i>
      </button>
    </div>
  </form>


@endsection

@section('validazione')

    $(document).ready(function() {
        $("#submit").click(function(event) {
            if( !confirm('Confermi l\'inserimento del team?') ){
                event.preventDefault();
            }
        });
    });


@endsection
