@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Subcategoria - Editar</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/admin/subcategoria_editar/{{ $subcategory->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="name">
              <label class="form-label" for="name">Nombre de la subcategoría</label>
              <input class="input-product" type="text" name="name" value="{{ $subcategory->name }}" autofocus>
            </div>
          </div>
        <div class="input">
          <button class="btn" type="submit" name="button">Subir</button>
        </div>
      </form>
    </div>
  </div>
@endsection
