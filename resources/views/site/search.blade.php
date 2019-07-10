@extends('layouts.site')

@section('content')
  <section class="pv5 ">
    <div class="center w-60-l w-80 mv6 ">
    <form action="{{ route('search') }}" method="get">
        <div class="tc">
            <input type="text" name="q" value="{{ $query }}" class="dib pa2 input-reset ba bg-transparent b--silver silver w-80 mh0">
            <button type="submit" class="dib f5 bo--purple fw4 db link ba bw1 pv2-l ph3-l text--purple hover-bg--purple hover-white bg-animate tc di-l w-15">
                <span class="icon-search"></span>
            </button>            
        </div>
    </form>


      @foreach ($search_contents as $search_content)

      @if ($search_content->sourceable_type === "App\Document")
        <div class="ba bg-white b--black-10 mv4 ph3 pv2 w-100 h6 shadow-5">
            <div class="relative pl5">
                <div class="silver f6 fr ">Documento</div>
                <div class="cf">
                </div>
                <h3 class="f5 fw5 text--blue">{{ $search_content->title }}</h3>
                <p class="silver f6">{{ $search_content->author }}</p>
                <div>{{ $search_content->description }}</div>
            </div>
            <div class="mv4">
                <a href="/repositorio-ddhh/{{$search_content->sourceable_id}}" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ver más</a>
            </div>
        </div>
      @elseif ($search_content->sourceable_type === "App\Organization")
        <div class="ba bg-white b--black-10 mv4 ph3 pv2 w-100 h6 shadow-5">
            <div class="relative pl5">
                <div class="silver f6 fr ">Organización</div>
                <div class="cf">
                </div>
                <h3 class="f5 fw5 text--blue">{{ $search_content->name }}</h3>
                <div>{{ $search_content->description }}</div>
            </div>
            <div class="mv4">
                <a href="/organizaciones-afiliadas/{{$search_content->sourceable_id}}" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ver más</a>
            </div>
        </div>
      @elseif ($search_content->sourceable_type === "App\Formation")
        <div class="ba bg-white b--black-10 mv4 ph3 pv2 w-100 h6 shadow-5">
            <div class="relative pl5">
              <div class="silver f6 fr ">Capacitación</div>
              <div class="cf">
              </div>
                <h3 class="f5 fw5 text--blue">{{ $search_content->title }}</h3>
                <div>{{ $search_content->description }}</div>
            </div>
            <div class="mv4">
                <a href="/formaciones/{{$search_content->sourceable_id}}" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ver más</a>
            </div>
        </div>
      @else

      @endif

      @endforeach
      <div class="center tc">

        {{ $search_contents->links("vendor.pagination.custom") }}
      </div>

    </div>

  </section>


@endsection
