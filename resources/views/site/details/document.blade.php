@extends('layouts.site')

@section('content')
    <section class="pv6-l pv5 ph5 mb4">
        <div class="w-6-l w-80 center cf mt5">
            <h1 class="text--blue fw4 f2">Repositorio</h1>
            <div class="fl w-100 w-70-ns pa2">
                <h2 class="text--blue fw3 f3 w-50-l w-100">{{ $document->title }}</h2>
                <hr class="ba bo--light-blue-50 mw3" align="left">
                <p class="silver lh-copy">{{ $document->description }}</p>
                <p class="mv3"><span class="b">Autor:</span> {{ $document->author }}</p>
                <p class="mv3"><span class="b">Publicación:</span> {{ $document->published_date }}</p>
                <p class="mv3"><span class="b">País:</span> {{ $document->country->name }}</p>
                <p class="mv3"><span class="b">Organización:</span> {{ $document->organization->name }}</p>
                <div class="mv4">
                    <p class="ttu text--light-blue-50 fw6 f5">Categorización Tematica</p>
                    @foreach ($document->topics()->get() as $topic)
                        <p class="ba br1 dib-l tc pa2 silver b--silver f6 mr1">{{ $topic->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="fl w-100 w-30-ns pa2">
                <img src="/storage/documents/o75e3ykM05QMezijEwm1SzIdeXzH4BXIqSVz8dR3.png" alt="">
                <a href="/{{ $document->file }}" target="_blank" class="f5 fw4 ph2 db mt4 tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate" download>Descargar {{ filesize('storage/'.$document->file) }} bytes</a>
            </div>
        </div>
    </section>
@endsection
