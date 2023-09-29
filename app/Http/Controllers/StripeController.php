<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use Stripe\Stripe;


class StripeController extends Controller
{
    public function session(Request $request)
    {
        $user = auth()->user();
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
        // Отримайте інформацію про куплений товар з сесії або з бази даних.
        $purchasedItems = session('cart'); // Або використайте модель для отримання товарів з бази даних.

        // Обчисліть загальну суму покупки
        $totalAmount = 0;
        foreach ($purchasedItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Отримайте ім'я користувача та електронну адресу користувача.
        $user = auth()->user();
        $userName = $user->name;
        $userEmail = $user->email;

        // Створіть логіку для створення і відправлення листа з інформацією про куплені товари на електронну пошту користувача.
        // Використовуйте Laravel Mail для надсилання листа.

        // Приклад:
        Mail::to($userEmail)->send(new PurchaseConfirmationMail($userName, $purchasedItems, $totalAmount));

        return view('main.paySuccess');
    }

    public function cancel()
    {
        return view('cancel');
    }


}
