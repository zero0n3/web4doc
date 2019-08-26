@extends('templates.default')

@section('title', $title)

@section('content')
  <form action="{{route('sport.store')}}" method="POST" enctype="multipart/form-data"  name="addsport">
    {{csrf_field()}}
      @include('partials.inputerrors')
      <div class="row">
          <div class="form-group">
              <label for="">Nome Sport</label>
              <input required type="text" name="name" id="name" class="form-control">
          </div>
        </div>

        <button class="btn waves-effect waves-light btn-small" type="submit" id="submit" name="action">Aggiungi
          <i class="material-icons right">add</i>
        </button>

      </span></div>
    </div>
      

  </form>


@endsection


@section('validazione')

    $(document).ready(function() {
        $("#submit").click(function(event) {
            if( !confirm('Confermi l\'inserimento dello sport?') ){
                event.preventDefault();
            }
        });
    });


@endsection
