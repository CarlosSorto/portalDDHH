@if ($paginator->hasPages())
    <div class="center tc">
      <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
              <li class="dib tc mh2 disabled"><span class="icon-left-arrow f4 silver hover-text--purple"></span></li>
          @else
              <li class="dib tc mh2"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="link silver hover-text--purple f4"><span class="icon-left-arrow f4 silver hover-text--purple"></span></a></li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li class="disabled dib tc mh2"><span class="link silver hover-text--purple f4">{{ $element }}</span></li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $paginator->currentPage())
                          <li class=" dib tc mh2 active"><span class="link silver hover-text--purple f4">{{ $page }}</span></li>
                      @else
                          <li class="dib tc mh2"><a class="link silver hover-text--purple f4" href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                  @endforeach
              @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
              <li class="dib tc mh2"><a class="link silver hover-text--purple f4" href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="icon-right-arrow f4 silver hover-text--purple"></span></a></li>
          @else
              <li class="disabled dib tc mh2"><span><span class="icon-right-arrow f4 silver hover-text--purple"></span></span></li>
          @endif
      </ul>
    </div>

@endif
