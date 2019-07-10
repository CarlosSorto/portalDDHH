@extends('layouts.site')

@section('content')
    <form method="post" action="{{ route('formation.store') }}" enctype="multipart/form-data" novalidate id="form">
        {{ csrf_field() }}
    <section class="pt6-l pt6 pb5 bg--light-blue">
        <div class="w-60-l w-80 center mt5-l">
            @if (session('success'))
                <div class="flex items-center justify-center pa4 bg-green white">
                    <svg class="w1" data-icon="info" viewBox="0 0 32 32" style="fill:currentcolor">
                    <title>info icon</title>
                    <path d="M16 0 A16 16 0 0 1 16 32 A16 16 0 0 1 16 0 M19 15 L13 15 L13 26 L19 26 z M16 6 A3 3 0 0 0 16 12 A3 3 0 0 0 16 6"></path>
                </svg>
                <span class="lh-title ml3">Los datos se enviaron correctamente, esperar aprobación.</span>
                </div>
            @endif
            <h1 class="text--blue fw4 f2">Inscribe tu actividad formativa</h1>
            <div class="bg-white pa3 mb5">
                <h2 class="text--blue fw4 f3">Datos de la actividad</h2>
                <div class="cf">
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Titulo*" name="title" value="{{ old('title') }}" required>
                            @if($errors->has('title'))
                                <span class="f6 red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Tiempo de Duración (Horas)*" name="duration" value="{{ old('duration') }}" required>
                            @if($errors->has('duration'))
                                <span class="f6 red">{{ $errors->first('duration') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="email" placeholder="Correo Electronico*" name="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="f6 red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <textarea name="description" id="" cols="30" rows="5" class="f-textarea w-100 bo--light-blue-50" placeholder="Descripción*" required>
                                {{ old('description') }}
                            </textarea>
                            @if($errors->has('description'))
                                <span class="f6 red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="url" placeholder="Enlace*" name="link" value="{{ old('link') }}" required>
                            @if($errors->has('link'))
                                <span class="f6 red">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <select class="w-100 f-select text--light-blue-50" name="formation_type_id" required>
                                <option value="" class="text--light-blue-50">Seleccione un Tipo de Formación</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" class="text--light-blue-50" {{ (old("formation_type_id") == $type->id ? "selected":"") }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('formation_type_id'))
                                <span class="f6 red">{{ $errors->first('formation_type_id') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <select name="modality_id" class="w-100 f-select text--light-blue-50" required>
                                <option value="" class="text--light-blue-50">Seleccione una Modalidad</option>
                                @foreach ($modalities as $modality)
                                    <option value="{{ $modality->id }}" class="text--light-blue-50" {{ (old("modality_id") == $modality->id ? "selected":"") }}>
                                        {{ $modality->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('modality_id'))
                                <span class="f6 red">{{ $errors->first('modality_id') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <select name="country_id" class="w-100 f-select text--light-blue-50" required>
                                <option value="" class="text--light-blue-50">Seleccione un País</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" class="text--light-blue-50" {{ (old("country_id") == $country->id ? "selected":"") }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('country_id'))
                                <span class="f6 red">{{ $errors->first('country_id') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="url" placeholder="Sitio Web*" name="website" value="{{ old('website') }}" required>
                            @if($errors->has('website'))
                                <span class="f6 red">{{ $errors->first('website') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset bn pa2 f-input mb2 db w-100" type="text" placeholder="Lugar*" name="place" value="{{ old('place') }}" required>
                            @if($errors->has('place'))
                                <span class="f6 red">{{ $errors->first('place') }}</span>
                            @endif
                        </div>
                        <div class="cf">
                            <div class="fl w-100 w-50-ns pr3">
                                <div class="mb4">
                                    <input id="since_date" class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Fecha de Inicio*" name="since" value="{{ old('since') }}" required>
                                    @if($errors->has('since'))
                                        <span class="f6 red">{{ $errors->first('since') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="fl w-100 w-50-ns">
                                <div class="mb4">
                                    <input id="until_date" class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Fecha de Finalización*" name="until" value="{{ old('until') }}" required>
                                    @if($errors->has('until'))
                                        <span class="f6 red">{{ $errors->first('until') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb4">
                            <input class="input-reset bn f-input pa2 mb2 db w-100" type="text" placeholder="Dirigido a*" name="public" value="{{ old('public') }}" required>
                            @if($errors->has('public'))
                                <span class="f6 red">{{ $errors->first('public') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white pa3">
                <h2 class="text--blue fw4 f3">Datos del solicitante</h2>
                <div class="cf">
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Nombre del solicitante*" name="representative" value="{{ old('representative') }}" required>
                        @if($errors->has('representative'))
                            <span class="f6 red">{{ $errors->first('representative') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Institución*" name="organizer" value="{{ old('organizer') }}" required>
                        @if($errors->has('organizer'))
                            <span class="f6 red">{{ $errors->first('organizer') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input id="words" class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Cargo*" name="position" value="{{ old('position') }}" required>
                        @if($errors->has('position'))
                            <span class="f6 red">{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                </div>
                <div class="tr mt4 mb3">
                    <button type="submit" class="f5 fw4 bo--purple link ba bw1 pv2 ph5 text--purple hover-bg--purple hover-white bg-animate">Enviar</button>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
