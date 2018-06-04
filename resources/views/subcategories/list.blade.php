@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Subcategorias</span>
      <div class="controls">
        <a class="controls_plus" href="/admin/subcategoria_nueva">
          AÑADIR <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <form class="search" action="/admin/subcategoria_buscar" method="get">
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
      <table>
        <tr>
          <th>Nombre</th>
          <th>Categoría</th>
          <th class="project-5">Editar</th>
          <th class="project-5">Eliminar</th>
          <th class="project-5"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>
        @foreach ($subcategories as $subcategory)
          <tr>
            <td>{{ $subcategory->name }}</td>
            <td>{{ $subcategory->category->name}}</td>
            <td><a href="/admin/subcategoria_editar/{{$subcategory->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a href="/admin/subcategoria_eliminar/{{$subcategory->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td> <input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
