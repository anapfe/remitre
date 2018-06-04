@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Categorias</span>
      <div class="controls">
        <a class="controls_plus" href="/categoria_nueva">
          AÑADIR <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <form class="search" action="/buscarCategorias" method="get">
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
          <th class="project-ctrl">Editar</th>
          <th class="project-ctrl">Eliminar</th>
          <th class="project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td><a href="/categoria_modificar/{{$category->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a href="/categoria_eliminar/{{$category->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td> <input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
