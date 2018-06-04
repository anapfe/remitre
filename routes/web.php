<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/storageLink', function () {
  \Artisan::call('storage:link');
});

Route::group( [ 'middleware' =>'admin' ], function() {

  // Admin
  Route::get('/admin', 'HomeController@indexAdmin');

  Route::prefix('admin')->group(function () {

    // Categories
    Route::get('/categorias', 'CategoriesController@listCategories');
    Route::get('/categoria_nueva', 'CategoriesController@createCategory');
    Route::post('/categoria_nueva', 'CategoriesController@storeCategory');
    Route::get('/categoria_editar/{name}', 'CategoriesController@editCategory');
    Route::patch('/categoria_editar/{name}', 'CategoriesController@updateCategory');
    Route::get('/categoria_eliminar/{name}', 'CategoriesController@destroyCategory');

    // Subcategories
    Route::get('/subcategorias', 'SubcategoriesController@listSubcategories');
    Route::get('/subcategoria_nueva', 'SubcategoriesController@createSubcategory');
    Route::post('/subcategoria_nueva', 'SubcategoriesController@storeSubcategory');
    Route::get('/subcategoria_editar/{id}', 'SubcategoriesController@editSubcategory');
    Route::patch('/subcategoria_editar/{id}', 'SubcategoriesController@updateSubcategory');
    Route::get('/subcategoria_eliminar/{name}', 'SubcategoriesController@destroySubcategory');

    // Brands
    Route::get('/marcas', 'BrandsController@listBrands');
    Route::get('/marca_nueva', 'BrandsController@createBrand');
    Route::post('/marca_nueva', 'BrandsController@storeBrand');
    Route::get('/marca_editar/{name}', 'BrandsController@editBrand');
    Route::patch('/marca_editar/{name}', 'BrandsController@updateBrand');
    Route::get('/marca_eliminar/{name}', 'BrandsController@destroyBrand');

    // Providers
    Route::get('/proveedores', 'ProvidersController@listProviders');
    Route::get('/proveedor_nuevo', 'ProvidersController@createProvider');
    Route::post('/proveedor_nuevo', 'ProvidersController@storeProvider');
    Route::get('/proveedor_editar/{name}', 'ProvidersController@editProvider');
    Route::patch('/proveedor_editar/{name}', 'ProvidersController@updateProvider');
    Route::get('/proveedor_eliminar/{name}', 'ProvidersController@destroyProvider');

    // Products
    Route::get('/productos', 'ProductsController@listProducts');
    Route::get('/productos/{param}/{order}', 'ProductsController@listProductsBy');
    Route::get('/producto_nuevo', 'ProductsController@createProduct');
    Route::post('/producto_nuevo', 'ProductsController@storeProduct');
    Route::get('/producto_editar/{id}', 'ProductsController@editProduct');
    Route::patch('/producto_editar/{id}', 'ProductsController@updateProduct');
    Route::get('/producto_eliminar/{id}', 'ProductsController@destroyProduct');
    Route::get('/productos_buscar', 'ProductsController@searchProducts');
  });
});

Route::get('/producto/{code}', 'ProductsController@productDescription');
Route::get('/productos', 'SearchController@search');
Route::get('/{categorySlug}/{subcategorySlug}/productos', 'ProductsController@productBySubcategory');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
