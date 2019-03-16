<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta name="google-site-verification" content="IZayD8l0dQEHv-J4v2Y1V_GBqfL8v7333bmwJ9Q9iAo" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Repuestos electrodomésticos">

  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- titulo -->
  <title>REPUESTOSMITRE - REPUESTOS ELECTRODOMÉSTICOS</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <header>
    <div class="border-bottom">
      <div class="site-top-bar site-container">
        <div class="site-top-bar-left">
          <a href="mailto:correomitre@gmail.com" title="Envianos un mail" class="social-icon"><i class="fas fa-envelope"></i></a>
          <a href="http://www.facebook.com/repmitre" target="_blank" title="Seguinos en Facebook" class="social-icon"><i class="fab fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/send?phone=5491149282863" title="Envianos un Whatsapp" target="_blank" class="wsap"><i class="fab fa-whatsapp my-float"></i></a>
          {{-- <a href="tel:+541147600643" class="header-phone">011 4760 0643</a> --}}
        </div>
        <div class="site-top-bar-right">
          {{-- <div class="header-account">
          <a href="http://localhost/wp_remitre/mi-cuenta/">Mi cuenta</a>
        </div> --}}
        <i class="fa fa-search search-btn"></i>
      </div>
      <div class="search-block"  style="bottom: 2px">
        <form class="search-form" role="search" action="/productos" method="get">
          <label>
            <input type="search" class="search-field" name="search" value="" title="Buscar..." placeholder="Buscar...">
          </label>
          <input type="submit" class="search-submit" value=" ">
        </form>
      </div>
    </div>
  </div>
  <div class="site-container site-header">
    <div class="site-header-left">
      <a href="/" title="REPUESTOSMITRE">
        <img src="{{ asset('/images/header_logo.jpg') }}" alt="">
      </a>
    </div>
    {{-- <div class="site-header-right">
    <div class="header-cart">
    <a class="header-cart-contents" href="/carrito" title="Ver carrito">
    <span class="header-cart-amount">
    $ 0,00 (0)
  </span>
  <span class="header-cart-checkout">
  <i class="fa fa-shopping-cart"></i>
</span>
</a>
</div> --}}

</div>

<div class="navigation-background">
  <div class="main-navigation site-container">
    <nav id="site-navigation" class="" role="navigation">
      <button class="menu-toggle" aria-controls="menu" aria-expanded="false" type="button" name="button">Menu</button>
      <ul id="menu-principal" class="menu nav-menu">
        <li>
          <a class="menu-item1" href="/">Inicio</a>
        </li>
        <li>
          <a class="menu-item1" href="https://www.dropbox.com/sh/iy2olih8bnpt0sh/AABWJcwlI5p2ksY4Dza_2BzAa?dl=0">Productos</a>
          {{-- <a class="menu-item1">Productos</a> --}}
          {{-- <ul class="submenu">
            @foreach ($categories as $category)
              <li class="categories-menu">
                <a class="menu-item">{{ $category->name }}</a>
                <ul class="submenu">
                  @foreach ($category->subcategories->sortBy('name') as $subcategory)
                    <li>
                      <a class="menu-item" href="/{{ $category->slug }}/{{ $subcategory->slug }}/productos">{{ $subcategory->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </li>
            @endforeach
          </ul> --}}
        </li>
        <li>
          <a class="menu-item1" href="https://listado.mercadolibre.com.ar/_CustId_85661130">MercadoLibre</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
</div>
</div>
</header>

@yield('content')

<footer>
  <div class="site-footer-widgets site-container">
    <ul class="footer-container">
      <li class="widget">
        <h2 class="widget-title">UBICACIÓN</h2>
        <div id="map" class="googleapi">
          <img src="" alt="">
        </div>
      </li>
      <li class="widget">
        <h2 class="widget-title">CONTACTO</h2>
        <div class="footer-data">
          <p class="footer-data-block">
            <span class="widget-title-green">DIRECCIÓN</span>
            av. gral san martín 2976, florida, vicente lópez
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">TELÉFONO</span>
            <a href="tel:+541147600643">+54 11-4760-0643</a>
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">WHATSAPP</span>
            <a href="https://api.whatsapp.com/send?phone=5491149282863" title="Envianos un Whatsapp" target="_blank">+54 9 11-4928-2863</a>
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">HORARIO</span>
            lunes a viernes 9.00 - 12.00 / 15.00 - 19.00 <br>
            sábados cerrado
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">E-MAIL</span>
            <a href="mailto:correomitre@gmail.com">correomitre@gmail.com</a>
          </p>
        </div>
      </li>
      <li class="widget">
        <h2 class="widget-title">Facebook</h2>
        <div class="fb-page" data-href="https://www.facebook.com/repmitre" data-tabs="timeline" data-width="500" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/repmitre" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/repmitre">Repuestos Mitre</a></blockquote></div>
      </li>
    </ul>
  </div>
</footer>

@yield('js')
<script type="text/javascript" src="/js/master.js"></script>
<script src="{{ asset('js/googlemapsapi.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKIwKBd8DEfjMfevFfGBKIU_cWYryjUCY&callback=initMap"></script>
</body>
</html>
