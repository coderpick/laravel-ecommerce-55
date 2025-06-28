<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // reset cart
        //   session()->forget('cart');
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {

        $product = Product::find($request->product_id);
        if ($product->stock < $request->quantity) {
            notyf()->error('Product out of stock');
            return redirect()->back();
        }
        /* discount price */
        if ($product->discount > 0 && $product->discount_price != null) {
            $price = $product->discount_price;
        } else {
            $price = $product->price;
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $price,
                'discount' => $product->discount,
                'discount_price' => $product->discount_price,
                'image' => $product->feature_image
            ];
        }

        session()->put('cart', $cart);
        notyf()->success('Product added to cart successfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
      // return $request;
        if ($request->product_id && $request->quantity_increment || $request->quantity_decrement) {
            $cart = session()->get('cart');
            $cart[$request->product_id]["quantity"] = $request->quantity_increment ? $request->quantity_increment : $request->quantity_decrement;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully');
        }
    }

    public function destroy(Request $request)
    {

        if ($request->product_id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }
}
