<?php


namespace App\Service;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentService
{
    public function payment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => 10 * 10,
            "currency" => "usd",
            "source" => $request->get('stripeToken'),
            "description" => "Test payment from Kaushik Mallik."
        ]);

        User::create([
            'expire_date' => Carbon::now()->addDays(30)
        ]);
    }
}
