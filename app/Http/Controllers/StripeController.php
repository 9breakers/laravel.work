<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;


class StripeController extends Controller
{
    public function session(Request $request)
    {
//        $user         = auth()->user();
        $productItems = [];

        Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {

            $post_name = $details['name'];
            $total = $details['price'];
            $quantity = $details['quantity'];

            $two0 = "00";
            $unit_amount = "$total$two0";

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $post_name,
                    ],
                    'currency'     => 'USD',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => "0001"
            ],
            'customer_email' => "day38831@gmail.com", //$user->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        return view('main.paySuccess');
    }

    public function cancel()
    {
        return view('cancel');
    }


}
