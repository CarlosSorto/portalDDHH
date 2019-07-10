@foreach ($items->sortBy('order') as $item)
    <a class="dib-l link gray mh3 fw5 f6" href="{{ $item->url }}" title="Contactenos">{{ $item->title }}</a>
@endforeach
