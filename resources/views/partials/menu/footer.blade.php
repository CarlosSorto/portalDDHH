@foreach ($items->sortBy('order') as $item)
    <li class="dib-l tc {{ !$loop->last ? 'br-l' : '' }}  b--white mv4">
        <a class="f6-l fw4 no-underline white hover-text--purple ph4-l f5" href="{{ $item->url }}"> {{ $item->title }}
        </a>
    </li>
@endforeach
