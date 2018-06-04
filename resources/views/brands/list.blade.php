@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Marcas</span>
      <div class="controls">
        <a class="controls_plus" href="/admin/marca_nueva">
          AÑADIR <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <form class="search" action="/admin/marcas" method="get">
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
      @if (count($brands) <= 0)
        <div class="results">
          No se encontraron resultados
        </div>
      @else
        <table>
          <tr>
            <th>Nombre</th>
            <th class="project-ctrl">Editar</th>
            <th class="project-ctrl">Eliminar</th>
            <th class="project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
          </tr>
          @foreach ($brands as $brand)
            <tr>
              <td>{{ $brand->name }}</td>
              <td><a href="/admin/marca_modificar/{{$brand->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              <td><a href="/admin/marca_modificar/{{$brand->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
              <td> <input type="checkbox" name="selectAll" class="select"> </td>
            </tr>
          @endforeach
        </table>
      @endif
    </div>
  </div>
@endsection
