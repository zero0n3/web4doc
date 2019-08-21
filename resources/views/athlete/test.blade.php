<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
.blue {
  color: blue;
}
.red {
  color: red;
}
</style>
<table class="tg">


@foreach ($visite as $check)
    <tr>
      @foreach ($check as $item)

        @if (is_array($item))
          <td>{{$item['name']}}
        @else

          @if($loop->last)
            <td class="tg-73oq">{{$item}}</td>
          @else
            <td
              @if($item > $check[$loop->index+1]) class="tg-73oq blue" 
              @elseif($item < $check[$loop->index+1]) class="tg-73oq red" 
              @else class="tg-73oq"
              @endif
            >{{$item}}</td>
          @endif

        @endif

      @endforeach
    </tr>
@endforeach

</table>