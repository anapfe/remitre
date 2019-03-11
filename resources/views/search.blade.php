@extends('layouts.layout')

@section('content')
  <div class="site-container">
    <div class="container">
      <div class="content">
        <nav class="breadcrumbs">
          <a href="/">Inicio</a> / Búsqueda
        </nav>
        <div class="product-list-header">
          <h1>Resultados de: {{ $keywordsRaw }}</h1>
        </div>
        <div class="product-list-ctrl">
          <div class="product-ctrl-left">
            Mostrando todos los resultados ({{ $productsCount }})
          </div>
          <div class="product-ctrl-right">
            <form class="ordering" method="get">
              {{ csrf_field() }}
              <select class="product-list-orderBy" name="orderBy">
                <option value="menu-order">Orden Predeterminado</option>
                <option value="date">Ordenar por novedades</option>
                <option value="price-asc">Ordenar por precio: bajo a alto</option>
                <option value="price-desc">Ordenar por precio: alto a bajo</option>}
              </select>
            </form>
          </div>
        </div>
        <div class="product-grid">
          <ul>
            @foreach ($products as $product)
              <li class="product-card">
                <a href="/productos/{{ $product->code }}" class="">
                  <img class="" src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt="">
                  <h2 class="product-title">{{ $product->title }}
                  @foreach ($product->brands as $brand)
                    {{ $brand->name }}
                  @endforeach</h2>
                </a>
                <span class="product-card-price">$ {{ $product->price }},00</span>
                <p class="code">
                  Código: {{ $product->code }}
                </p>
                {{-- <p class="add-to-cart">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <a href="/añadir-al-carrito/{{ $product->id }}"  rel="nofollow" data-product-sku="{{ $product->code }}" data-quantity="1">añadir al carrito</a>
                </p> --}}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="secondary">
        {{-- <aside class="product-search">
          <form class="product-search-filter" action="/productos" method="get">
            {{ csrf_field() }}
            <input type="search" class="product-search-field" name="search" value="" placeholder="Buscar productos...">
            <input type="submit" name="search-button" value="Buscar">
          </form>
        </aside> --}}
        {{-- <aside class="product-price-filter">
          <form class="" action="/{{ $subcategory->category->name }}/ {{ $subcategory->name}}" method="get">
            <div class="price-slider-wrapper">
              <div class="price-slider">
                <div class="slider-range" style="left:0%;width:100%"></div>
                <span class="slider-handle" tabindex="0" style="left:0%"></span>
                <span class="slider-handle" tabindex="0" style="left:100%"></span>
              </div>
              <div class="slider-amount">
                <input type="text" id="min_price" name="min_price" value="" data-min="300" placeholder="Precio mínimo" style="display: none;">
                <input type="text" id="max_price" name="max_price" value="" data-max="580" placeholder="Precio máximo" style="display: none;">
                <button type="submit" class="button-product">Filtrar</button>
                <div class="price_label" style="">
                  Precio: <span class="from">$0</span> — <span class="to">$1000</span>
                </div>
              </div>
            </div>
          </form>
        </aside> --}}
        <aside class="brand-filter">
          <select class="brand-select" name="">
            <option value="">Marca:</option>
            @foreach ($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
          </select>
        </aside>

      </div>
    </div>
  </div>
@endsection

@section('js')

@endsection
