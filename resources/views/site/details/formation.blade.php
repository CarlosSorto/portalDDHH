@extends('layouts.site')

@section('content')
    <section class="pt6-l pt5 pb4">
        <div class="w-70-l w-80 center mt5">
            <h1 class="text--blue fw5 f2">Formación en DDHH</h1>
            <div class="dt shadow-4">
                <div class="dtc-l w-100 w-70-ns ph5-l ph3 pt3">
                    <h2 class="fw3 f3 w-80 mb0"><a href="{{ $formation->link }}" target="_blank" class="link text--blue">{{ $formation->title }}</a></h2>
                    <hr class="ba bo--light-blue-50 mw3" align="left">
                    <p class="text--light-blue-50 f6 fw6"><span class="{{ $formation->modality->icon }}"></span> {{ $formation->modality->name }}</p>
                    <div class="mv1">
                        <h4 class="tb f6">Descripción</h4>
                        <p class="silver lh-copy">{{ $formation->description }}</p>
                    </div>
                    <div class="mv1">
                        <h4 class="tb f6">Contacto</h4>
                        <p><span class="icon-mail text--light-blue-50 mr2"></span>
                    
                          {{HTML::mailto($formation->email,HTML::obfuscate($formation->email), ['class' => 'link silver'])}}
                        </p>
                        <p><span class="icon-web text--light-blue-50 mr2"></span> <a href="{{ $formation->website }}" target="_blank" class="link silver">{{ $formation->website }}</a></p>
                    </div>
                </div>
                <div class="dtc-l w-100 w-30-ns bg--light-blue-50 pv4 ph5-l ph3">
                    <h1 class="f2 fw4 white mb0">Detalles</h1>
                    <hr class="ba b--white w-40" align="left">
                    <div class="pv2">
                        <h3 class="fw6 f5 white mb1 pa0">Lugar</h3>
                        <p class="white-70 f6 lh-copy ma0 pa0">{{ $formation->place }}</p>
                    </div>
                    <div class="pv2">
                        <p class="fw6 f5 white mb1 pa0">Duración</p>
                        <p class="white-70 f6 ma0 pa0">{{ $formation->duration }}</p>
                    </div>
                    <div class="pv2">
                        <p class="fw6 f5 white mb1 pa0">Desde</p>
                        <p class="white-70 f6 ma0 pa0">{{ $formation->since->format('d m Y') }}</p>
                    </div>
                    <div class="pv2">
                        <p class="fw6 f5 white mb1 pa0">Hasta</p>
                        <p class="white-70 f6 ma0 pa0">{{ $formation->until->format('d m Y') }}</p>
                    </div>
                    <div class="pv2">
                        <p class="fw6 f5 white mb1 pa0">Organización Responsable</p>
                        <p class="white-70 f6 ma0 pa0">{{ $formation->organizer }}</p>
                    </div>
                    <div class="pv2">
                        <p class="fw6 f5 white mb1 pa0">Dirigido a</p>
                        <p class="white-70 f6 ma0 pa0">{{ $formation->public }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
