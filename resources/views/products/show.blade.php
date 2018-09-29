@extends('layouts.layout')

@section('content')
  <div class="site-container">
    <div class="container">
      <div class="content">
        <nav class="breadcrumbs">
          <a href="/">Inicio</a> /
          {{ $product->subcategory->category->name }} /
          <a href="/{{ $product->subcategory->name  }}">{{ $product->subcategory->name }}</a>
        </nav>
        <div class="product-desc">
          <div class="product-desc-img">
            <img src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt="imagen producto">
          </div>
          <div class="product-desc-data">
            <h1 class="product-desc-title">{{ $product->title }}
              @foreach ($product->brands as $brand)
                {{ $brand->name }}
              @endforeach</h1>
              {{-- <span class="product-desc-price">$ {{ $product->price }},00</span> --}}
              <p class="product-desc-details">
                Detalles: {{ $product->description }}
              </p>
              <p class="product-desc-models">
                Modelos: {{ $product->models }}
              </p>
              <p class="product-desc-code">
                Código: {{ $product->code }}
              </p>
              {{-- <p class="product-description-add-to-cart">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <a href="/añadir-al-carrito/{{ $product->id }}" rel="nofollow" data-product-sku="{{ $product->code }}" data-quantity="1">añadir al carrito</a>
            </p> --}}
          </div>
        </div>
      </div>
      <div class="secondary">
        {{-- <aside class="product-search">
          <form class="product-search-filter" action="/" method="get">
            {{ csrf_field() }}
            <input type="search" class="product-search-field" name="search" value="" placeholder="Buscar productos...">
            <input type="submit" name="search-button" value="Buscar">
          </form>
        </aside> --}}
      </div>
    </div>
  </div>
@endsection
