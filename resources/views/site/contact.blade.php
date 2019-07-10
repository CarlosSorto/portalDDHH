@extends('layouts.site')

@section('content')
    <section class="pt-header pt-header-l">
        <div class="img-cover relative">
            <img src="storage/{{ $cover->get('contactenos')->image }}"
                 alt="Contactenos"
                 width="100%"
                 class="db">
            <div class="img-overlay"></div>
            <div class="text-overlay-l dn db-l">
                <h1 class="white ttu fw5 f1 mb0 mw6">
                    {{ $cover->get('contactenos')->title }}
                </h1>
                <hr class="ba bw1 w-50" align="left">
                <p class="mw6 lh-copy f5 dn db-l">
                    {{ $cover->get('contactenos')->description }}
                </p>
            </div>
            <div class="text-overlay dn-l db">
                <h1 class="white ttu fw5 f1-l f3 mb0">{{ $cover->get('contactenos')->title }}</h1>
            </div>
        </div>
    </section>
    @if (session('success'))
        <div class="flex items-center justify-center pa4 bg-green white">
            <svg class="w1" data-icon="info" viewBox="0 0 32 32" style="fill:currentcolor">
            <title>info icon</title>
            <path d="M16 0 A16 16 0 0 1 16 32 A16 16 0 0 1 16 0 M19 15 L13 15 L13 26 L19 26 z M16 6 A3 3 0 0 0 16 12 A3 3 0 0 0 16 6"></path>
        </svg>
        <span class="lh-title ml3">Correo Electrónico fue enviado con exito.</span>
        </div>
    @endif
    <form method="post" action="{{ route('email.contact') }}" novalidate id="form">
        {{ csrf_field() }}
        <section class="pv4">
            <div class="center w-30-l w-80">
                <span class="icon-mail f1 silver"></span>
                <h1 class="f2 fw3 text--blue mt3">Escríbenos</h1>
                <div class="mb4">
                    <label for="name" class="f6 b db mb2 fw4 text--light-blue-50">Nombre *</label>
                    <input id="name" name="name" class="input-reset f-input bn pa2 mb2 db w-100" type="text" required>
                    @if($errors->has('name'))
                        <span class="f6 red">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb4">
                    <label for="email" class="f6 b db mb2 fw4 text--light-blue-50">Correo Electrónico *</label>
                    <input id="email" name="email" class="input-reset f-input bn pa2 mb2 db w-100" type="email" required>
                    @if($errors->has('email'))
                        <span class="f6 red">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb4">
                    <label for="phone" class="f6 b db mb2 fw4 text--light-blue-50">Teléfono *</label>
                    <input id="phone" name="phone" class="input-reset f-input bn pa2 mb2 db w-100" type="text" required>
                    @if($errors->has('phone'))
                        <span class="f6 red">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb4">
                    <label for="message" class="f6 b db mb2 fw4 text--light-blue-50">Mensaje *</label>
                    <textarea cols="30" rows="5" id="message" name="message" class="f-textarea w-100 bo--light-blue-50 black" required></textarea>
                    @if($errors->has('message'))
                        <span class="f6 red">{{ $errors->first('message') }}</span>
                    @endif
                </div>
                <div class="tc">
                    <button type="submit" class="f5 fw4 center ph5 bo--purple link ba bw1 pv2 hover-bg-white hover-text--purple bg--purple white">Enviar</button>
                </div>
            </div>
        </section>
    </form>
    <section class="pt6">
          <div class="cf">
            <div class="fl w-100 w-50-ns">
                <div class="bg--purple pv4 bn" style="height: 22rem">
                    <div class="mh5 w-30-l w-80 center">
                        <div class="white relative pl4 mb4">
                            <span class="icon-map mt4 f4 absolute top-0 left-0"></span>
                            <p>Dirección</p>
                            <p class="fw3 f6 lh-copy">{{ app('voyager')->setting('contact_direction') }}</p>
                        </div>
                        <div class="white relative pl4 mb4">
                            <span class="icon-mail mt2 f4 absolute top-0 left-0"></span>
                            <p>Correo Electrónico</p>
                            <p class="fw3 f6">
                              {{HTML::mailto(app('voyager')->setting('contact_email'),HTML::obfuscate(app('voyager')->setting('contact_email')), ['class' => 'link white'])}}
                            </p>
                        </div>
                        <div class="white relative pl4">
                            <span class="icon-phone mt2 f4 absolute top-0 left-0"></span>
                            <p>Teléfono</p>
                            <p class="fw3 f6">{{ app('voyager')->setting('contact_phone') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl w-100 w-50-ns">
                <div class="bg-white w-100 h5" id="map" style="height: 22rem">
                </div>
            </div>
        </div>
    </section>
@endsection
