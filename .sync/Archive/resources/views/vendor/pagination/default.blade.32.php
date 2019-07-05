@if ($paginator->hasPages())
  <ul class="pagination">
    {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
    <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
    <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif    



        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
    <li class="active">1</li>
                    @else
    <li class="waves-effect"><a href="{{ $url }}">2</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
 


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
    <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @else
    <li class="disabled"><i class="material-icons">chevron_right</i></li>
        @endif    
  </ul>
@endif

@if ($paginator->hasPages())
      <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <i class="material-icons">chevron_left</i>
            </li>
        @else
            <li class="waves-effect">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" ><i class="material-icons">chevron_left</i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">{{ $page }}</li>
                    @else
                        <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">chevron_right</i></a>
            </li>
        @else
            <li class="disabled">
                <i class="material-icons">chevron_right</i>
            </li>
        @endif
    </ul>
@endif

