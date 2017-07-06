<?php

namespace Park\Http\Controllers;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Foto;

class CartController extends Controller
{
    public function __construct()
    {
        if(!\Session::has('cart')) \Session::put('cart',array());
    }
    // Show cart
    public function show()
    {
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('store.cart',compact('cart','total'));
    }
    // Add item---------------
    public function add(Foto $foto)
    {
       $cart = \Session::get('cart');
       $foto ->cantidad = 1;
       $cart[$foto->slug] = $foto; 
       \Session::put('cart',$cart);
       return redirect()->route('cart-show');
    }
     //Delete item
    public function delete(Foto $foto)
    {
        $cart = \Session::get('cart');
        unset($cart[$foto->slug]);
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
    }
     //update-----------
    public function update(Foto $foto,$cantidad)
    {
        $cart = \Session::get('cart');
        $cart[$foto->slug]->cantidad=$cantidad;
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
     }
      //Trash cart
    public function trash()
    {
      \Session::forget('cart');
      return redirect()->route('cart-show');
    }
    //Total ---------
    private function total()
    {
    $cart = \Session::get('cart');
    $total = 0;
    foreach($cart as $item){
        $total += $item->precio*$item->cantidad;
    }
     return $total;
  }
  // Detalle de compra
  public function ordenDetalle()
  {
     if(count(\Session::get('cart'))<= 0) return redirect()->route('home');
     $cart = \Session::get('cart');
     $total = $this->total();

     return view('store.orden-detalle',compact('cart','total'));
  }
}
