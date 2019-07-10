@extends('layouts.site')

@section('content')
<form method="post" action="{{ route('organization.store') }}" enctype="multipart/form-data" novalidate id="form">
    {{ csrf_field() }}
    <section class="pt6-l pt5 pb5 bg--light-blue">
        <div class="w-60-l w-80 center mt5">
            @if (session('success'))
                <div class="flex items-center justify-center pa4 bg-green white">
                    <svg class="w1" data-icon="info" viewBox="0 0 32 32" style="fill:currentcolor">
                    <title>info icon</title>
                    <path d="M16 0 A16 16 0 0 1 16 32 A16 16 0 0 1 16 0 M19 15 L13 15 L13 26 L19 26 z M16 6 A3 3 0 0 0 16 12 A3 3 0 0 0 16 6"></path>
                </svg>
                <span class="lh-title ml3">Los datos se enviaron correctamente, esperar aprobación.</span>
                </div>
            @endif
            <h1 class="text--blue fw4 f2">Registro de Organización</h1>
            <div class="bg-white pa3 mb5">
                <h2 class="text--blue fw4 f3">Datos de la institución</h2>
                <div class="cf">
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="name" placeholder="Nombre*" value="{{ old('name') }}" required>
                            @if($errors->has('name'))
                                <span class="f6 red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="phone" placeholder="Teléfono*" value="{{ old('phone') }}" required>
                            @if($errors->has('phone'))
                                <span class="f6 red">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="email" placeholder="Correo electrónico*" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="f6 red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="description" placeholder="Descripción corta*" value="{{ old('description') }}" required>
                            @if($errors->has('description'))
                                <span class="f6 red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <textarea cols="30" rows="5" class="f-textarea w-100 bo--light-blue-50" placeholder="Descripción larga*" name="long_description" required>
                                {{ old('long_description') }}
                            </textarea>
                            @if($errors->has('long_description'))
                                <span class="f6 red">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="longitude" class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="longitude" placeholder="Longitud*" value="{{ old('longitude') }}" required>
                            @if($errors->has('longitude'))
                                <span class="f6 red">{{ $errors->first('longitude') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="latitude" class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="latitude" placeholder="Latitud*" value="{{ old('longitude') }}" required>
                            @if($errors->has('latitude'))
                                <span class="f6 red">{{ $errors->first('latitude') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <select class="w-100 f-select text--light-blue-50" name="classification_id" required>
                                <option value="" class="text--light-blue-50">Seleccione Clasificación Contemporanea</option>
                                @foreach ($classifications as $classification)
                                    <option value="{{ $classification->id }}" class="text--light-blue-50" {{ (old("classification_id") == $classification->id ? "selected":"") }}>
                                        {{ $classification->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('classification_id'))
                                <span class="f6 red">{{ $errors->first('classification_id') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <select class="w-100 f-select text--light-blue-50 select-chosen" multiple data-placeholder="Seleccione un Área de Especialización" name="workareas[]" required>
                                @foreach ($work_areas as $work_area)
                                    <option value="{{ $work_area->id }}" class="text--light-blue-50" {{ (collect(old('workareas'))->contains($work_area->id)) ? 'selected':'' }}>
                                        {{ $work_area->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('workareas'))
                                <span class="f6 red">{{ $errors->first('workareas') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <select class="w-100 f-select text--light-blue-50" name="country_id" required>
                                <option value="" class="text--light-blue-50">Seleccione un país</option>
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
                            <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" name="website" placeholder="Sitio Web*" value="{{ old('website') }}" required>
                            @if($errors->has('website'))
                                <span class="f6 red">{{ $errors->first('website') }}</span>
                            @endif
                        </div>
                        <div>
                            <input type="file" style="cursor:pointer" name="image" class="dib absolute overflow-hidden o-0 f5 fw4 bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate" required>
                            <label for="" style="cursor:pointer" class="dib f5 fw4 bo--purple link ba bw1 pv2 ph5 text--purple hover-bg--purple hover-white bg-animate">Subir Logo</label><br>
                            @if($errors->has('image'))
                                <span class="f6 red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <gmap :height="300" :marker="{lat: 13.6915591, lng: -89.2497137}" @marker:dragend="updateInputs" :draggable="true"></gmap>
            <div class="bg-white pa3">
                <h2 class="text--blue fw4 f3">Datos del solicitante</h2>
                <div class="cf">
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Nombre del solicitante*" name="applicant" value="{{ old('applicant') }}" required>
                        @if($errors->has('applicant'))
                            <span class="f6 red">{{ $errors->first('applicant') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Institución*" name="institution" value="{{ old('institution') }}" required>
                        @if($errors->has('institution'))
                            <span class="f6 red">{{ $errors->first('institution') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" type="text" placeholder="Cargo*" name="position" value="{{ old('position') }}" required>
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
@endsection
