@if ($paginator->hasPages())
  <ul class="pagination">
    {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
    <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
    <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif    



            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
    <li class="active">{{ $page }}</li>
                    @else
    <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                        <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
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
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif

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

