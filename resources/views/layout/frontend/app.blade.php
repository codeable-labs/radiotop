<!DOCTYPE html>
<html class="no-js" lang="es-PE">

<head prefix="og: http://ogp.me/ns#">
    <meta http-equiv="Cache-control" content="public">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Radio Top</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="" />
    <link rel='shortlink' href="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <link rel="shortcut icon" href="" />

    <link rel="stylesheet" href="\css\site.css">

</head>

<body>

    <header class="header">
        <div class="limit header__inset">
            <a href="/" class="header__title">
                <img src="/images/radiotop.svg" alt="Radio Top TV" />
            </a>
            @if ( !str_contains( $_SERVER['REQUEST_URI'], 'ranking/') )
            <nav class="header__nav fnHeaderNav">
                <a href="/#ranking" class="header__nav__link {{{ (Request::is('/#ranking') ? '-active-' : '') }}}">Rankings</a>
                <a href="/radio-top-tv" class="header__nav__link  {{{ (Request::is('radio-top-tv') ? '-active-' : '') }}}">Radio Top TV</a>
                <a href="/metodologia" class="header__nav__link  {{{ (Request::is('metodologia') ? '-active-' : '') }}}">Sobre nosotros</a>
                <a href="/notas-de-prensa" class="header__nav__link  {{{ (Request::is('notas-de-prensa') ? '-active-' : '') }}}">Radar RadioTOP</a>
                <a href="/anuncia-con-nosotros" class="header__nav__link  {{{ (Request::is('anuncia-con-nosotros') ? '-active-' : '') }}}">Nuestros servicios</a>
            </nav>
            <span class="header__button fnHeaderButton"><span></span></span>
            @else
            <a href="/#ranking" class="header__back-link">Nueva búsqueda <img src="/images/arrow.svg" alt=""></a>
            @endif

        </div>
    </header>


    @yield('content')


    <footer class="footer">
        <div class="limit footer__inset">
            <p class="footer__copy">Copyright @ 2023 Compañia. <br>Todos los derechos reservados.</p>
            <p class="footer__social">
                <span>Siguenos en:</span>
                <a href="{{$bloque[2]->enlace}}" target="_blank"><img src="/images/ico_instagram.svg" alt="" /></a>
                <a href="{{$bloque[3]->enlace}}" target="_blank"><img src="/images/ico_facebook.svg" alt="" /></a>
            </p>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="/js/site.js?v={{uniqid()}}"></script>
    <script src="/js/main.js?v={{uniqid()}}" type="module"></script>
</body>

</html>