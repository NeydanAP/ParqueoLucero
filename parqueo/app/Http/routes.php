<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::bind('foto',function($slug){
	return Park\Foto::where('slug',$slug)->first();
});

//dependencia injecion
Route::bind('clase', function($clase){
    return Park\Clase::find($clase);
});
Route::bind('cliente', function($cliente){
    return Park\Cliente::find($cliente);
});
Route::bind('piso', function($piso){
    return Park\Piso::find($piso);
});
Route::bind('tarifa', function($tarifa){
    return Park\tarifa::find($tarifa);
});
Route::bind('vehiculo', function($vehiculo){
    return Park\Vehiculo::find($vehiculo);
});
Route::bind('espacio', function($espacio){
    return Park\Espacio::find($espacio);
});
Route::bind('empresa', function($empresa){
    return Park\Empresa::find($empresa);
});
Route::get('/',[
	'as'=>'home',
	'uses'=>'StoreController@index']
	);

Route::get('foto/{slug}',[
	'as' => 'foto-detail',
	'uses' => 'StoreController@show'
]);
//carrito---------------------
Route::get('cart/show',[
	  'as' =>'cart-show',
	  'uses' => 'CartController@show'
]);

Route::get('cart/add/{foto}',[
	  'as' =>'cart-add',
	  'uses' => 'CartController@add'
]);

Route::get('cart/delete/{foto}',[
	  'as' =>'cart-delete',
	  'uses' => 'CartController@delete'
]);

Route::get('cart/trash',[
	  'as' =>'cart-trash',
	  'uses' => 'CartController@trash'
]);

Route::get('cart/update/{foto}/{cantidad}',[
	  'as' =>'cart-update',
	  'uses' => 'CartController@update'
]);

Route::get('orden-detalle}',[
	  'middleware'=>'auth',
	  'as' =>'orden-detalle',
	  'uses' => 'CartController@ordenDetalle'
]);
//Authenticacion
Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);
// Registration routes...
Route::get('auth/register', [
	'as' => 'register-get',
	'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', [
	'as' => 'register-post',
	'uses' => 'Auth\AuthController@postRegister'
]);

// Paypal
// Enviamos nuestro pedido a PayPal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));
// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

// Admin-------------------
Route::get('admin/home',function(){
	return view('admin.home');
	});
Route::resource('admin/cliente', 'Admin\ClienteController');
Route::resource('admin/espacio', 'Admin\EspacioController');
Route::resource('admin/estacionamiento', 'Admin\EstacionamientoController');
Route::resource('admin/clase', 'Admin\ClaseController');
Route::resource('admin/piso', 'Admin\PisoController');
Route::resource('admin/tarifa', 'Admin\TarifaController');
Route::resource('admin/vehiculo', 'Admin\VehiculoController');
Route::resource('admin/empresa', 'Admin\EmpresaController');
