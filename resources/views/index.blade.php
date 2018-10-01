@extends('layouts.layout')

@section('content')
  <div class="img-slider-wrap">
    <div class="img-slider-prev">
      <i class="fa fa-angle-left"></i>
    </div>
    <div class="img-slider-next">
      <i class="fa fa-angle-right"></i>
    </div>
    {{-- <div class="img-carousel"> --}}
      <div class="img-slider" id="img-slider">
        <div class="img-slide cover showing" id="1">
          <img class="imagen cover" src="{{ asset('/images/slide1.jpg')}}">
          <div class="img-slider-caption">
            {{-- <h3></h3> --}}
          </div>
        </div>
        <div class="img-slide cover" id="2">
          <img class="imagen cover" src="{{ asset('/images/slide2.jpg')}}">
          <div class="img-slider-caption">
            {{-- <h3></h3> --}}
          </div>
        </div>
        <div class="img-slide cover" id="3">
          <img class="imagen cover" src="{{ asset('/images/slide3.jpg')}}">
          <div class="img-slider-caption">
            {{-- <h3></h3> --}}
          </div>
        </div>
      </div>
    {{-- </div> --}}
    <div class="img-slider-pager" style="display: block;">
      <a href="#" class="dot active">
        <span>1</span>
      </a>
      <a href="#" class="dot">
        <span>2</span>
      </a>
      <a href="#" class="dot">
        <span>3</span>
      </a>
    </div>
  </div>

  <div class="site-container margin-top-btm">
    <div class="product-slider-title">
      Nuevos Productos
    </div>
      <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="5000" id="myCarousel">
        <div class="carousel-inner">
          @foreach ($newProducts as $key => $newProduct)
            <div class="item{{ $key == 0 ? ' active' : '' }}">
                <div class="product-slider-item">
                  <div class="slider-item-top">
                    <a href="/productos/{{ $newProduct->code }}" title="Ver Artículo">
                      <img class="slider-img" src="{{ asset ( 'storage/' . $newProduct->primary_img ) }}" alt="">
                    </a>
                  </div>
                  <div class="slider-item-bottom">
                    <h3 class="product-title">
                      <a href="/productos/{{ $newProduct->code }}" title="{{ $newProduct->title }}">{{ $newProduct->title }}
                        @foreach ($newProduct->brands as $brand)
                          {{ $brand->name }}
                        @endforeach
                      </a>
                      <p class="product-desc-code">
                        Código: {{ $newProduct->code }}
                      </p>
                    </h3>
                    {{-- <span class="product-price">${{ $newProduct->price }}</span> --}}
                    {{-- <p class="add-to-cart">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <a href="/añadir-al-carrito/{{ $newProduct->id }}"  rel="nofollow" data-product-sku="{{ $newProduct->code }}" data-quantity="1">añadir al carrito</a>
                    </p> --}}
                    <p class="add-to-cart">
                      <i class="fas fa-envelope" aria-hidden="true"></i>
                      <a href="mailto:correomitre@gmail.com?subject=Solicito información del siguiente artículo&body=Hola. Les escribo para solicitarles información sobre {{ $newProduct->title }}, código {{ $newProduct->code }}. Gracias">Solicitar información</a>
                    </p>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
  </div>
  <div class="margin-top-btm"><img class="mega-img cover" src="{{ asset('images/mega.jpg')}}" alt="Repuestos Mitre Frente"></div>
  <div class="three-features site-container margin-top-btm">
    <div class="feature">
      <div class="icon-container">
        <i class="fas fa-shipping-fast"></i>
      </div>
      <div class="text-container">
        <h5>ENVÍOS A TODO EL PAÍS</h5>
        Hacemos envíos a todo el país, servicio puerta puerta o para que retires en la sucursal más cercana a tu domicilio mediante el servicio de Mercado Envíos desde la web de MercadoLibre.
      </div>
    </div>
    <div class="feature">
      <div class="icon-container">
        <i class="fas fa-map-marker-alt"></i>
      </div>
      <div class="text-container">
        <h5>EXCELENTE UBICACIÓN</h5>
        Te acercan 10 lineas de colectivo (15, 21, 60, 71, 130, 161, 194, 203, 314, 365) y dos lineas de tren, el Belgrano Norte (estación Florida) y el Mitre-Mitre (estación Florida)
      </div>
    </div>
    <div class="feature">
      <div class="icon-container">
        <i class="far fa-credit-card"></i>
      </div>
      <div class="text-container">
        <h5>OPCIONES DE PAGO</h5>
        Pagá tus compras mediante cualquiera de los medios que acepta MercadoPago o en el local en efectivo, tarjeta de crédito o débito. Por el momento solo operamos con tarjetas VISA o CABAL.
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/home.js') }}"></script>
@endsection
