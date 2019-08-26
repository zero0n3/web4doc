@if(count($errors))
    <div class="card-panel red darken-1">

            @foreach($errors->all() as $error)
                <span class="white-text">{{$error}}</span><br>
            @endforeach

    </div>
@endif
