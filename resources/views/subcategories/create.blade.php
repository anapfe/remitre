@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Subcategoria - Nueva</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/subcategoria_nueva" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="name">
              <label class="form-label" for="name">Nombre de la categoría</label>
              <input class="input-project" type="text" name="name" value="{{ old('title') }}" autofocus>
            </div>
          </div>
        <div class="input">
          <button class="btn" type="submit" name="button">Subir</button>
        </div>
      </form>
    </div>
  </div>
@endsection
