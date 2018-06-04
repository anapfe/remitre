<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>REPUESTOSMITRE - REPUESTOS ELECTRODOMÉSTICOS</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <header>
    <div class="border-bottom">
      <div class="site-top-bar site-container">
        <div class="site-top-bar-left">
          <a href="mailto:correomitre@gmail.com" title="Envianos un mail" class="social-icon">
            <i class="fa fa-envelope-o"></i>
          </a>
          <a href="http://www.facebook.com/repmitre" target="_blank" title="Seguinos en Facebook" class="social-icon">
            <i class="fa fa-facebook"></i>
          </a>
          <div class="header-phone">011 4760 0643</div>
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
    </div>
  <div class="navigation-background">
    <div class="main-navigation site-container">
      <nav id="site-navigation" class="" role="navigation">
        <button class="menu-toggle" aria-controls="menu" aria-expanded="false" type="button" name="button">Menu</button>
        <ul id="menu-principal" class="menu nav-menu" >
          <li>
            <a class="menu-item1" href="/">Inicio</a>
          </li>
          <li>
            <a class="menu-item1" href="#">Productos</a>
            <ul class="submenu">
              @foreach ($categories as $category)
                <li>
                  <a class="menu-item" href="#">{{ $category->name }}</a>
                  <ul class="submenu">
                    @foreach ($category->subcategories->sortBy('name') as $subcategory)
                      <li>
                        <a class="menu-item" href="/{{ $category->slug }}/{{ $subcategory->slug }}/productos">{{ $subcategory->name }}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @endforeach
            </ul>
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
            av. gral san martín 2976 <br>
            florida, vicente lopez
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">TELÉFONO</span>
            +54 9 11-4760-0643
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">Horario</span>
            lunes a viernes <br>
            8.30 a 12.00 y 15.00 a 19.00 <br>
            sábados cerrado
          </p>
          <p class="footer-data-block">
            <span class="widget-title-green">E-MAIL</span>
            contactomitre@gmail.com
          </p>
        </div>
      </li>
      <li class="widget">
        <h2 class="widget-title">Facebook</h2>
        <div class="fb-page" data-href="https://www.facebook.com/repMitre" data-tabs="timeline" data-width="360px" data-height="300px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/repMitre" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/repMitre">Repuestos Mitre</a></blockquote></div>
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
