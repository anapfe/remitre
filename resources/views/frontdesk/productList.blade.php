@extends('layouts.layout')

@section('content')
  <div class="site-container">
    <div class="container">
      <div class="content">
        <nav class="breadcrumbs">
          <a href="/">Inicio</a> /
          <a href="#">{{ $subcategory->category->name }}</a> /
          {{ $subcategory->name }}
        </nav>
        <div class="product-list-header">
          <h1>{{ $subcategory->name }}</h1>
        </div>

        @include('frontdesk.productGrid')

    </div>
  </div>
@endsection

@section('js')

@endsection
