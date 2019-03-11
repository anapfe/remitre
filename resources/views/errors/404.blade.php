@extends('layouts.layout')

@section('content')
  <h2>{{ $exception->getMessage() }}</h2>
  <h3>No se encontró la página que estabas buscando</h3>
  <a href="/">Volver a inicio</a>
@endsection

@section('js')
  <script src="{{ asset('js/home.js') }}"></script>
@endsection
