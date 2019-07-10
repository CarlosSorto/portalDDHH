@foreach ($items->sortBy('order') as $item)
    <li class="mv4 bb b--white pb4">
        <a href="{{ $item->url }}" class="link f3 white">{{ $item->title }}</a>
    </li>
@endforeach
