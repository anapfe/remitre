@extends('layouts.admin')

@section('content')

  <div class="main">
    <div class="section-title">
      <span>Proveedor - Editar</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/admin/proveedor_editar/{{ $provider->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="div-left">
          <div class="div-top">
            {{-- razon social --}}
            <div class="input-div {{ $errors->has('name') ? ' has-error' : '' }}" id="name">
              <label class="form-label" for="name">Razón Social</label>
              <input class="input-product" type="text" name="name" value="{{ $provider->name }}" autofocus>
              @if ($errors->has('name'))
                <span class="errors">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="div-bottom">
            {{-- address --}}
            <div class="input-div {{ $errors->has('address') ? ' has-error' : '' }}">
              <label class="form-label" for="address">Dirección</label>
              <input class="input-product short-input" type="text" name="address" id="address" value="{{ $provider->address }}">
              @if ($errors->has('address'))
                <span class="errors">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
            </div>
            {{-- cp --}}
            <div class="input-div {{ $errors->has('cp') ? ' has-error' : '' }}">
              <label class="form-label" for="cp">Código Postal</label>
              <input class="input-product short-input" type="text" name="cp" id="cp" value="{{ $provider->cp }}">
              @if ($errors->has('cp'))
                <span class="errors">
                  <strong>{{ $errors->first('cp') }}</strong>
                </span>
              @endif
            </div>
            {{-- phone --}}
            <div class="input-div {{ $errors->has('phone') ? ' has-error' : '' }}">
              <label class="form-label" for="phone">Teléfono</label>
              <input class="input-product short-input" type="text" name="phone" id="phone" value="{{ $provider->phone }}">
              @if ($errors->has('phone'))
                <span class="errors">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="div-bottom">
            {{-- email --}}
            <div class="input-div {{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="form-label" for="email">E-mail</label>
              <input class="input-product short-input" type="text" name="email" id="email" value="{{ $provider->email }}">
              @if ($errors->has('email'))
                <span class="errors">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            {{-- cuit --}}
            <div class="input-div {{ $errors->has('cuit') ? ' has-error' : '' }}">
              <label class="form-label" for="cuit">CUIT</label>
              <input class="input-product short-input" type="text" name="cuit" id="cuit" value="{{ $provider->cuit }}">
              @if ($errors->has('cuit'))
                <span class="errors">
                  <strong>{{ $errors->first('cuit') }}</strong>
                </span>
              @endif
            </div>
            {{-- open --}}
            <div class="input-div {{ $errors->has('open') ? ' has-error' : '' }}">
              <label class="form-label" for="open">Horario</label>
              <input class="input-product short-input" type="text" name="open" id="open" value="{{ $provider->open }}">
              @if ($errors->has('open'))
                <span class="errors">
                  <strong>{{ $errors->first('open') }}</strong>
                </span>
              @endif
            </div>
            {{-- tax_condition --}}
            <div class="input-div {{ $errors->has('tax_condition') ? ' has-error' : '' }}">
              <label class="form-label" for="tax_condition">Condición de IVA</label>
              <select class="select-product" name="tax_condition">
                <option value="">Seleccionar</option>
                @foreach ($tax_conditions as $tax_condition)
                  <option value="{{ $tax_condition->id }}"
                    @if ($tax_condition->id == $condicion_iva->id)
                      selected
                    @endif
                    >{{ $tax_condition->name}}</option>
                  @endforeach
                </select>
                @if ($errors->has('tax_condition'))
                  <span class="errors">
                    <strong>{{ $errors->first('tax_condition') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="input">
              <button class="btn" type="submit" name="button">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    @endsection
