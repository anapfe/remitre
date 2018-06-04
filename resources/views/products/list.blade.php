@extends('layouts.admin')

@section('content')

  <div class="main">
    <div class="section-title">
      <span>Productos</span>
      <div class="controls">
        <a class="controls_plus" href="/admin/producto_nuevo">
          AÑADIR <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <form class="search" action="/admin/buscar" method="get">
          <input class="search-box" type="text" name="search" value="" placeholder="buscar">
          <button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

        {{-- <select class="order-by" name="">
        <option value=""><a href="#">Ordenar</a></option>
        <option value=""><a href="/proyectos_año">Por Año</a></option>
        <option value=""><a href="/proyectos_titulo">Por Nombre</a></option>
        <option value=""><a href="/proyectos_cliente">Por Cliente</a></option>
      </select> --}}
      <select class="select" name="">
        <option value=""><a href="#">Acciones por Lote</a></option>
        <option value=""><a href="/admin/proyectos_eliminar">Eliminar</a></option>
      </select>
    </div>
  </div>
  <div class="main-body">
    @if (count($products) <= 0)
      <div class="results">
        No se encontraron resultados
      </div>
    @else
      <div class="products-container">
        @foreach ($products as $product)
          <div class="list">
            <div class="product-img-div">
              <img class="product-img" src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt="">
            </div>
            <div class="product-data-div">
              <div class="product-top-div">
                {{ $product->title }}
              </div>
              <div class="product-category-div">
                {{ $product->subcategory->category->name }} / {{ $product->subcategory->name }}
              </div>
              <div class="product-bottom-div">
                <div class="product-code-div">
                  COD. {{ $product->code }}
                </div>
              </div>
            </div>
            <div class="product-brands-div">
              {{ $product->marcas }}
            </div>
            <div class="product-description-div">
              {{ $product->description }}
            </div>
            <div class="product-modelos-div">
              {{ $product->models }}
            </div>
            <div class="product-top-div">
              <div class="product-price-div">
                $ {{ $product->price }}
              </div>
              <div class="product-stock-div">
                stock: {{ $product->stock }}
              </div>
            </div>
            <div class="product-ctrl-div">
              <a class="product-ctrl" href="/admin/producto_editar/{{ $product->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="product-ctrl" href="/admin/producto_eliminar/{{ $product->id }}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
          </div>
        @endforeach
      </div>
@endif
</div>
</div>
@endsection
