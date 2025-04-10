<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
{
    $product = $request->input('product');
    $basePrice = $request->input('price');

    $iva = $basePrice * 0.19;
    $priceWithIva = $basePrice + $iva;

    $cart = Session::get('cart', []);
    $cart[] = [
        'product' => $product,
        'price' => $priceWithIva,
        'iva' => $iva,
        'base_price' => $basePrice
    ];

    Session::put('cart', $cart);

    return back()->with('success', 'Producto añadido al carrito.');
}


    public function remove(Request $request)
    {
        $index = $request->input('index');

        $cart = Session::get('cart', []);
        unset($cart[$index]);
        Session::put('cart', array_values($cart)); // Reindexar

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function checkout()
{
    $cart = Session::get('cart', []);
    $total = array_sum(array_column($cart, 'price'));

    return view('cart.checkout', compact('cart', 'total'));
}

}
