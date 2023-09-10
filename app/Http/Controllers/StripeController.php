<?php

namespace App\Http\Controllers;
use App\Http\Requests\CardRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Stripe;


class StripeController extends Controller
{
    public function index()
    {
        $Carts = Cart::with('post')->where('user_id', auth()->id())->get();
        $totalPrice = 0;

        foreach ($Carts as $cartItem) {
            $totalPrice += $cartItem->price * $cartItem->quantity;
        }

        // Отримайте суму платежу та іншу необхідну інформацію з корзини
        return view('main.checkout', compact('totalPrice'));
    }

    public function charge(Request $request)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Отримайте дані платежу з форми оформлення замовлення

        $Carts = Cart::with('post')->where('user_id', auth()->id())->get();
        $totalPrice = 0;
        foreach ($Carts as $cartItem) {
            $totalPrice += $cartItem->price * $cartItem->quantity;
        }

            // Створіть платіжний інтент із сумою платежу
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalPrice,
                'currency' => 'usd', // Валюта
            ]);

            // Відправте клієнту ідентифікатор платіжного інтента
            return redirect('/');

        }


}
