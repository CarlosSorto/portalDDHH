<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' csi.gstatic.com; script-src 'self' maps.googleapis.com cdnjs.cloudflare.com 'unsafe-inline' 'unsafe-eval'; object-src 'none'; style-src 'self' fonts.googleapis.com 'unsafe-inline';img-src 'self' maps.googleapis.com csi.gstatic.com maps.gstatic.com; font-src 'self' fonts.gstatic.com fonts.gstatic.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Voyager::setting('title') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <div id="app">
            @include('partials.navbar')
            @yield('content')
            @include('partials.footer')
        </div>
    </main>
    <!-- Scripts -->
    @if (request()->is('contactenos'))
        <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: { lat: 13.681189, lng: -89.235058}
            });

            var marker = new google.maps.Marker({
                position: map.getCenter(),
                icon: './storage/settings/bWyKxsQdWBVnkJlXGKIVNosBrOwE7p2UiGDT5tJw.png',
                map: map
            });
        }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSyxQcRGp-u1hiUl7iAu71dEBhr4Acz2s&callback=initMap">
        </script>
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSyxQcRGp-u1hiUl7iAu71dEBhr4Acz2s"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script> --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
