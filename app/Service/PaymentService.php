<?php


namespace App\Service;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentService
{
    public function payment(Request $request)
    {
        User::find(Auth::id())->update([
            'expire_date' => Carbon::now()->addDays(30),
            'status' => true
        ]);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => 100 * 10,
            "currency" => "usd",
            "source" => $request->get('stripeToken'),
            "description" => "Test payment from Kaushik Mallik."
        ]);
    }

    public function inactiveUsers()
    {
        $currentDate = Carbon::now();
        $users = User::where('expire_date', '<', $currentDate)->get();
        foreach ($users as $user){
            User::find($user['id'])->update([
                'expire_date' => null,
                'status' => false
            ]);
        }
    }
}
