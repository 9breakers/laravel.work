<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addItem(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Спочатку увійдіть в систему');
        }

        $post_id = $request->input('post_id');
        $quantity = 1;

        $post = Post::find($post_id);

        if ($post) {
            $existingCartItem = Cart::where('user_id', auth()->id())->where('post_id', $post_id)->first();

            if ($existingCartItem) {
                // Товар вже існує у кошику, збільшуємо кількість
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + $quantity,
                ]);
            } else {
                // Додаємо новий товар до кошика
                Cart::create([
                    'post_id' => $post_id,
                    'quantity' => $quantity,
                    'price' => $post->price,
                    'user_id' => Auth::user()->id,
                ]);
            }

            return redirect()->back()->with('success', 'Товар додано до кошика');
        } else {
            return redirect()->back()->with('error', 'Продукт не знайдено');
        }
    }


    public function showCart(){

        $Carts = Cart::with('post')->where('user_id', auth()->id())->get();
        $totalPrice = 0;

        foreach ($Carts as $cartItem) {
            $totalPrice += $cartItem->price * $cartItem->quantity;
        }

        return view('main.cart', compact('Carts', 'totalPrice'));
    }

    public function CartRemove($id)
    {
        $cartItem = Cart::find($id);

        if (!$cartItem) {
            return redirect()->back();
        }
        $cartItem->delete();
        return redirect()->route('cart');
    }

    public function getCartItemCount()
    {
        return Cart::where('user_id', auth()->id())->sum('quantity');
    }

}
