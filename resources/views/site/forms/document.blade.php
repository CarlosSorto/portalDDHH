@extends('layouts.site')

@section('content')
<form method="post" action="{{ route('document.store') }}" enctype="multipart/form-data" novalidate id="form">
    {{ csrf_field() }}
    <section class="pt6-l pt6 pb5 bg--light-blue">
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
            <h1 class="text--blue fw4 f2">Registro de Documentos</h1>
            <div class="bg-white pa3 mb5">
                <h2 class="text--blue fw4 f3">Datos de documento</h2>
                <div class="cf">
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <input id="title" class="input-reset f-input bn pa2 mb2 db w-100" name="title" type="text" placeholder="Título*" value="{{ old('title')}}" required>
                            @if($errors->has('title'))
                                <span class="f6 red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="author" class="input-reset f-input bn pa2 mb2 db w-100" name="author" type="text" placeholder="Autor*" value="{{ old('author')}}" required>
                            @if($errors->has('author'))
                                <span class="f6 red">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="published_date" class="input-reset f-input bn pa2 mb2 db w-100" name="published_date" type="text" placeholder="Fecha de Publicación*" value="{{ old('published_date')}}" required>
                            @if($errors->has('published_date'))
                                <span class="f6 red">{{ $errors->first('published_date') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="description" class="input-reset f-input bn pa2 mb2 db w-100" name="description" type="text" placeholder="Descripción*" value="{{ old('description')}}" required>
                            @if($errors->has('description'))
                                <span class="f6 red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <textarea name="long_description" cols="30" rows="5" class="f-textarea w-100 bo--light-blue-50" placeholder="Descripción Larga*" required>
                                {{ old('long_description') }}
                            </textarea>
                            @if($errors->has('long_description'))
                                <span class="f6 red">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="fl w-100 w-50-ns ph3">
                        <div class="mb4">
                            <select class="w-100 f-select text--light-blue-50" name="country_id" required>
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
                            <select class="w-100 select-chosen" name="topics[]" multiple="true" data-placeholder="Seleccione un Categoría Tematica" required>
                                @foreach ($topics as $value)
                                    <option value="{{ $value->id }}" class="text--light-blue-50" {{ (collect(old('topics'))->contains($value->id)) ? 'selected':'' }}>
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('topics'))
                                <span class="f6 red">{{ $errors->first('topics') }}</span>
                            @endif
                        </div>
                        <div class="mb4">
                            <input id="words" class="input-reset f-input bn pa2 mb2 db w-100" name="keywords" type="text" placeholder="Palabras clave*" value="{{ old('keywords') }}" required>
                            @if($errors->has('keywords'))
                                <span class="f6 red">{{ $errors->first('keywords') }}</span>
                            @endif
                        </div>
                        <div class="tr mt5">
                            <input type="file" name="file" id="file" style="cursor:pointer" class="dib absolute overflow-hidden o-0 f5 fw4 bo--purple link ba bw1 pv2  text--purple hover-bg--purple hover-white bg-animate" value="{{ old('file') }}" required>
                            <label for="file" style="cursor:pointer" class="dib f5 fw4 bo--purple link ba bw1 pv2 ph5 text--purple hover-bg--purple hover-white bg-animate" required>Subir Documento</label><br>
                            @if($errors->has('file'))
                                <span class="f6 red">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white pa3">
                <h2 class="text--blue fw4 f3">Datos de documento</h2>
                <div class="cf">
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" name="name_applicant" type="text" placeholder="Nombre del solicitante*" value="{{ old('name_applicant') }}" required>
                        @if($errors->has('name_applicant'))
                            <span class="f6 red">{{ $errors->first('name_applicant') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" name="institution" type="text" placeholder="Institución*" value="{{ old('institution') }}" required>
                        @if($errors->has('institution'))
                            <span class="f6 red">{{ $errors->first('institution') }}</span>
                        @endif
                    </div>
                    <div class="fl w-100 w-third-ns pa2">
                        <input class="input-reset f-input bn pa2 mb2 db w-100" name="position" type="text" placeholder="Cargo*" value="{{ old('position') }}" required>
                        @if($errors->has('position'))
                            <span class="f6 red">{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                </div>
                <div class="tr mt4 mb3">
                    <button type="submit" class="f5 fw4 bo--purple ba bw1 pv2 ph5 text--purple hover-bg--purple hover-white bg-animate">Enviar</button>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
