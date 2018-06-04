@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Proveedores</span>
      <div class="controls">
        <a class="controls_plus" href="/admin/proveedor_nuevo">
          AÑADIR <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <form class="search" action="/admin/buscarProveedores" method="get">
          <input class="search-box" type="text" name="search" value="" placeholder="buscar">
          <button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <select class="order-by" name="">
          <option value=""><a href="#">Ordenar</a></option>
          <option value=""><a href="#">Por Nombre</a></option>
        </select>
      </div>
    </div>
    <div class="main-body">
      <div class="products-container">
        @foreach ($providers as $provider)
          <div class="list">
            <div class="provider-c1">
              {{ $provider->name }}
            </div>
            <div class="provider-c2">
              <div class="">
                {{ $provider->phone }}
              </div>
              <div class="">
                {{ $provider->email }}
              </div>
              <div class="">
                {{ $provider->open }}
              </div>
            </div>
            <div class="provider-c3">
              <div class="">
                {{ $provider->address }}
              </div>
              <div class="">
                CP: {{ $provider->cp }}
              </div>
            </div>
            <div class="provider-c4">
              <div class="">
                {{ $provider->cuit }}
              </div>
              <div>
                {{ $provider->tax_condition->name }}
              </div>
            </div>
            <div class="provider-c5">
              <a href="/admin/proveedor_editar/{{$provider->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a href="/admin/proveedor_eliminar/{{$provider->id}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
