<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Provider;
USE \App\TaxCondition;

class ProvidersController extends Controller
{
  public function listProviders() {
    $providers = Provider::orderBy('name', 'asc')->get();
    $param = [
      'providers' => $providers,
    ];
    return view('providers.list', $param);
  }

  public function createProvider() {
    $tax_conditions = TaxCondition::orderBy('name', 'asc')->get();
    $param = [
      'tax_conditions' => $tax_conditions
    ];
    return view('providers.create', $param);
  }

  public function storeProvider(Request $request) {
    $rules = [
      "name" => 'required|unique:providers',
      'address' => 'required',
      'phone' => 'required',
      'cuit' => 'required',
      'tax_condition' => 'required'
    ];
    $messages = [
      'required' => 'El campo es obligatorio',
      'unique' => 'El proveedor ya existe',
      // 'numeric' => 'Ingresá únicamente números'
    ];
    $request->validate($rules, $messages);
    $provider = Provider::create([
      "name" => $request->input('name'),
      'address' => $request->input('address'),
      'cp' => $request->input('cp'),
      'phone' => $request->input('phone'),
      'email' => $request->input('email'),
      'cuit' => $request->input('cuit'),
      'open' => $request->input('open'),
      'tax_condition_id' => $request->input('tax_condition')
    ]);
    $provider->tax_condition()->associate($provider);
    return redirect('/admin/proveedores');
  }

  public function editProvider($id) {
    $provider = Provider::find($id);
    $tax_conditions = TaxCondition::orderBy('name', 'asc')->get();
    $condicion_iva = $provider->tax_condition;
    $param = [
      'provider' => $provider,
      'tax_conditions' => $tax_conditions,
      'condicion_iva' => $provider->tax_condition
    ];
    return view('providers.edit', $param);
  }

  public function updateProvider(Request $request, $id) {
    $provider = Provider::find($id);
    $provider->name = $request->input('name');
    $provider->address = $request->input('address');
    $provider->cp = $request->input('cp');
    $provider->phone = $request->input('phone');
    $provider->email = $request->input('email');
    $provider->cuit = $request->input('cuit');
    $provider->open = $request->input('open');
    $provider->tax_condition()->associate($provider);
    $provider->save();
  }

  public function destroyProvider($id) {
    $provider = Provider::find($id);
    $provider->tax_condition()->dissociate($provider);
    $provider->products()->detach();
    $provider->delete();
    return redirect('/admin/proveedores');
  }
}
