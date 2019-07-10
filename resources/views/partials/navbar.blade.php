<header class="w-100 fixed z-5 dn db-l bg-white">
    <nav class="pt1 dt center mw8">
        <a class="link dtc v-mid pl4 pb1" href="/" title="Inicio">
            <div class="dib-l mw3">
                <img src="{{ config('app.url') .'/storage/'. app('voyager')->setting('logo') }}" alt="Logo" class="w-100">
            </div>
            <div class="dib-l pl1">
                <h1 class="gray ttu fw6 f5 w-50">
                    {{ app('voyager')->setting('title')}}
                </h1>
            </div>
        </a>
        <div class="dtc v-mid">
            {{ menu('secondary', 'partials.menu.secondary') }}
        </div>
  </nav>
  <nav class="bg--blue ph4 shadow-5">
      <div class="dt center">
          <ul class="dtc">
              {{ menu('main', 'partials.menu.main') }}
          </ul>
      </div>
  </nav>
</header>
<header class="dn-l db w-100 fixed top-0 z-2">
    <nav class="bg-white ph3 pv1 shadow-1">
        <div class="dtc w-100">
            <a class="link gray dt" href="/" title="Inicio">
                <div class="dtc w3">
                    <img src="{{ config('app.url') .'/storage/'.  app('voyager')->setting('logo') }}" alt="Logo" class="db w-100">
                </div>
                <div class="dtc v-top pl2 pt3 mw5">
                    <h4 class="ttu fw6 f6">
                        {{ app('voyager')->setting('title') }}
                    </h4>
                </div>
                <div class="w-100 bg--blue z-max right flex-l items-center h-100 h-inherit-l fixed relative-l top-0 right-0 left-0 transition-transform transform-off bn-l overflow-auto" id="sidebar" >
                    <div class="cf">
                        <ul class="list fl w-80">
                            {{ menu('responsive', 'partials.menu.responsive') }}
                        </ul>
                        <div class="fl w-20 pa4">
                            <a href="#" id="cancel" class="link silver"><span class="icon-cancel f3 fw6 silver"></span></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="dtc v-mid tr">
            <div class="dt center">
                <div class="dtc">
                    <a href="#" id="hamburger" class="link black"><span class="icon-menu f2 tr"></span></a>
                </div>
            </div>
        </div>
  </nav>
</header>
