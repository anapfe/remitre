@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Productos - Editar</span>
    </div>
    <div class="main-body">
      <form class="form-product" action="/admin/producto_modificar/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="div-left">
          <div class="div-top">
            {{-- title --}}
            <div class="input-div {{ $errors->has('title') ? ' has-error' : '' }}" id="title">
              <label class="form-label" for="title">Titulo</label>
              <input class="input-product" type="text" name="title" value="{{ $product->title }}" placeholder="{{ $product->title}}" autofocus>
              @if ($errors->has('title'))
                <span class="errors">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="div-bottom">
            {{-- code --}}
            <div class="input-div {{ $errors->has('code') ? ' has-error' : '' }}">
              <label class="form-label" for="code">Código</label>
              <input class="input-product short-input" type="text" name="code" id="code" value="{{ $product->code }}" placeholder="{{ $product->code}}">
              @if ($errors->has('code'))
                <span class="errors">
                  <strong>{{ $errors->first('code') }}</strong>
                </span>
              @endif
            </div>
            {{-- price --}}
            <div class="input-div price-container {{ $errors->has('price') ? ' has-error' : '' }}">
              <label class="form-label" for="price">Precio</label>
              <input class="input-product short-input" type="text" placeholder="{{ $product->price }}" name="price" id="price" value="{{ $product->price }}">
              <i class="fa fa-usd money" aria-hidden="true"></i>
              @if ($errors->has('price'))
                <span class="errors">
                  <strong>{{ $errors->first('price') }}</strong>
                </span>
              @endif
            </div>
            {{-- stock --}}
            <div class="input-div {{ $errors->has('stock') ? ' has-error' : '' }}">
              <label class="form-label" for="stock">Stock</label>
              <input class="input-product short-input" type="text" name="stock" id="stock" value="{{ $product->stock }}" placeholder="{{ $product->stock }}">
              @if ($errors->has('stock'))
                <span class="errors">
                  <strong>{{ $errors->first('stock') }}</strong>
                </span>
              @endif
            </div>
            {{-- subcategory --}}
            <div class="input-div div-categories {{ $errors->has('subcategory') ? ' has-error' : '' }}">
              <label class="form-label">Subcategoría</label>
              <select class="select-product" name="subcategory">
                <option value="">Seleccionar</option>
                @foreach ($subcategories as $subcategory)
                  <option value="{{ $subcategory->id }}"
                    @if ($subcategory->id === $subcategoria->id)
                      selected
                    @endif
                    >{{ $subcategory->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('subcategory'))
                  <span class="errors">
                    <strong>{{ $errors->first('subcategory') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>
          <div class="div-right">
            <div class="input-div {{ $errors->has('description') ? ' has-error' : '' }}" id="description">
              <label class="form-label" for="description">Descripción</label>
              <textarea class="input-textarea" name="description" value="{{ $product->description }}">{{ $product->description }}</textarea>
              @if ($errors->has('description'))
                <span class="errors">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="div-brands">
            {{-- brand --}}
            <div class="input-div full-width {{ $errors->has('brand') ? ' has-error' : '' }}" id="brand">
              <label class="form-label">Marcas</label>
              <div class="brands-grid">
                @foreach ($brands as $brand)
                  <div class="brand-item">
                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}" id="{{ $brand->name }}"
                    @if (isset($marcas))
                      @foreach ($marcas as $marca)
                        @if ($brand->name === $marca->name)
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                    <label for="{{ $brand->name }}" class="checkbox-text">{{ $brand->name }}</label>
                  </div>
                @endforeach
              </div>
              @if ($errors->has('brand'))
                <span class="errors">
                  <strong>{{ $errors->first('brand') }}</strong>
                </span>
              @endif
            </div>
          </div>
          {{-- provider --}}
          <div class="div-brands">
            <div class="input-div full-width {{ $errors->has('provider') ? ' has-error' : '' }}" id="provider">
              <label class="form-label">Proveedores</label>
              <div class="brands-grid">
                @foreach ($providers as $provider)
                  <div class="brand-item">
                    <input type="checkbox" name="providers[]" value="{{ $provider->id }}" id="{{ $provider->name }}"
                    @if (isset($proveedores))
                      @foreach ($proveedores as $proveedor)
                        @if ($provider->name === $proveedor->name)
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                    <label for="{{ $provider->name }}" class="checkbox-text">{{ $provider->name }}</label>
                  </div>
                @endforeach
              </div>
              @if ($errors->has('provider'))
                <span class="errors">
                  <strong>{{ $errors->first('provider') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="full-width">
            {{-- primary_img --}}
            <div class="input-div {{ $errors->has('primary_img') ? ' has-error' : '' }}">
              <div class="product-img-div">
                <img class="product-img" src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt="">
              </div>
              <label class="form-label" for="primary_img">Imagen Index</label>
              <input class="upload-file" type="file" name="primary_img" id="primary_img"  >
              @if ($errors->has('primary_img'))
                <span class="errors">
                  <strong>{{ $errors->first('primary_img') }}</strong>
                </span>
              @endif
            </div>
          </div>
          {{-- <div class="div-right">
          {{-- other images --}}
          {{-- <div class="input-div">
          <label class="form-label" for="altImg[]">Otras imagenes</label>
          <input class="upload-file" type="file" name="altImg[]">
        </div>
        <div class="input-div">
        <input class="upload-file" type="file" name="altImg[]">
      </div>
      <div class="input-div">
      <input class="upload-file" type="file" name="altImg[]">
    </div>
    <div class="input-div">
    <input class="upload-file" type="file" name="altImg[]">
  </div>
  <div class="input-div">
  <input class="upload-file" type="file" name="altImg[]">
</div>
</div> --}}
<div class="input">
  <button class="btn" type="submit" name="button">Subir</button>
</div>
</form>
</div>
</div>
@endsection
