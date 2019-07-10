@extends('layouts.site')

@section('content')
    <section class="pt-header pt-header-l">
        <div class="img-cover relative">
            <img src="storage/{{ $cover->get('organizaciones-afiliadas')->image }}" alt="Organizaciones" width="100%" class="db">
            <div class="img-overlay"></div>
            <div class="text-overlay-l dn db-l">
                <h1 class="white ttu fw5 f1-l f3 mb0 mw6">{{ $cover->get('organizaciones-afiliadas')->title }}</h1>
                <hr class="ba bw1 w-50" align="left">
                <p class="mw6-l lh-copy f5 dn db-l">
                    {{ $cover->get('organizaciones-afiliadas')->description }}
                </p>
            </div>
            <div class="text-overlay dn-l db">
                <h1 class="white ttu fw5 f1-l f3 mb0">{{ $cover->get('organizaciones-afiliadas')->title }}</h1>
            </div>
        </div>
    </section>
    {!! $content->get('organizaciones_introduccion') !!}
    <organizations :workareas="{{ $workareas }}" :classifications="{{ $classifications }}"></organizations>
@endsection
