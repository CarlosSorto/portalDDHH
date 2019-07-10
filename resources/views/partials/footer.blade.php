<footer class="bg--blue">
    <div class="pv4">
        <div class="cf w-70-ns center mb5">
            <div class="fl w-100 w-50-ns pa2 dn dn-m db-ns">
                {!! $content->get('links_footer') !!}
            </div>
            <div class="fl w-50 w-25-ns w-50-m mt5 pr3">
                <img src="{{ config('app.url') .'/storage/'. app('voyager')->setting('logo_usaid') }}" alt="">
            </div>
            <div class="fl w-50 w-25-ns w-50-m mt5 pl3">
                <img src="{{ config('app.url') .'/storage/'. app('voyager')->setting('logo_padf') }}" alt="" style="margin-top: 5px">
            </div>
        </div>
        <div class="dt w-100 center tc">
            <ul class="dtc list">
                {{ menu('footer', 'partials.menu.footer') }}
            </ul>
        </div>
    </div>
    <div class="tc bg--light-blue-10 pa1 pa3 center">
        <h6 class="white f6 ma0 pa0 fw3 tc">&copy; {{ date('Y') }} UCA</h6>
    </div>
</footer>
