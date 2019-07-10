@extends('layouts.site')

@section('content')
    <section class="pt6-l pt5 mb2">
        <div class="w-80 w-70-l center cf mt5">
            <h1 class="text--blue fw4 f2">Directorio de Organizaciones</h1>
            <div class="fl w-100 w-40-l pa2">
                <div class="pa5 shadow-5">
                    <img src="/storage/{{ $organization->image }}" alt="{{ $organization->name }}" width="100%">
                </div>
            </div>
            <div class="fl w-100 w-60-l ph4">
                <h2 class="text--blue fw3 f3 mb0">{{ $organization->name }}</h2>
                <hr class="ba bo--light-blue-50 mw3" align="left">
                <p class="lh-copy silver">{{ $organization->description }}</p>
                <p class="f5 fw6">Clasificación contemporanea</p>
                <p class="silver lh-copy">{{ $organization->classification->name }}</p>
                <p class="f5 fw6">Sitio Web</p>
                <a href="{{ $organization->website }}" target="_blank" class="link">
                    <p class="silver lh-copy">{{ $organization->website }}</p>
                </a>
                <div class="mv4">
                    <p class="ttu text--light-blue-50 fw6 f5">Áreas de Trabajo</p>
                    @foreach ($organization->work_areas()->get() as $work_area)
                        <p class="ba br1 bw1 dib-l tc pa2 silver b--silver f6 mr1">{{ $work_area->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="pb4">
       <div class="w-80 w-70-l center">
           <h1 class="f2 fw4 text--blue">Información de Contacto</h1>
           <div class="cf">
                <div class="fl w-100 w-70-ns pa2">
                    @if ($organization->latitude and $organization->longitude)
                        <gmap :height="300" :marker="{lat: {{ $organization->latitude }}, lng: {{ $organization->longitude }}}" :draggable="false"></gmap>                        
                    @endif
                </div>
                <div class="fl w-100 w-30-ns pa2">
                    <div class="relative pl4 mb4">
                        <span class="icon-mail silver f4 absolute top-0 left-0"></span>
                        <p class="silver fw6 f6 mb2">Correo Electrónico</p>
                        <p class="fw3 silver f6 ma0">
                          {{HTML::mailto($organization->email,HTML::obfuscate($organization->email), ['class' => 'link silver'])}}

                        </p>
                    </div>
                    <div class="relative pl4 mb4">
                        <span class="icon-phone silver f4 absolute top-0 left-0"></span>
                        <p class="silver fw6 f6 mb2">Teléfono</p>
                        <a href="tel: {{ $organization->phone }}" class="link"><p class="fw3 silver f6 ma0">{{ $organization->phone }}</p></a>
                    </div>
                    <div class="relative pl4">
                        <span class="icon-ubicacion silver f4 absolute top-0 left-0"></span>
                        <p class="silver fw6 f6 mb2">Dirección</p>
                        <p class="fw3 f6 lh-copy silver ma0">Ave. El Espino, Urb. Madre Selva No.65, Antiguo Cuscatlán, La Libertad, El Salvador</p>
                    </div>
                </div>
           </div>
       </div>
    </section>
@endsection
