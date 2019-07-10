@extends('layouts.site')

@section('content')
    <section class="pt-header pt-header-l">
        <div class="img-cover relative">
            <img src="storage/{{ $cover->get('acerca-del-portal')->image }}" alt="" width="100%" class="db">
            <div class="img-overlay"></div>
            <div class="text-overlay-l dn db-l">
                <h1 class="white ttu fw5 f1-l f3 mb0 mw6">{{ $cover->get('acerca-del-portal')->title }}</h1>
                <hr class="ba bw1 w-50" align="left">
                <p class="mw6 lh-copy f5 dn db-l">
                    {{ $cover->get('acerca-del-portal')->description }}
                </p>
            </div>
            <div class="text-overlay dn-l db">
                <h1 class="white ttu fw5 f1-l f3 mb0">{{ $cover->get('acerca-del-portal')->title }}</h1>
            </div>
        </div>
    </section>
    {!! $content->get('acerca_del_portal_iniciativa') !!}
    {!! $content->get('acerca_del_portal_porque_surgio') !!}
    {!! $content->get('acerca_del_portal_beneficios') !!}
    <section class="bg--light-blue pv4">
        {!! $content->get('acerca_del_portal_organizaciones') !!}
        <div class="cf w-60-l w-80 center tc">
            @foreach ($founders as $founder)
                <div class="fl w-20-l w-50-m w-100 pa2">
                    <div class="ba bg-white b--black-10 mv4 w-100 mw6 pa4 h6 shadow-5">
                        <img src="storage/{{ $founder->image }}" alt="{{ $founder->name }}" class="w-100">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="pv4">
       <div class="center w-60-l w-80">
           <h1 class="tc text--blue fw4 f2">Galería</h1>
           <div class="owl-carousel owl-theme center" id="owl-galery" data-slider-id="1">
               @foreach ($galleries as $gallery)
                   <img class="owl-lazy item img-carousel" data-src="storage/{{ $gallery->image }}" alt="{{ $gallery->name }}">
               @endforeach
           </div>
           <div class="owl-thumbs" data-slider-id="1">
               @foreach ($galleries as $gallery)
                   <button class="owl-thumb-item">
                       <img class="owl-lazy tc" src="storage/{{ $gallery->image }}" alt="{{ $gallery->name }}">
                   </button>
               @endforeach
           </div>
       </div>
   </section>
@endsection
