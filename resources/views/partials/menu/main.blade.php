@foreach ($items->sortBy('order') as $item)
    <li class="fl dn db-l pv3 hover-bg--purple {{ url($item->link()) == url()->current() ? 'bg--purple' : '' }}">
        <a class="f6 fw4 no-underline white ph3" href="{{ $item->url }}">{{ $item->title }}</a>
    </li>
@endforeach
